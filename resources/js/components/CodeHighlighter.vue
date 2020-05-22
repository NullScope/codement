<template>
  <div class="row justify-content-center">
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
            ></b-form-input>
            <audio-recorder
              :show-upload-button="false"
              :attempts="1"
              :time="5"
              :before-recording="onBeforeRecording"
              :pause-recording="callback"
              :after-recording="onAfterRecording"
              :select-record="callback"
              id="comment-voice-recorder"
            />
          </b-form-group>
        </form>
      </div>
    </b-modal>
    <div class="col-lg-4 card-columns" id="comments" v-if="comments.length > 0 && comments[0] != currentComment">
      <div
        class="card col-lg-11 comment"
        v-for="(comment, index) in comments"
        v-bind:key="index"
        :style="'top: ' + comment.lineTop + 'px'"
        :class="comment != currentComment ? 'comment-created' : ''"
      >
        <div class="card-body" v-if="comment != currentComment">
          <h4 class="card-title">Bruno</h4>
          <p class="card-text">{{comment.comentario}}</p>
          <audio-player ref="audioPlayers" v-if="comment.audio" :src="comment.audio ? comment.audio.url : ''"/>
        </div>
      </div>
    </div>
    <div class="col-lg-7 grid-margin">
      <prism-component v-if="code !== ''" id="prism" language="javascript" :data-line="dataLine" class="line-numbers">
        {{ code }}
      </prism-component>
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
  import { exampleCode } from './exampleCode';

  export default {
    mounted: function () {
      window.addEventListener('scroll', () => {
        // this.$forceUpdate();
      });

      this.setupSpeechRecognition();

      Prism.hooks.add('before-sanity-check', env => {
        var pre = env.element.parentNode;
        var lines = pre && pre.getAttribute('data-line');

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
        var num = 0;
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
        var pre = env.element.parentNode;
        var lines = pre && pre.getAttribute('data-line');

        if (!pre || !lines || !/pre/i.test(pre.nodeName)) {
          return;
        }

        var hasLineNumbers = Prism.plugins.lineNumbers;
        var isLineNumbersLoaded = env.plugins && env.plugins.lineNumbers;

        if (this.hasClass(pre, 'line-numbers') && hasLineNumbers && !isLineNumbersLoaded) {
          Prism.hooks.add('line-numbers', completeHook);
        } else {
          var mutateDom = this.highlightLines(pre, lines);
          mutateDom();
        }
      }

      Prism.hooks.add('complete', completeHook);

      window.addEventListener('resize', () => {
        var actions = [];
        this.$$('pre[data-line]').forEach((pre) => {
          actions.push(this.highlightLines(pre));
        });
        actions.forEach(this.callFunction);
      });

      Prism.hooks.add('complete', (env) => {
        setTimeout(() => {
          this.lineNumbersRow = document.getElementsByClassName("line-numbers-rows")[0];

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

              this.comments.push({
                comentario: "",
                lineStart: key + 1,
                lineEnd: key + 1,
                audio: null,
                lineTop: this.getLineTop(key)
              });
              this.isDragging = true;
            }

            line.onmouseup = () => {
              if (this.isDragging) {
                this.isDragging = false;
                this.$bvModal.show('insert-comment-modal');
              }
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
        }, 100)
      });

      Prism.highlightAll();
    },
    watch: {
      dataLine: function(newDataLine, oldDataLine) {
        let pre = this.lineNumbersRow.offsetParent.offsetParent;

        this.removeHighlightlines(pre);

        if (newDataLine !== "") {
          let mutateDom = this.highlightLines(pre, newDataLine);
          mutateDom();
        }
      }
    },
    data() {
      return {
        env: null,
        isDragging: false,
        isCommentModalOpened: false,
        isRecordingComment: false,
        comments: [],
        code: exampleCode,
        speechRecognition: null,
        language: 'pt-PT',
        commentState: null,
      }
    },
    computed: {
      currentComment() {
        if (this.comments.length === 0 || (!this.isDragging && !this.isCommentModalOpened)) {
          return undefined;
        } else {
          return this.comments[this.comments.length - 1];
        }
      },
      dataLine: function(){
        if (this.comments.length === 0) {
          return "";
        } else {
          let lines = "";

          this.comments.forEach((comment, index) => {
            if (index == 0) {
              lines += comment.lineStart + "-" + comment.lineEnd;
            } else {
              lines += "," + comment.lineStart + "-" + comment.lineEnd;
            }
          });

          return lines;
        }
      },

      // Some browsers round the line-height, others don't.
      // We need to test for it to position the elements properly.
      isLineHeightRounded() {
        var res;
        return function () {
          if (typeof res === 'undefined') {
            var d = document.createElement('div');
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
      setupSpeechRecognition() {
        window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition
        if (!SpeechRecognition && process.env.NODE_ENV !== 'production') {
          throw new Error('Speech Recognition does not exist on this browser. Use Chrome or Firefox');
        }

        if (!SpeechRecognition) {
          return;
        }

        this.speechRecognition = new SpeechRecognition();

        this.speechRecognition.lang = this.language;
        this.speechRecognition.interimResults = true;

        this.speechRecognition.addEventListener('result', event => {
          const text = Array.from(event.results)
            .map(result => result[0])
            .map(result => result.transcript)
            .join('');

          if (this.currentComment.comentario === "") {
            this.currentComment.comentario += text;
          } else {
            this.currentComment.comentario += " " + text.charAt(0).toUpperCase() + text.slice(1);
          }
        });

        this.speechRecognition.addEventListener('end', event => {
          if (this.isRecordingComment) {
            this.speechRecognition.start();
          }
        });
      },

      onModalShow() {
        this.commentState = null;
        this.isCommentModalOpened = true;
      },

      onModalHide(bvModalEvt) {
        if (bvModalEvt.defaultPrevented) {
          return;
        }

        if (bvModalEvt.trigger !== "event") {
          this.comments.pop();
        }

        this.isCommentModalOpened = false;
      },

      onModalOk(bvModalEvt) {
        bvModalEvt.preventDefault();

        const valid = this.$refs.commentForm.checkValidity();
        this.commentState = valid || this.currentComment.audio != null;

        // Exit when the form isn't valid
        if (!valid && !this.currentComment.audio) {
          return
        }

        this.$nextTick(() => {
          this.$bvModal.hide('insert-comment-modal');
        });
      },

      callback (data) {
        console.debug(data)
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

        this.currentComment.audio = data;
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

        var ranges = lines.replace(/\s+/g, '').split(',');
        var offset = +pre.getAttribute('data-line-offset') || 0;

        var parseMethod = this.isLineHeightRounded() ? parseInt : parseFloat;
        var lineHeight = parseMethod(getComputedStyle(pre).lineHeight);
        var hasLineNumbers = this.hasClass(pre, 'line-numbers');
        var parentElement = hasLineNumbers ? pre : pre.querySelector('code') || pre;
        var mutateActions = /** @type {(() => void)[]} */ ([]);

        ranges.forEach(function (currentRange) {
          var range = currentRange.split('-');

          var start = +range[0];
          var end = +range[1] || start;

          var line = pre.querySelector('.line-highlight[data-range="' + currentRange + '"]') || document.createElement('div');

          mutateActions.push(function () {
            line.setAttribute('aria-hidden', 'true');
            line.setAttribute('data-range', currentRange);
            line.className = (classes || '') + ' line-highlight';
          });

          // if the line-numbers plugin is enabled, then there is no reason for this plugin to display the line numbers
          if (hasLineNumbers && Prism.plugins.lineNumbers) {
            var startNode = Prism.plugins.lineNumbers.getLine(pre, start);
            var endNode = Prism.plugins.lineNumbers.getLine(pre, end);

            if (startNode) {
              var top = startNode.offsetTop + 'px';
              mutateActions.push(function () {
                line.style.top = top;
              });
            }

            if (endNode) {
              var height = (endNode.offsetTop - startNode.offsetTop) + endNode.offsetHeight + 'px';
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
</style>
