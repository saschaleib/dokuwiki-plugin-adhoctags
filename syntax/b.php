<?php
/**
 * "Bring Attention To" (Bold) element component for the adhoctags plugin
 *
 * Defines  <b> ... </b> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_b extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<b\b.*?>(?=.*?</b>)';
    protected $exit_pattern    = '</b>';
	protected $output_tag      = 'b';
}