<?php
/**
 * Strong Importance element component for the wrap plugin
 *
 * Defines  <strong> ... </strong> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/strong
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_strong extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'strong';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->strong_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->strong_close();
    }
}