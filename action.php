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
		$allowedElements = explode(',',$this->getConf('allowedElements'));

		/* collect the allowed elements here: */
		$iconList = array();
		
		/* bold */
		if (in_array('b', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('b').': <𝚋>',
				'icon'		=> '../../plugins/adhoctags/images/format-bold.svg',
				'open'		=> '<b>',
				'close'		=> '</b>',
				'sample'	=> 'Bold'
			));
		};
		/* italic */
		if (in_array('i', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('i').': <𝚒>',
				'icon'		=> '../../plugins/adhoctags/images/format-italic.svg',
				'open'		=> '<i>',
				'close'		=> '</i>',
				'sample'	=> 'Italic'
			));
		};
		/* strikethrough */
		if (in_array('s', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('s').': <𝚜>',
				'icon'		=> '../../plugins/adhoctags/images/format-strikethrough-variant.svg',
				'open'		=> '<s>',
				'close'		=> '</s>',
				'sample'	=> 'Strikethrough'
			));
		};
				
		/* underline */
		if (in_array('u', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('u').': <𝚞>',
				'icon'		=> '../../plugins/adhoctags/images/format-underline-wavy.svg',
				'open'		=> '<u>',
				'close'		=> '</u>',
				'sample'	=> 'Underline'
			));
		};
		/* small */
		if (in_array('small', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('small').': <𝚜𝚖𝚊𝚕𝚕>',
				'icon'		=> '../../plugins/adhoctags/images/format-size.svg',
				'open'		=> '<small>',
				'close'		=> '</small>',
				'sample'	=> 'smaller'
			));
		};
		/* quote */
		if (in_array('q', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('q').': <𝚚>',
				'icon'		=> '../../plugins/adhoctags/images/format-quote-open.svg',
				'open'		=> '<q>',
				'close'		=> '</q>',
				'sample'	=> 'Quotation'
			));
		};
		/* abbreviation */
		if (in_array('abbr', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('abbr').': <𝚊𝚋𝚋𝚛>',
				'icon'		=> '../../plugins/adhoctags/images/abbr.svg',
				'open'		=> '<abbr>',
				'close'		=> '</abbr>',
				'sample'	=> 'ABBR'
			));
		};
		/* definition */
		if (in_array('dfn', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('dfn').': <𝚍𝚏𝚗>',
				'icon'		=> '../../plugins/adhoctags/images/def.svg',
				'open'		=> '<dfn>',
				'close'		=> '</dfn>',
				'sample'	=> 'Definition'
			));
		};
		/* keyboard */
		if (in_array('kbd', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('kbd').': <𝚔𝚋𝚍>',
				'icon'		=> '../../plugins/adhoctags/images/keyboard-variant.svg',
				'open'		=> '<kbd>',
				'close'		=> '</kbd>',
				'sample'	=> 'Ctrl'
			));
		};
		/* sample */
		if (in_array('samp', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('samp').': <𝚜𝚊𝚖𝚙>',
				'icon'		=> '../../plugins/adhoctags/images/export.svg',
				'open'		=> '<samp>',
				'close'		=> '</samp>',
				'sample'	=> 'Output'
			));
		};
		/* variable */
		if (in_array('var', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('var').': <𝚟𝚊𝚛>',
				'icon'		=> '../../plugins/adhoctags/images/variable.svg',
				'open'		=> '<var>',
				'close'		=> '</var>',
				'sample'	=> 'x'
			));
		};
		/* marker */
		if (in_array('mark', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('mark').': <𝚖𝚊𝚛𝚔>',
				'icon'		=> '../../plugins/adhoctags/images/format-color-highlight.svg',
				'open'		=> '<mark>',
				'close'		=> '</mark>',
				'sample'	=> 'marked'
			));
		};
		/* citation */
		if (in_array('cite', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('cite').': <𝚌𝚒𝚝𝚎>',
				'icon'		=> '../../plugins/adhoctags/images/comment-quote-outline.svg',
				'open'		=> '<cite>',
				'close'		=> '</cite>',
				'sample'	=> 'Citation'
			));
		};
		/* date-time */
		if (in_array('time', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('time').': <𝚝𝚒𝚖𝚎>',
				'icon'		=> '../../plugins/adhoctags/images/calendar-clock.svg',
				'open'		=> '<time>',
				'close'		=> '</time>',
				'sample'	=> 'datetime'
			));
		};
		/* image */
		if (in_array('img', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('img').': <img>',
				'icon'		=> '../../plugins/adhoctags/images/image-outline.svg',
				'open'		=> '<img [src=',
				'close'		=> '] [width=64] [height=64] "alt" />',
				'sample'	=> 'imagepath'
			));
		};
		/* section */
		if (in_array('section', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('section').': <𝚜𝚎𝚌𝚝𝚒𝚘𝚗>',
				'icon'		=> '../../plugins/adhoctags/images/code-brackets.svg',
				'open'		=> '<section>\n',
				'close'		=> '\n</section>',
				'sample'	=> 'Section'
			));
		};
		/* figure + figcaption */
		if (in_array('figure', $allowedElements) && in_array('figcaption', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('figure').': <𝚏𝚒𝚐𝚞𝚛𝚎>/<𝚏𝚒𝚐𝚌𝚊𝚙𝚝𝚒𝚘𝚗>',
				'icon'		=> '../../plugins/adhoctags/images/figure-caption.svg',
				'open'		=> '<figure>\n',
				'close'		=> '\n<figcaption>Caption</figcaption>\n</figure>',
				'sample'	=> 'figure content'
			));
		};
		/* aside */
		if (in_array('aside', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('aside').': <𝚊𝚜𝚒𝚍𝚎>',
				'icon'		=> '../../plugins/adhoctags/images/aside.svg',
				'open'		=> '<aside>\n',
				'close'		=> '\n</aside>',
				'sample'	=> 'Aside text'
			));
		};
		/* article */
		if (in_array('article', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('article').': <𝚊𝚛𝚝𝚒𝚌𝚕𝚎>',
				'icon'		=> '../../plugins/adhoctags/images/subtitles-outline.svg',
				'open'		=> '<article>\n',
				'close'		=> '\n</article>',
				'sample'	=> 'Article text'
			));
		};
		/* definition lists */
		if (in_array('dl', $allowedElements) && in_array('dt', $allowedElements) && in_array('dd', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('dl').': <𝚍𝚕>/<𝚍𝚝>/<𝚍𝚍>',
				'icon'		=> '../../plugins/adhoctags/images/definition-list.svg',
				'open'		=> '<dl>\n<dt>',
				'close'		=> '</dt>\n<dd>Description</dd>\n</dl>',
				'sample'	=> 'Term'
			));
		};
		/* address */
		if (in_array('address', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('address').': <𝚊𝚍𝚍𝚛𝚎𝚜𝚜>',
				'icon'		=> '../../plugins/adhoctags/images/card-account-details-outline.svg',
				'open'		=> '<address>\n',
				'close'		=> '\n</address>',
				'sample'	=> 'Address' . print_r($allowedElements, true)
			));
		};
		/* details + summary */
		if (in_array('details', $allowedElements) && in_array('summary', $allowedElements)) {
			array_push($iconList, array(
				'type'		=> 'format',
				'title'		=> $this->getLang('details').': <𝚍𝚎𝚝𝚊𝚒𝚕𝚜>/<𝚜𝚞𝚖𝚖𝚊𝚛𝚢>',
				'icon'		=> '../../plugins/adhoctags/images/details-summary.svg',
				'open'		=> '<details><summary>',
				'close'		=> '</summary>\nDetails\n</details>',
				'sample'	=> 'Summary'
			));
		};

		/* create the menu */
		if (count($iconList) > 0) {
			$event->data[] = array (
				'type'	=>	'picker',
				'title'	=>	$this->getLang('picker'),
				'icon'	=>	'../../plugins/adhoctags/images/code-tags.svg',
				'id'	=>	'tbbtn_adhoctagsInline',
				'list'	=>	$iconList
			);
		}
	}
}