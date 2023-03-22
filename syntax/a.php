<?php
/**
 * "Anchor" (Link) element component for the adhoctags plugin
 *
 * Defines  <a> ... </a> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_a extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'a';

	protected $extra_attr = array('href','rel','target','hreflang');

}