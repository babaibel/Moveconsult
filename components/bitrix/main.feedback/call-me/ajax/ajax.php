<?
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include.php");
    $arEventFields = Array(
        "TYPE_FORM" => $_POST["TYPE_FORM"].': '.$_POST["NAME"],
        //"EMAIL" => $_POST["EMAIL"],
        "PHONE" => $_POST["PHONE"],
        "TEXT" => $_POST["TEXT"],
        "TIME" => $_POST["TIME"],
        "NAME" => $_POST["NAME"]
    );
	echo CEvent::Send("FEEDBACK_FORM", "s1", $arEventFields);

}
?>