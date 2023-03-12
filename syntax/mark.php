<?php
/**
 * Mark Text element component for the adhoctags plugin
 *
 * Defines  <mark> ... </mark> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/mark
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_mark extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<mark\b.*?>(?=.*?</mark>)';
    protected $exit_pattern    = '</mark>';
	protected $output_tag      = 'mark';

	/* can be disabled in the settings along with <span> (currently not active because not needed)
	protected function registerTag() {
		return (bool) $this->getConf('handleSpan');
	} */
}