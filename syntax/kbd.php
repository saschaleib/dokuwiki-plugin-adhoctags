<?php
/**
 * Keyboard Input element component for the adhoctags plugin
 *
 * Defines  <kbd> ... </kbd> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/kbd
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_kbd extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'kbd';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->monospace_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->monospace_close();
    }
}