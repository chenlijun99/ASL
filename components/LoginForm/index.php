<?php

use ASL\ASLForm;
use \Wa72\HtmlPageDom\HtmlPageCrawler;

class LoginForm extends ASLForm
{
	public function render($element)
	{
		ASLForm::render($element)
			->append(
				file_get_contents("template.html", FILE_USE_INCLUDE_PATH)
			);

		$form = $element->filter("form");
		$form->attr("action", $element->attr("action"));
		if (isset($_GET["login_error"])) {
			$form->append(
				file_get_contents("$_GET[login_error].html", FILE_USE_INCLUDE_PATH)
			);
		}

		return $element;
	}
}
?>
