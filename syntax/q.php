<?php
/**
 * Inline Quotation element component for the adhoctags plugin
 *
 * Defines  <q> ... </q> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/q
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_q extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'q';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->doublequoteopening();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->doublequoteclosing();
    }
}