<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(sizeof($arResult["PROPERTIES"]["CML2"]["VALUE"])>0):
	$idall =  array();
	foreach($arResult["PROPERTIES"]["CML2"]["VALUE"] as $value):
		$idall[] = $value;
	endforeach;
	//запрос
	if(sizeof($idall)>0):
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "DETAIL_TEXT");
	$arFilter = Array("IBLOCK_ID"=>7, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$idall);
	$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arResult["PROPERTIES"]["CML2"]["VALUE_RES"][] = $arFields;
	}
	endif;
endif;
$allSection = array();

	$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE","DETAIL_PICTURE","DETAIL_PAGE_URL","PREVIEW_TEXT");
	$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, array("nPageSize"=>8), $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arFields["PREVIEW_PICTURE"] = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
		$arFields["DETAIL_PICTURE"] = CFile::GetPath($arFields["DETAIL_PICTURE"]);
		$allSection[] = $arFields;
	}
	$arResult["ALLSECTION"] = $allSection;
?>