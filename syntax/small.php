<?php
/**
 * Side comment (small) element component for the adhoctags plugin
 *
 * Defines  <small> ... </small> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/small
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_small extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<small\b.*?>(?=.*?</small>)';
    protected $exit_pattern    = '</small>';
	protected $output_tag      = 'small';
}