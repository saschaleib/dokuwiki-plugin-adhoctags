<?php
/**
 * Unarticulated Annotation (Underline) element component for the wrap plugin
 *
 * Defines  <u> ... </u> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_u extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'u';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->underline_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->underline_close();
    }
}