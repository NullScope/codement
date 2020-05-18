<template>
  <div>
    <prism-component language="javascript" id="prism" :data-line="dataLine" class="line-numbers" ref="prism">
      {{ code }}
    </prism-component>
  </div>
</template>

<script>
  import axios from "axios";
  import 'prismjs';
  import 'prismjs/themes/prism.css';
  import 'prismjs/plugins/line-numbers/prism-line-numbers.min';
  import 'prismjs/plugins/line-numbers/prism-line-numbers.css';
  import 'prismjs/plugins/line-highlight/prism-line-highlight.css';
  import PrismComponent from 'vue-prism-component';

  export default {
    mounted: function () {
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

        clearTimeout(this.fakeTimer);

        var hasLineNumbers = Prism.plugins.lineNumbers;
        var isLineNumbersLoaded = env.plugins && env.plugins.lineNumbers;

        if (this.hasClass(pre, 'line-numbers') && hasLineNumbers && !isLineNumbersLoaded) {
          Prism.hooks.add('line-numbers', completeHook);
        } else {
          var mutateDom = this.highlightLines(pre, lines);
          mutateDom();
          this.fakeTimer = setTimeout(this.applyHash, 1);
        }
      }

      Prism.hooks.add('complete', completeHook);

      window.addEventListener('hashchange', this.applyHash);
      window.addEventListener('resize', () => {
        var actions = [];
        this.$$('pre[data-line]').forEach((pre) => {
          actions.push(this.highlightLines(pre));
        });
        actions.forEach(this.callFunction);
      });

      setTimeout(() => {
        let codeSpans = this.$refs.prism.children[0].children;
        let lineNumbersRow = Array.prototype.slice.call(codeSpans[codeSpans.length - 1].children);

        console.log(lineNumbersRow)

        for (const [key, line] of lineNumbersRow.entries()) {
          line.onmousedown = () => { this.lineStart = key + 1 }
          line.onmouseover = () => { if (this.lineStart != -1) this.lineEnd = key + 1}
        }
      }, 100);
    },
    methods: {
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

      applyHash() {
        var hash = location.hash.slice(1);

        // Remove pre-existing temporary lines
        this.$$('.temporary.line-highlight').forEach(function (line) {
          line.parentNode.removeChild(line);
        });

        var range = (hash.match(/\.([\d,-]+)$/) || [, ''])[1];

        if (!range || document.getElementById(hash)) {
          return;
        }

        var id = hash.slice(0, hash.lastIndexOf('.')),
          pre = document.getElementById(id);

        if (!pre) {
          return;
        }

        if (!pre.hasAttribute('data-line')) {
          pre.setAttribute('data-line', '');
        }

        var mutateDom = this.highlightLines(pre, range, 'temporary ');
        mutateDom();

        document.querySelector('.temporary.line-highlight').scrollIntoView();
      },

      removeHighlightlines() {
        let pre = this.$refs.prism;
        let lines = pre.querySelectorAll('.line-highlight');

        lines.forEach(line => {
          line.remove();
        });
      },
    },
    computed: {
      dataLine: function(){
        if (this.lineStart == 0 || this.lineEnd == 0)
          return ""
        else
          return this.lineStart + "-" + this.lineEnd
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
    watch: {
      dataLine: function(newDataLine, oldDataLine) {
        this.removeHighlightlines();
        let mutateDom = this.highlightLines(this.$refs.prism, newDataLine);
        mutateDom();
      }
    },
    data() {
      return {
        lineStart: 0,
        lineEnd: 0,
        fakeTimer: 0, // Hack to limit the number of times applyHash() runs
        code: `(function () {

	if (typeof self === 'undefined' || !self.Prism || !self.document || !document.querySelector) {
		return;
	}

	function $$(expr, con) {
		return Array.prototype.slice.call((con || document).querySelectorAll(expr));
	}

	function hasClass(element, className) {
		className = " " + className + " ";
		return (" " + element.className + " ").replace(/[\n\t]/g, " ").indexOf(className) > -1
	}

	function callFunction(func) {
		func();
	}

	// Some browsers round the line-height, others don't.
	// We need to test for it to position the elements properly.
	var isLineHeightRounded = (function () {
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
	}());

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
	function highlightLines(pre, lines, classes) {
		lines = typeof lines === 'string' ? lines : pre.getAttribute('data-line');

		var ranges = lines.replace(/\s+/g, '').split(',');
		var offset = +pre.getAttribute('data-line-offset') || 0;

		var parseMethod = isLineHeightRounded() ? parseInt : parseFloat;
		var lineHeight = parseMethod(getComputedStyle(pre).lineHeight);
		var hasLineNumbers = hasClass(pre, 'line-numbers');
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

		return function () {
			mutateActions.forEach(callFunction);
		};
	}

	function applyHash() {
		var hash = location.hash.slice(1);

		// Remove pre-existing temporary lines
		$$('.temporary.line-highlight').forEach(function (line) {
			line.parentNode.removeChild(line);
		});

		var range = (hash.match(/\.([\d,-]+)$/) || [, ''])[1];

		if (!range || document.getElementById(hash)) {
			return;
		}

		var id = hash.slice(0, hash.lastIndexOf('.')),
			pre = document.getElementById(id);

		if (!pre) {
			return;
		}

		if (!pre.hasAttribute('data-line')) {
			pre.setAttribute('data-line', '');
		}

		var mutateDom = highlightLines(pre, range, 'temporary ');
		mutateDom();

		document.querySelector('.temporary.line-highlight').scrollIntoView();
	}

	var fakeTimer = 0; // Hack to limit the number of times applyHash() runs

	Prism.hooks.add('before-sanity-check', function (env) {
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
		$$('.line-highlight', pre).forEach(function (line) {
			num += line.textContent.length;
			line.parentNode.removeChild(line);
		});
		// Remove extra whitespace
		if (num && /^( \n)+$/.test(env.code.slice(-num))) {
			env.code = env.code.slice(0, -num);
		}
	});

	Prism.hooks.add('complete', function completeHook(env) {
		var pre = env.element.parentNode;
		var lines = pre && pre.getAttribute('data-line');

		if (!pre || !lines || !/pre/i.test(pre.nodeName)) {
			return;
		}

		clearTimeout(fakeTimer);

		var hasLineNumbers = Prism.plugins.lineNumbers;
		var isLineNumbersLoaded = env.plugins && env.plugins.lineNumbers;

		if (hasClass(pre, 'line-numbers') && hasLineNumbers && !isLineNumbersLoaded) {
			Prism.hooks.add('line-numbers', completeHook);
		} else {
			var mutateDom = highlightLines(pre, lines);
			mutateDom();
			fakeTimer = setTimeout(applyHash, 1);
		}
	});

	window.addEventListener('hashchange', applyHash);
	window.addEventListener('resize', function () {
		var actions = [];
		$$('pre[data-line]').forEach(function (pre) {
			actions.push(highlightLines(pre));
		});
		actions.forEach(callFunction);
	});

})();`
      }
    },
    components: {
      PrismComponent
    }
  }
</script>

<style>
  .test {
    width: 70%;
    margin: 0 auto;
  }
  #prism {
    pointer-events: none;
  }
  .line-numbers-rows {
    pointer-events: none;
  }

  .line-numbers-rows > * {
    pointer-events: all !important;
    cursor: pointer;
  }
</style>
