<?php
/**
 * Block Element Syntax Component of the adhoctags Plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_abstractblock extends syntax_plugin_adhoctags_abstract {

    protected $special_pattern = '<%t%\b[^>\r\n]*?/>';
    protected $entry_pattern   = '<%t%\b.*?>(?=.*?</%t%>)';
    protected $exit_pattern    = '</%t%>';

    function getAllowedTypes() {
		return array('container', 'formatting', 'substition', 'protected', 'disabled', 'paragraphs');
	}
    function getPType(){ return 'stack';}

    /**
     * render ODT element, Open
     * (get Attributes, select ODT element that fits, render it, return element name)
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->p_open();
    }

    /**
     * render ODT element, Close
     */
    function renderODTElementClose($renderer, $element) {
		$renderer->p_close();
    }

}