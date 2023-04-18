<?php
/**
 * Strikethrough element component for the adhoctags plugin
 *
 * Defines  <s> ... </s> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/s
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_s extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 's';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->deleted_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->deleted_close();
    }
}