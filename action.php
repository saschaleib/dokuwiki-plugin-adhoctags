<?php
/**
 * Action Component for the Ad-Hoc Tags Plugin
 *
 * @license	GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author	 Andreas Gohr <andi@splitbrain.org>
 * @author	 Sascha Leib <sascha.leib(at)kolmio.com>
 */

class action_plugin_adhoctags extends DokuWiki_Action_Plugin {

	/**
	* register the eventhandlers
	*
	* @author	Andreas Gohr <andi@splitbrain.org>
	* @author	Sascha Leib <sascha.leib(at)kolmio.com>
	*/
	function register(Doku_Event_Handler $controller){
		$controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'handle_toolbar', array ());
	}

	function handle_toolbar(Doku_Event $event, $param) {
		$syntaxDiv = $this->getConf('syntaxDiv');
		$syntaxSpan = $this->getConf('syntaxSpan');

		$event->data[] = array (
			'type'	=>	'picker',
			'title'	=>	$this->getLang('picker'),
			'icon'	=>	'../../plugins/adhoctags/images/code-tags.svg',
			'id'	=>	'tbbtn_adhoctagsInline',
			'list'	=>	array(
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('b').': <𝚋>',
					'icon'		=> '../../plugins/adhoctags/images/format-bold.svg',
					'open'		=> '<b>',
					'close'		=> '</b>',
					'sample'	=> 'Bold'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('i').': <𝚒>',
					'icon'		=> '../../plugins/adhoctags/images/format-italic.svg',
					'open'		=> '<i>',
					'close'		=> '</i>',
					'sample'	=> 'Italic'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('s').': <𝚜>',
					'icon'		=> '../../plugins/adhoctags/images/format-strikethrough-variant.svg',
					'open'		=> '<s>',
					'close'		=> '</s>',
					'sample'	=> 'Strikethrough'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('u').': <𝚞>',
					'icon'		=> '../../plugins/adhoctags/images/format-underline-wavy.svg',
					'open'		=> '<u>',
					'close'		=> '</u>',
					'sample'	=> 'Underline'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('small').': <𝚜𝚖𝚊𝚕𝚕>',
					'icon'		=> '../../plugins/adhoctags/images/format-size.svg',
					'open'		=> '<small>',
					'close'		=> '</small>',
					'sample'	=> 'smaller'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('q').': <𝚚>',
					'icon'		=> '../../plugins/adhoctags/images/format-quote-open.svg',
					'open'		=> '<q>',
					'close'		=> '</q>',
					'sample'	=> 'Quotation'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('abbr').': <𝚊𝚋𝚋𝚛>',
					'icon'		=> '../../plugins/adhoctags/images/abbr.svg',
					'open'		=> '<abbr>',
					'close'		=> '</abbr>',
					'sample'	=> 'ABBR'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('def').': <𝚍𝚏𝚗>',
					'icon'		=> '../../plugins/adhoctags/images/def.svg',
					'open'		=> '<dfn>',
					'close'		=> '</dfn>',
					'sample'	=> 'Definition'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('kbd').': <𝚔𝚋𝚍>',
					'icon'		=> '../../plugins/adhoctags/images/keyboard-variant.svg',
					'open'		=> '<kbd>',
					'close'		=> '</kbd>',
					'sample'	=> 'Ctrl'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('samp').': <𝚜𝚊𝚖𝚙>',
					'icon'		=> '../../plugins/adhoctags/images/export.svg',
					'open'		=> '<samp>',
					'close'		=> '</samp>',
					'sample'	=> 'Output'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('var').': <𝚟𝚊𝚛>',
					'icon'		=> '../../plugins/adhoctags/images/variable.svg',
					'open'		=> '<var>',
					'close'		=> '</var>',
					'sample'	=> 'x'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('cite').': <𝚌𝚒𝚝𝚎>',
					'icon'		=> '../../plugins/adhoctags/images/comment-quote-outline.svg',
					'open'		=> '<cite>',
					'close'		=> '</cite>',
					'sample'	=> 'Citation '
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('time').': <𝚝𝚒𝚖𝚎>',
					'icon'		=> '../../plugins/adhoctags/images/calendar-clock.svg',
					'open'		=> '<time>',
					'close'		=> '</time>',
					'sample'	=> 'datetime'
				)
			)
		);
		/* $event->data[] = array (  //<𝚊𝚋𝚌𝚍𝚎𝚏𝚐𝚑𝚒𝚓𝚔𝚕𝚖𝚗𝚘𝚙𝚚𝚛𝚎𝚜𝚝𝚞𝚟𝚠𝚡𝚢𝚣>
			'type'	=>	'picker',
			'title'	=>	"Block elements",
			'icon'	=>	'../../plugins/adhoctags/images/code-brackets.svg',
			'id'	=>	'tbbtn_adhoctagsBlock',
			'list'	=>	array(
				// TODO!
			)
		); */
	}
}

