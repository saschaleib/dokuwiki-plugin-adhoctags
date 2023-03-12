<?php
/**
 * Abbreviation element syntax component for the adhoctags plugin
 *
 * Defines  <abbr> ... </abbr> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr
 *
 * Note: <abbr> tags (including titles) are also inserted by DokuWiki for known abbreviations!
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_abbr extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'abbr';

}