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
				/* inline elements */
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
					'title'		=> $this->getLang('dfn').': <𝚍𝚏𝚗>',
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
					'title'		=> $this->getLang('mark').': <𝚖𝚊𝚛𝚔>',
					'icon'		=> '../../plugins/adhoctags/images/format-color-highlight.svg',
					'open'		=> '<mark>',
					'close'		=> '</mark>',
					'sample'	=> 'marked'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('cite').': <𝚌𝚒𝚝𝚎>',
					'icon'		=> '../../plugins/adhoctags/images/comment-quote-outline.svg',
					'open'		=> '<cite>',
					'close'		=> '</cite>',
					'sample'	=> 'Citation'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('time').': <𝚝𝚒𝚖𝚎>',
					'icon'		=> '../../plugins/adhoctags/images/calendar-clock.svg',
					'open'		=> '<time>',
					'close'		=> '</time>',
					'sample'	=> 'datetime'
				),
				/* block-level elements: */
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('dl').': <𝚍𝚕>/<𝚍𝚝>/<𝚍𝚍>',
					'icon'		=> '../../plugins/adhoctags/images/definition-list.svg',
					'open'		=> '<dl>\n<dt>',
					'close'		=> '</dt>\n<dd>Description</dd>\n</dl>',
					'sample'	=> 'Term'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('section').': <𝚜𝚎𝚌𝚝𝚒𝚘𝚗>',
					'icon'		=> '../../plugins/adhoctags/images/code-brackets.svg',
					'open'		=> '<section>\n',
					'close'		=> '\n</section>',
					'sample'	=> 'Section'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('figure').': <𝚏𝚒𝚐𝚞𝚛𝚎>/<𝚏𝚒𝚐𝚌𝚊𝚙𝚝𝚒𝚘𝚗>',
					'icon'		=> '../../plugins/adhoctags/images/figure-caption.svg',
					'open'		=> '<figure>\n',
					'close'		=> '\n<figcaption>Caption</figcaption>\n</figure>',
					'sample'	=> 'figure content'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('aside').': <𝚊𝚜𝚒𝚍𝚎>',
					'icon'		=> '../../plugins/adhoctags/images/aside.svg',
					'open'		=> '<aside>\n',
					'close'		=> '\n</aside>',
					'sample'	=> 'Aside text'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('article').': <𝚊𝚛𝚝𝚒𝚌𝚕𝚎>',
					'icon'		=> '../../plugins/adhoctags/images/subtitles-outline.svg',
					'open'		=> '<article>\n',
					'close'		=> '\n</article>',
					'sample'	=> 'Article text'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('address').': <𝚊𝚍𝚍𝚛𝚎𝚜𝚜>',
					'icon'		=> '../../plugins/adhoctags/images/card-account-details-outline.svg',
					'open'		=> '<address>\n',
					'close'		=> '\n</address>',
					'sample'	=> 'Address'
				),
				array(
					'type'		=> 'format',
					'title'		=> $this->getLang('details').': <𝚍𝚎𝚝𝚊𝚒𝚕𝚜>/<𝚜𝚞𝚖𝚖𝚊𝚛𝚢>',
					'icon'		=> '../../plugins/adhoctags/images/details-summary.svg',
					'open'		=> '<details><summary>',
					'close'		=> '</summary>\nDetails\n</details>',
					'sample'	=> 'Summary'
				)
			)
		);
	}
}

