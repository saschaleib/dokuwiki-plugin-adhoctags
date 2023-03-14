<?php
/**
 * Headline Level 6 element component for the adhoctags plugin
 *
 * Defines  <h6> ... </h6> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_h6 extends syntax_plugin_adhoctags_abstractblock {

	protected $tag	= 'h6';
	
    function getPType(){ return 'block';}

}