# DokuWiki Plugin Ad-Hoc Tags
A secure but flexible way to insert HTML tags into DokuWiki

This is an attempt to enable direct insertion of HTML tags in DokuWiki that is not reliant on the HTML option, which will not be available any more in the near future.

More information on the [Plugin Page on DokuWiki](https://www.dokuwiki.org/plugin:adhoctags).

## Tags/Elements

The following HTML tags are added by this plugin (in alphabetic order):

- `<abbr>` – “[Abbreviation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr)”

- `<address>` – “[Address](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/address)”

- `<article>` – “[Article](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article)”

- `<aside>` – “[Aside](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/aside)”

- `<b>` – “[Bring Attention To](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b)” (also known as “bold”)

- `<bdi>` – “[Bidirectional Isolate](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdi)” and `<bdo>` – “[Bidirectional Text Override](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdo)” 

- `<cite>` – “[Citation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite)”

- `<details>` – “[Details](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details)” and `<summary>` – “[Summary](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/summary)”

- `<dfn>` – “[Definition](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn)”

- `<dl>` – “[Description list](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dl)”, `<dt>` – “[Description term](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dt)”, and `<dd>` – “[Description details](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dd)”

- `<div>` – “[Generic block](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div)”

- `<figure>` – “[Figure](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure)” and `<figcaption>` – “[Figure caption](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption)”

- `<h1>` … `<h6>` – “[Section Heading Elements](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements)”

- `<i>` – “[Idiomatic Text](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/i)” (also known as “italic”)

- `<kbd>` – “[Keyboard Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/kbd)”

- `<mark>` — “[Mark text](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/mark)”

- `<pre>` – “[Preformatted Text](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre)”

- `<q>` – “[Inline Quotation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/q)”

- `<s>` – “[Strikethrough](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/s)”

- `<samp>` – “[Sample Output](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/samp)”

- `<section>` – “[Section](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/section)”

- `<small>` — “[Side content](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/small)” (smaller)

- `<span>` — “[Content span](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span)”

- `<time>` – “[Date/Time](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time)”

- `<u>` – “[Unarticulated Annotation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u)” (also known as “underline”)

- `<var>` – “[Variable](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/var)”

Please note that `<div>` and `<span>` are also handled by the [Wrap](https://github.com/selfthinker/dokuwiki_plugin_wrap) Plugin and having them enabled while Wrap is also active can lead to unexpected results. If you need the attribute features of this plugin with these tags, it is better to disable Wrap, and possibly use [Ad-Hoc Wrap](https://github.com/saschaleib/dokuwiki-plugin-adhocwrap) instead as a replacement.

## Attributes

Instead of specifying the attributes in the HTML format, this plugin replicates and expands the formats used by the **wrap** plugin, which allows to specify the attributes as in the following example:

`<tagname #tagid csswidth :lang &datetime classname classname2>`

- `#tagid` – any valid HTML id, prefixed by a hash (`#`) will be used as the element’s ID.

- `csswidth` – a valid width specification, as used by CSS (examples: `50%`, `24em`, `460px`, etc.).

  Note: This option is still included for compatibility, but it is generally not recommended because it can cause layout issues on smaller screens (e.g. smartphones).

- `:lang` – a colon (`:`), followed by a valid [BCP47](https://www.rfc-editor.org/info/bcp47) language code. Examples: `:en`, `:fr-CH`, `:grc-Latn`, etc. See also: “[Declaring language in HTML](https://www.w3.org/International/questions/qa-html-language-declarations)”.

  Note: this will also set the HTML `dir` attribute: either by setting a language code that has a default RTL script, or by appending a script tag that refers to a RTL script (e.g. `Arab` or `Hebr`). The resulting text direction can still be overriden by the `[dir=…]` attribute (see below)
  
- `"Title text"` – A string that is enclosed in double quotes will be rendered as `title`.

- `classname` – anything that does matches a valid CSS class name (and none of the other formats) will be treated as a class name.

- `[name=value]` – extended format for all other allowed attributes. For example, `[style=color:red]`, or `[dir=ltr]` to override the text direction set by the `:lang` attribute, etc.

Generally, attributes can appear in any order and are always optional!

## Migration Notes

If you previously used `<html>` tags to embed HTML code into your DokuWiki site, you need to replace them with the format used by this plugin. The best way to get started is to make a run a couple  of search-replace operations on the `data/pages/` directory in your DokuWiki installation.

:bangbang: **Important:** It is advisable to run the following searches on a *copy* of this directory and also keep a backup of the original state, in case of problems that only show up later. The following search-replace operations can do serious damage to your site content. The autor does not take any responsibility for any damages that follow from applying this procedure: :bangbang:

:information_source: **Tool:** The autor has made good experiences with the Search-Replace function of [Notepad++](https://github.com/notepad-plus-plus/notepad-plus-plus), an open-source, free and very powerful text editor for Windows. Other editors may of course also offer similar functionality.

**1. Remove the *\<html\>* tags**

- Search for `<html>`in default mode, replace with an empty string.
- Search for `</html>`in default mode, replace with an empty string.

**2. Remove the attribute name from *title="…"* attributes**

- search for ` title="` (note the space in front!) in standard mode, replace with ` "` (space + quotation mark)

**3. Format the language specifications (if needed)

- Search for ` lang="([^\"]*)"` in *regex mode* (!), replace with ` :$1` (note: spaces in front of each!)

**4. Simplify any *class*es**

- Search for ` class="([^\"]*)"` in *regex mode* (!), replace with ` $1` (note the spaces again!)

In most cases, these should take care of the vast majority of HTML attributes. Make sure to check each file and clean up anything that these searches didn't catch.

If needed, similar searches can also be used for other attributes (e.g. ` style="([^\"]*)"` -> ` [style=$1]` for style), but it is probably a good idea to manually update these, rather than relying on automatisms.
