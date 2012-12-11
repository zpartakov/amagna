<?php
/**
 * Class to assist with highlighting keywords
 *
 * @package app
 * @subpackage app.views.helpers
 * @example echo $glossary->highlight(RELATIVE/PATH/TO/IMAGE/FROM/WEBROOT, WIDTH, HEIGHT, MODE) 
 * @author Richard Milns (rich@milns.com)
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * 
 * //whishlist:adapt, see libs/functions : glossaire

**/
class GlossaryHelper extends AppHelper {
	public $classToApply = 'glossary-definition tooltip';
	public $titleAttribute = 'title';
	private $model = 'Glossaire';
	private $modelGlossaryTitle = 'libelle';
	private $modelGlossaryDescription = 'definition1';

	/**
	 * undocumented function
	 *
	 * @return string including highlighted words
	 * @author Richard Milns
	 **/
	function testg($x){
		echo "yo";
	}
//	function highlight($text, $definitions) {
	function highlight($text) {
		echo "yo1";
		/*
		$titles = Set::extract($definitions, '{n}.' . $this->model . '.' . $this->modelGlossaryTitle);
		$definitions = Set::extract($definitions, '{n}.' . $this->model . '.' . $this->modelGlossaryDescription);
		// match the following
		$pattern = "#>([^<]*)\b%s\b([^<]*<(?!/a>))#is";
		// replacement template
		$replacement = ">$1<a id='%s' class='%s' %s='%s'>%s</a>$2";
		$replace = array();
		$find = array();
		// loop through titles and definitions, formatting our patterns before we replace
		for ($i=0; $i < count($titles); $i++) { 
			// generate random ID for benefit of Javascript
			$id = Inflector::slug($this->classToApply . rand(0,99999));
			// populate our match templates
			$find[$i] = sprintf($pattern, $titles[$i]);
			$replace[$i] = sprintf($replacement, $id, $this->classToApply, $this->titleAttribute, '__bold__' . $titles[$i] . '__/bold____break__' . $definitions[$i], $titles[$i]);
		}
		$text = preg_replace($find,$replace,$text,1);
		// because <strong> or <b> tags (or other HTML tags) cause issues in the above preg_replace when they are inside the 'title' attribute of the replaced text element where the matched keyword is also present, we used proprietry tags which we can safely replace now
		$text = str_replace(array('__bold__', '__/bold__', '__break__', '__italic__', '__/italic__'), array('<strong>', '</strong>', '<br/>', '<i>', '</i>'), $text);
		*/
		return $this->output($text);
		
	}
}
?>