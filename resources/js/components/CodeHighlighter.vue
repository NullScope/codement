<template>
  <div>
    <b-modal
      id="insert-comment-modal"
      title="Inserir comentário"
      @show="onModalShow"
      @hide="onModalHide"
      @ok="onModalOk"
    >
      <div class="row justify-content-center">
        <form ref="commentForm" @submit.stop.prevent="onModalOk" v-if="currentComment">
          <b-form-group
            :state="commentState"
            label="Comentário"
            label-for="comment-input"
            invalid-feedback="Comentário é obrigatório"
          >
            <b-form-input
              id="comment-input"
              v-model="currentComment.comentario"
              :state="commentState"
              required
              placeholder="Comentário"
            ></b-form-input>
            <audio-recorder
              :show-upload-button="false"
              :attempts="1"
              :time="5"
              :before-recording="onBeforeRecording"
              :after-recording="onAfterRecording"
              :remove-record="onRemoveRecord"
              id="comment-voice-recorder"
            />
          </b-form-group>
        </form>
      </div>
    </b-modal>
    <div class="row justify-content-center" v-if="uploadUrl">
      <div id="file-info" class="col-lg-7">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Upload de ficheiro</h2>
            <form ref="fileForm" id="file-form" @submit="onSubmit">
              <b-form-group
                label="Nome do ficheiro"
                label-for="filename-input"
                invalid-feedback="Nome do ficheiro é obrigatório"
              >
                <b-form-input
                  id="filename-input"
                  v-model="filename"
                  placeholder="Nome do Ficheiro"
                  required
                ></b-form-input>
              </b-form-group>

              <b-form-group
                label="Descrição do ficheiro"
                label-for="file-description-input"
                invalid-feedback="Descrição do ficheiro é obrigatório"
              >
                <b-form-textarea
                  id="file-description-input"
                  v-model="fileDescription"
                  placeholder="Descrição do Ficheiro"
                  rows="3"
                  max-rows="3"
                  required
                ></b-form-textarea>
              </b-form-group>

              <b-form-group>
                <div class="input-group col-xs-12">
                  <input type="file" ref="fileInput" v-on:change="onFileChange" name="file" required class="file-upload-default">
                  <label class="form-control" placeholder="" v-on:click="onClickUpload">{{fileLabel ? fileLabel : "Upload Ficheiro"}}</label>
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button" v-on:click="onClickUpload">Upload</button>
                  </span>
                </div>
              </b-form-group>
              <b-button type="submit" class="mx-auto btn btn-gradient-primary mr-2" id="file-submit-button">Guardar ficheiro</b-button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center" v-if="code">
      <h4> Para comentar código, clique e arraste na coluna dos números de linhas </h4>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4 card-columns" id="comments" v-if="code && comments.length > 0">
        <div
          class="card col-lg-11 comment comment-created"
          v-for="(comment, index) in comments"
          v-bind:key="index"
          :style="'top: ' + comment.lineTop + 'px'"
        >
          <div class="card-body">
            <h4 class="card-title">{{comment.user.name}}</h4>
            <h6 class="card-subtitle mb-2 text-muted">{{comment.created_at | moment("DD/MM/YYYY hh:mm:ss")}}</h6>
            <br/>
            <p class="card-text">{{comment.comentario}}</p>
            <audio-player ref="audioPlayers" v-if="comment.audio && comment.audio.url" :src="comment.audio.url"/>
          </div>
          <ul class="list-group list-group-flush" v-if="!uploadUrl">
            <li class="list-group-item"><h4>Respostas</h4></li>
          </ul>
          <div v-if="!uploadUrl">
            <div class="card-body subcomment" v-for="(subcomment, subindex) in comment.subcomentarios" v-bind:key="subindex">
              <h4 class="card-title">{{subcomment.user.name}}</h4>
              <h6 class="card-subtitle mb-2 text-muted">{{subcomment.created_at | moment("DD/MM/YYYY hh:mm:ss")}}</h6>
              <br/>
              <p class="card-text">{{subcomment.comentario}}</p>
              <audio-player ref="audioPlayers" v-if="subcomment.audio_url" :src="subcomment.audio_url"/>
            </div>
          </div>
          <div class="card-body" v-if="!uploadUrl">
            <b-button class="btn btn-gradient-primary mr-2" v-on:click="onReplyComment(comment)">Responder</b-button>
          </div>
        </div>
      </div>
      <div class="col-lg-7 grid-margin">
        <prism-component v-if="code !== ''" id="prism" language="js" :data-line="dataLine" class="line-numbers">
          {{ code }}
        </prism-component>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import 'prismjs';
  import 'prismjs/themes/prism.css';
  import 'prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min';
  import 'prismjs/plugins/line-numbers/prism-line-numbers.min';
  import 'prismjs/plugins/line-numbers/prism-line-numbers.css';
  import 'prismjs/plugins/line-highlight/prism-line-highlight.css';
  import PrismComponent from 'vue-prism-component';

  export default {
    props: {
      fileId: {type: Number},
      uploadUrl: {type: String},
      afterUpload: {type: Function},
      afterDownload: {type: Function}
    },

    mounted: function () {
      this.getProfile();

      this.setupEvents();

      this.setupSpeechRecognition();

      this.setupPrism();

      if (this.fileId) {
        axios.get(`/api/ficheiros/${this.fileId}`).then((response) => {
          const url = response.data.data.url;
          const comments = response.data.data.comentarios;

          this.extension = response.data.data.extension;

          axios.get(url).then((response) => {
            this.code = response.data;

            this.$nextTick(() => {
              comments.forEach(comment => {
                this.comments.push({
                  id: comment.id,
                  user: comment.user,
                  comentario: comment.comentario,
                  subcomentarios: comment.subcomentarios,
                  lineStart: comment.linha_inicio,
                  lineEnd: comment.linha_fim,
                  audio: {
                    url: comment.audio_url
                  },
                  lineTop: 0,
                  created_at: comment.created_at
                });
              });

              if (this.afterDownload) {
                this.afterDownload();
              }
            });
          });
        });
      }
    },

    watch: {
      dataLine: function(newDataLine, oldDataLine) {
        let pre = this.lineNumbersRow.offsetParent.offsetParent;

        this.removeHighlightlines(pre);

        if (newDataLine !== "") {
          let mutateDom = this.highlightLines(pre, newDataLine);
          mutateDom();
        }
      },

      code: function(newCode, oldCode) {
        this.comments = [];

        if (newCode === '') {
          return;
        }

        this.$nextTick(() => {
          Prism.highlightAll();

          this.comments.forEach(comment => {
            comment.lineTop = this.getLineTop(comment.lineStart - 1);
          });
        });
      }
    },

    data() {
      return {
        isDragging: false,
        isCommentModalOpened: false,
        isRecordingComment: false,
        currentComment: null,
        comments: [],
        code: '',
        speechRecognition: null,
        language: 'pt-PT',
        file: null,
        filename: '',
        fileLabel: '',
        fileDescription: '',
        commentState: null,
        extension: '',
        lineNumbersRow: null,
        user: null
      }
    },

    computed: {
      dataLine: function() {
        let lines = '';
        let comments = this.comments.slice();

        if (this.currentComment && !this.currentComment.parent) {
          comments.push(this.currentComment);
        }

        comments.forEach((comment, index) => {
          if (index != 0) {
            lines += ',';
          }

          lines += comment.lineStart + '-' + comment.lineEnd;
        });

        return lines;
      },

      // Some browsers round the line-height, others don't.
      // We need to test for it to position the elements properly.
      isLineHeightRounded() {
        let res;
        return function () {
          if (typeof res === 'undefined') {
            let d = document.createElement('div');
            d.style.fontSize = '13px';
            d.style.lineHeight = '1.5';
            d.style.padding = 0;
            d.style.border = 0;
            d.innerHTML = '&nbsp;<br />&nbsp;';
            document.body.appendChild(d);
            // Browsers that round the line-height should have offsetHeight === 38
            // The others should have 39.
            res = d.offsetHeight === 38;
            document.body.removeChild(d);
          }
          return res;
        }
      }
    },

    methods: {
      getProfile() {
        axios.get('/api/me').then((response) => {
          this.user = response.data.data.user;
        });
      },

      onFileChange(e) {
        let files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;

        this.file = files[0];

        var reader = new FileReader();
        reader.readAsText(this.file, "UTF-8");

        reader.onload = (evt) => {
          this.extension = this.file.name.substring(this.file.name.lastIndexOf('.') + 1);

          this.code = evt.target.result;

          this.filename = this.filename !== '' ? this.filename : this.file.name;
          this.fileLabel = this.file.name;
        }

        reader.onerror = (evt) => {
          console.error(evt);

          this.extension = '';
          this.code = '';
          this.filename = '';
          this.fileLabel = '';
        }
      },

      onSubmit(evt) {
        evt.preventDefault();

        let fileFormData = new FormData();
        fileFormData.append('nome', this.filename);
        fileFormData.append('descricao', this.fileDescription);
        fileFormData.append('ficheiro', this.file);

        axios.post(this.uploadUrl, fileFormData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then((response) => {
          let id = response.data.data.id;

          this.comments.forEach(comment => {
            let commentFormData = new FormData();

            commentFormData.append('comentario', comment.comentario);
            commentFormData.append('linha_inicio', comment.lineStart);
            commentFormData.append('linha_fim', comment.lineEnd);

            if (comment.audio.blob) {
              commentFormData.append('audio', comment.audio.blob);
            }

            axios.post(`/api/ficheiros/${id}/comentarios`, commentFormData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            }).then((response) => {
              console.log(response);
            });
          });

          if (this.afterUpload) {
            this.afterUpload(response.data.data);
          }
        });
      },

      onReplyComment(comment) {
        this.currentComment = {
          parent: comment,
          comentario: '',
          lineStart: comment.lineStart,
          lineEnd: comment.lineEnd,
          audio: null,
          created_at: Date.now()
        };

        this.$bvModal.show('insert-comment-modal');
      },

      onClickUpload() {
        this.$refs.fileInput.click();
      },

      getLineTop(line) {
        let lineNumbersChildren = Array.prototype.slice.call(this.lineNumbersRow.children);

        const documentRect = document.documentElement.getBoundingClientRect();
        const lineNumbersRowRect = this.lineNumbersRow.getBoundingClientRect();
        const lineRect = lineNumbersChildren[line].getBoundingClientRect();

        const documentOffset = lineNumbersRowRect.top - documentRect.top - 15;
        const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        return lineRect.top + scrollTop - documentOffset;
      },

      setupEvents() {
        this.$eventBus.$on('remove-record', () => {
          this.onRemoveRecord();
        });

        Prism.hooks.add('complete', (env) => {
          this.lineNumbersRow = env.element.children[env.element.children.length - 2];

          let lineNumbersChildren = Array.prototype.slice.call(this.lineNumbersRow.children);

          for (const [key, line] of lineNumbersChildren.entries()) {
            line.onmousedown = () => {
              if (this.isDragging)
                return false;

              let foundComment = this.comments.find(comment => {
                return key + 1 >= comment.lineStart && key + 1 <= comment.lineEnd;
              });

              if (foundComment)
                return;

              this.currentComment = {
                user: this.user,
                comentario: '',
                lineStart: key + 1,
                lineEnd: key + 1,
                audio: null,
                lineTop: this.getLineTop(key),
                created_at: Date.now()
              };

              this.isDragging = true;
            }

            line.onmouseover = () => {
              if (!this.isDragging) {
                return;
              }

              let foundComment = this.comments.find(comment => {
                return this.currentComment.lineStart < comment.lineStart && key + 1 >= comment.lineStart;
              });

              if (foundComment) {
                this.currentComment.lineEnd = foundComment.lineStart - 1;
                return;
              }

              if (key + 1 >= this.currentComment.lineStart)
                this.currentComment.lineEnd = key + 1;
            }
          }
        });

        document.onmouseup = () => {
          if (this.isDragging) {
            this.isDragging = false;
            this.$bvModal.show('insert-comment-modal');
          }
        }
      },

      setupSpeechRecognition() {
        window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition
        if (!SpeechRecognition) {
          throw new Error('Speech Recognition does not exist on this browser. Use Chrome or Firefox');
        }

        this.speechRecognition = new SpeechRecognition();

        this.speechRecognition.lang = this.language;
        this.speechRecognition.interimResults = true;
        this.speechRecognition.continuous = true;

        this.speechRecognition.onresult = event => {
          const text = Array.from(event.results)
            .map(result => result[0])
            .map(result => result.transcript)
            .join('');

          if (this.currentComment) {
            if (this.currentComment.comentario === "") {
              this.currentComment.comentario += text;
            } else {
              this.currentComment.comentario += " " + text.charAt(0).toUpperCase() + text.slice(1);
            }
          }
        };

        this.speechRecognition.onend = event => {
          if (this.isRecordingComment) {
            this.speechRecognition.start();
          }
        };
      },

      onModalShow() {
        this.commentState = null;
        this.isCommentModalOpened = true;
      },

      onModalHide(bvModalEvt) {
        if (bvModalEvt.defaultPrevented) {
          return;
        }

        if (bvModalEvt.trigger !== "event" || !this.uploadUrl) {
          this.currentComment = null;
        } else {
          this.comments.push(this.currentComment);
        }

        this.isCommentModalOpened = false;
      },

      onModalOk(bvModalEvt) {
        bvModalEvt.preventDefault();

        const valid = this.$refs.commentForm.checkValidity();
        this.commentState = valid || this.currentComment.audio != undefined;

        // Exit when the form isn't valid
        if (!valid && !this.currentComment.audio) {
          return
        }

        if (this.uploadUrl) {
          this.$nextTick(() => {
            this.$bvModal.hide('insert-comment-modal');
          });
        } else {
          let commentFormData = new FormData();

          commentFormData.append('comentario', this.currentComment.comentario);
          commentFormData.append('linha_inicio', this.currentComment.lineStart);
          commentFormData.append('linha_fim', this.currentComment.lineEnd);

          if (this.currentComment.parent) {
            commentFormData.append('comentario_id', this.currentComment.parent.id);
          }

          if (this.currentComment.audio) {
            commentFormData.append('audio', this.currentComment.audio.blob);
          }

          axios.post(`/api/ficheiros/${this.fileId}/comentarios`, commentFormData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }).then((response) => {
            const comment = response.data.data;

            if (this.currentComment.parent) {
              this.currentComment.parent.subcomentarios.push({
                id: comment.id,
                user: comment.user,
                comentario: comment.comentario,
                lineStart: comment.linha_inicio,
                lineEnd: comment.linha_fim,
                audio_url: comment.audio_url,
                lineTop: 0,
                created_at: comment.created_at
              });
            } else {
              this.comments.push({
                id: comment.id,
                user: comment.user,
                comentario: comment.comentario,
                subcomentarios: comment.subcomentarios,
                lineStart: comment.linha_inicio,
                lineEnd: comment.linha_fim,
                audio: {
                  url: comment.audio_url
                },
                lineTop: 0,
                created_at: comment.created_at
              });
            }

            this.$nextTick(() => {
              this.$bvModal.hide('insert-comment-modal');
            });
          });
        }

      },

      onBeforeRecording() {
        this.isRecordingComment = true;
        if (this.speechRecognition) {
          this.speechRecognition.start();
        }
      },

      onAfterRecording(data) {
        this.isRecordingComment = false;

        if (this.speechRecognition) {
          this.speechRecognition.stop();
        }

        if (this.currentComment) {
          this.currentComment.audio = data;
        }
      },

      onRemoveRecord() {
        this.currentComment.audio = null;
      },

      $$(expr, con) {
        return Array.prototype.slice.call((con || document).querySelectorAll(expr));
      },

      hasClass(element, className) {
        className = " " + className + " ";
        return (" " + element.className + " ").replace(/[\n\t]/g, " ").indexOf(className) > -1
      },

      callFunction(func) {
        func();
      },

      /**
      * Highlights the lines of the given pre.
      *
      * This function is split into a DOM measuring and mutate phase to improve performance.
      * The returned function mutates the DOM when called.
      *
      * @param {HTMLElement} pre
      * @param {string} [lines]
      * @param {string} [classes='']
      * @returns {() => void}
      */
      highlightLines(pre, lines, classes) {
        lines = typeof lines === 'string' ? lines : pre.getAttribute('data-line');

        let ranges = lines.replace(/\s+/g, '').split(',');
        let offset = +pre.getAttribute('data-line-offset') || 0;

        let parseMethod = this.isLineHeightRounded() ? parseInt : parseFloat;
        let lineHeight = parseMethod(getComputedStyle(pre).lineHeight);
        let hasLineNumbers = this.hasClass(pre, 'line-numbers');
        let parentElement = hasLineNumbers ? pre : pre.querySelector('code') || pre;
        let mutateActions = /** @type {(() => void)[]} */ ([]);

        ranges.forEach(function (currentRange) {
          let range = currentRange.split('-');

          let start = +range[0];
          let end = +range[1] || start;

          let line = pre.querySelector('.line-highlight[data-range="' + currentRange + '"]') || document.createElement('div');

          mutateActions.push(function () {
            line.setAttribute('aria-hidden', 'true');
            line.setAttribute('data-range', currentRange);
            line.className = (classes || '') + ' line-highlight';
          });

          // if the line-numbers plugin is enabled, then there is no reason for this plugin to display the line numbers
          if (hasLineNumbers && Prism.plugins.lineNumbers) {
            let startNode = Prism.plugins.lineNumbers.getLine(pre, start);
            let endNode = Prism.plugins.lineNumbers.getLine(pre, end);

            if (startNode) {
              let top = startNode.offsetTop + 'px';
              mutateActions.push(function () {
                line.style.top = top;
              });
            }

            if (endNode) {
              let height = (endNode.offsetTop - startNode.offsetTop) + endNode.offsetHeight + 'px';
              mutateActions.push(function () {
                line.style.height = height;
              });
            }
          } else {
            mutateActions.push(function () {
              line.setAttribute('data-start', start);

              if (end > start) {
                line.setAttribute('data-end', end);
              }

              line.style.top = (start - offset - 1) * lineHeight + 'px';

              line.textContent = new Array(end - start + 2).join(' \n');
            });
          }

          mutateActions.push(function () {
            // allow this to play nicely with the line-numbers plugin
            // need to attack to pre as when line-numbers is enabled, the code tag is relatively which screws up the positioning
            parentElement.appendChild(line);
          });
        });

        return () => {
          mutateActions.forEach(this.callFunction);
        };
      },

      removeHighlightlines(pre) {
        let lines = pre.querySelectorAll('.line-highlight');

        lines.forEach(line => {
          line.remove();
        });
      },

      setupPrism() {
        Prism.hooks.add('before-sanity-check', env => {
          let pre = env.element.parentNode;
          let lines = pre && pre.getAttribute('data-line');

          if (!pre || !lines || !/pre/i.test(pre.nodeName)) {
            return;
          }

          /*
          * Cleanup for other plugins (e.g. autoloader).
          *
          * Sometimes <code> blocks are highlighted multiple times. It is necessary
          * to cleanup any left-over tags, because the whitespace inside of the <div>
          * tags change the content of the <code> tag.
          */
          let num = 0;
          this.$$('.line-highlight', pre).forEach(line => {
            num += line.textContent.length;
            line.parentNode.removeChild(line);
          });
          // Remove extra whitespace
          if (num && /^( \n)+$/.test(env.code.slice(-num))) {
            env.code = env.code.slice(0, -num);
          }
        });

        let completeHook = (env) => {
          let pre = env.element.parentNode;
          let lines = pre && pre.getAttribute('data-line');

          if (!pre || !lines || !/pre/i.test(pre.nodeName)) {
            return;
          }

          let hasLineNumbers = Prism.plugins.lineNumbers;
          let isLineNumbersLoaded = env.plugins && env.plugins.lineNumbers;

          if (this.hasClass(pre, 'line-numbers') && hasLineNumbers && !isLineNumbersLoaded) {
            Prism.hooks.add('line-numbers', completeHook);
          } else {
            let mutateDom = this.highlightLines(pre, lines);
            mutateDom();
          }
        }

        Prism.hooks.add('complete', completeHook);

        window.addEventListener('resize', () => {
          let actions = [];
          this.$$('pre[data-line]').forEach((pre) => {
            actions.push(this.highlightLines(pre));
          });
          actions.forEach(this.callFunction);
        });
      }
    },

    components: {
      PrismComponent
    }
  }
</script>

<style>
  code[class*="language-"],
  pre[class*="language-"] {
    white-space: pre-wrap;
  }

  #prism {
    /* pointer-events: none; */
    margin-top: 0;
  }

  .line-numbers-rows {
    pointer-events: none;
  }

  .line-numbers-rows > * {
    pointer-events: all !important;
    cursor: pointer;
  }

  .ar__rm {
    padding: 2px 2px 0 4px !important;
  }

  .ar svg, .ar-player svg {
    overflow: hidden;
    vertical-align: initial !important;
  }

  .ar-recorder__records-limit {
      position: initial !important;
      margin-top: 20px;
  }

  .ar-recorder__time-limit {
      position: initial !important;
  }

  #comments {
    column-count: 1;
  }

  #comments .comment {
    position: absolute;
  }

  #comments .comment:hover {
    z-index: 999;
  }

  #comments .comment-created {
    border: 1px solid #b66dff77;
  }

  #comment-voice-recorder {
    margin-top: 20px;
  }

  #file-info {
    margin-bottom: 44px;
  }

  #file-submit-button {
    display: block;
  }

  .subcomment {
    padding-top: 0 !important;
  }
</style>
