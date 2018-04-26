<?php

namespace Componentizer;

use \Wa72\HtmlPageDom\HtmlPageCrawler;
use \Wa72\HtmlPageDom\HtmlPage;

class Renderer
{
	private $componentFactory;
	private $dom;
	private $head;
	private $body;

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

		$links = array();
		$this->head->append(
			$node
				->filter("link")
				->reduce(function(HtmlPageCrawler $link) use (&$links) {
					if (isset($links[$link->attr("href")]) || 
						$this->head->filter("link[href=\"{$link->attr("href")}\"]")->count() !== 0) {

						$link->remove();
						return false;
					}

					$links[$link->attr("href")] = true;
					return true;
				})
		);

		$scripts = array();
		$this->body->append(
			$node
				->filter("script")
				->reduce(function(HtmlPageCrawler $script) use (&$scripts) {
					if (isset($scripts[$script->attr("src")]) ||
						$this->dom->filter("body>script[src=\"{$script->attr("src")}\"]")->count() !== 0) {

						$script->remove();
						return false;
					}

					$scripts[$script->attr("src")] = true;
					return true;
				})
		);
	}

	private function absolutisePaths(HtmlPageCrawler $element, $component) 
	{
		$tagUrlAttributeMap = array(
			'script' =>  "src",
			"style" => "href",
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
}
?>
