<?php
/**
 * Inline Element Syntax Component of the adhoctags Plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_abstractinline extends syntax_plugin_adhoctags_abstract {

    protected $special_pattern	= '<%t%\b[^>\r\n]*?/>';
    protected $entry_pattern	= '<%t%\b.*?>(?=.*?</%t%>)'; // '%t%' is the placeholder for the tag name
    protected $exit_pattern		= '</%t%>';

    function getAllowedTypes() { return array('formatting', 'substition', 'disabled'); }
    function getPType(){ return 'normal';}


	/* Inline elements have a much simpler unmatched handling */
	function handleUnmatched($match, $state, $pos, Doku_Handler $handler) {
		$handler->addCall('cdata', array($match), $pos);
		return false;
	}
}