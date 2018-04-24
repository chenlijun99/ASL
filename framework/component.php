<?php
abstract class Component 
{
	function __construct()
	{
	}

	public function show() 
	{
		echo $this->absolutisePaths($this->getTemplate());
	}
	public function getHTML()
	{
		return $this->absolutisePaths($this->getTemplate());
	}

	abstract protected function getTemplate();

	private function absolutisePaths($html) 
	{
		/* 
		 * use DocumentFragment because
		 * $dom->loadHTML() automatically wraps the given html
		 * with html, body, etc.
		 *
		 * see https://stackoverflow.com/a/23813838
		 */
		$dom = new DomDocument();
		$fragment = $dom->createDocumentFragment();
		$fragment->appendXML($html);
		$dom->appendChild($fragment);

		$tagUrlAttributeMap = array(
			'script' =>  "src",
			"style" => "href",
			"img" => "src"
		);

		$dir = $this->getAbsoluteDirectory();
		foreach ($tagUrlAttributeMap as $tag => $attribute) {
			$nodes = $dom->getElementsByTagName($tag);
			foreach ($nodes as $node) {
				$path = $node->getAttribute($attribute);
				if ($path[0] != "/") {
					$node->setAttribute($attribute, $dir . "/" . $path);
				}
			}
		}
		return $dom->saveHTML();
	}

	private function getAbsoluteDirectory()
	{
		$root = $_SERVER["DOCUMENT_ROOT"];

		$reflector = new ReflectionClass(get_class($this));
		$path_parts = pathinfo($reflector->getFileName());

		return substr($path_parts["dirname"], strlen($root));
	}
}
?>
