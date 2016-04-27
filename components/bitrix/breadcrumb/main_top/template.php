<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<ul class="breadcrumbs">';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if($arResult[$index]["LINK"]!="/services/"):
	//if($arResult[$index]["LINK"]!="/about/"):
		$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
		if($arResult[$index]["LINK"] <> "")
			$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
		else
			$strReturn .= '<li>'.$title.'</li>';
	//endif;
	endif;
}

$strReturn .= '</ul>';
return $strReturn;
?>