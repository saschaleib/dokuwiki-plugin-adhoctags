<?php
/**
 * Definition element syntax component for the adhoctags plugin
 *
 * Defines  <dfn> ... </dfn> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_dfn extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'dfn';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->emphasis_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->emphasis_close();
    }
}