<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID"=>IntVal($arResult["ID"]), "ACTIVE"=>"N");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
	$arResult["ITEMS_N"][] = $ob->GetFields();
}
?>