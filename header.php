<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?> 
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title><?$APPLICATION->ShowTitle()?></title>
	<?$APPLICATION->ShowHead();?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/plagins/bxslider/bxslider.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/css_browser_selector.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/clear-form-feilds.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/flipsnap.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.main.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.form.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jClever.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/plagins/bxslider/bxslider.css">
	<?$APPLICATION->AddHeadScript('scr');?>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	</head>
	<body class="service-page">
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	
	<div id="f_icone">
		<div id="zapros"  class="btn-exz btn-exz1"><a class="block zapros" href="javascript:void(0)"></a><span>Задать вопрос</span></div>
		<div class="clear"></div>
		<div id="ex_z" class="btn-exz " style="margin-top:3px;"><div  class="ex_z"></div><span>Экспресс-заявка на обслуживание</span></div>
	</div>
	
	
	<?$APPLICATION->IncludeFile(SITE_DIR."include/zapros.php",Array(),Array("MODE"=>"html"));?>
	<?$APPLICATION->IncludeFile(SITE_DIR."include/ex_z.php",Array(),Array("MODE"=>"html"));?>
	<?   

	    $page = $APPLICATION->GetCurPage();	    
        $dir = explode("/", $page);
	?>
	<section class="wrapper 111">
	<div id="form-bg"></div>
		
			<!-- header -->
			<header>
				<div class="container h100p relative">
					<div id="logo-m">
						<strong class="logo"><a href="/">MOVECONSULTING</a></strong>
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"main_top",
							Array(
								"ROOT_MENU_TYPE" => "top",
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "top",
								"USE_EXT" => "N",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_CACHE_GET_VARS" => array()
							),
						false
						);?>
					</div>
					<div class="panel lang-box">
						<ul class="lang">
							<li>
								<span class="img-holder ">
									<img src="<?=SITE_TEMPLATE_PATH?>/images/ico-1.png" alt="image description" width="18" height="12" />
								</span>
								EN
							</li>
							<li><img style="margin-top:2px;" src="<?=SITE_TEMPLATE_PATH?>/images/login-icon.png" alt="login"> <noindex><a target="_blank" rel="nofollow" href="https://worksection.com/login.html"><?=GetMessage("ENTER");?></a></noindex></li>
						</ul>
					</div>
					<div class="phone">+7 (495) 66-99-22-7</div>
					<div class="panel login">
						<form action="#" class="sign">
							<fieldset>
								<div class="wrap">
									<span><input type="text" value="<?=GetMessage("LOGIN");?>" class="text"></span>
									<span><span class="input-placeholder-text" style="color: rgb(178, 178, 178); position: absolute;"><?=GetMessage("PASS");?></span><input type="password" class="text"></span>
									<input type="submit" value="<?=GetMessage("ENTER");?>" class="btn-sign">
								</div>
								<div class="wrap">
									<a href="#" class="reg"><?=GetMessage("REG");?></a>
									<a href="#" class="forgot"><?=GetMessage("WHY_PASS");?></a>
								</div>
							</fieldset>
						</form>
					</div>
					
				</div>
			</header>
			<!-- header end -->
			<!-- main -->
			<?if($page != "/"){?>
			<div class="w1"> 
			<?}?>			
				<section class="main" id="ajax-main">
				