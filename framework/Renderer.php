<?php

namespace Framework;

use \Wa72\HtmlPageDom\HtmlPageCrawler;
use \Wa72\HtmlPageDom\HtmlPage;

class Renderer
{
	private $componentFactory;
	private $dom;
	private $head;
	private $body;
	private $scripts = array();
	private $links = array();

	function __construct($html)
	{
		$this->componentFactory = new ComponentFactory;
		$this->dom = new HtmlPage($html);
		$this->head = $this->dom->filter("head");
		$this->body = $this->dom->filter("body"); 
	}

	public function render()
	{
		$this->compileDOM($this->body);


		$links = "";
		foreach ($this->links as $path => $html) {
			$links .= $html;
		}
		$links = new HtmlPageCrawler($links);

		$scripts = "";
		foreach ($this->scripts as $path => $html) {
			$scripts .= $html;
		}
		$scripts = new HtmlPageCrawler($scripts);

		$refLink = $this->head
			 ->filter("link")
			 ->reduce(function(HtmlPageCrawler $link) {
				 if (isset($this->links[$link->attr("href")])) {
					 $link->remove();
					 return false;
				 }
				 return true;
			 });

		$refScript = $this->dom
			 ->filter("body > script")
			 ->reduce(function(HtmlPageCrawler $script) {
				 if (isset($this->scripts[$script->attr("src")])) {
					 $script->remove();
					 return false;
				 }
				 return true;
			 });

		if ($refScript->count() === 0) {
			$this->body->append($scripts);
		} else {
			$scripts->insertBefore($refScript);
		}

		if ($refLink->count() === 0) {
			$this->head->append($links);
		} else {
			$links->insertBefore($refLink);
		}

		return $this->dom->indent();
	}

	private function compileDOM($element)
	{
		$element->each(function(HtmlPageCrawler $node) {
			if ($this->componentFactory->hasComponent($node->nodeName())) {
				$this->handleComponent($node);
			}

			$this->compileDOM($node->children());
		});
	}

	private function handleComponent(HtmlPageCrawler $node)
	{
		$component = $this->componentFactory->getComponent($node->nodeName());
		(new $component["className"])->render($node);

		$this->absolutisePaths($node, $component);
		$this->gatherDependencies($node);
	}

	private function absolutisePaths(HtmlPageCrawler $element, $component) 
	{
		$tagUrlAttributeMap = array(
			'script' =>  "src",
			"link" => "href",
			"img" => "src"
		);

		foreach ($tagUrlAttributeMap as $tag => $attribute) {
			$element->filter($tag)->each(function(HtmlPageCrawler $node) use ($component, $attribute) {
				$attrValue = $node->attr($attribute);

				if ($attrValue[0] !== "/") {
					$node->attr($attribute, $component["componentRelativeDir"] . "/$attrValue");
				}
			});
		}
	}

	private function gatherDependencies(HtmlPageCrawler $element)
	{
		$element
			->filter("link")
			->each(function(HtmlPageCrawler $link) {
				if (!isset($this->links[$link->attr("href")])) {
					$this->links[$link->attr("href")] = $link->saveHTML();
				} 
				$link->remove();
			});

		$element
			->filter("script")
			->each(function(HtmlPageCrawler $script) {
				if (!isset($this->scripts[$script->attr("src")])) {
					$this->scripts[$script->attr("src")] = $script->saveHTML();
				}
				$script->remove();
			});
	}
}
?>
