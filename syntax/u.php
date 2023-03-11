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

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<u\b.*?>(?=.*?</u>)';
    protected $exit_pattern    = '</u>';
	protected $output_tag      = 'u';
}