<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<hr>
<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?=$arResult["DETAIL_TEXT"]?>
		</div>
		<div class="review-autor">
			<?=$arResult["NAME"]?><?if($arResult["DISPLAY_ACTIVE_FROM"]): ?>, <?=$arResult["DISPLAY_ACTIVE_FROM"]?><?endif?><?if($arResult["PROPERTIES"]["POSITION"]["VALUE"]):?>, <?=$arResult["PROPERTIES"]["POSITION"]["VALUE"]?><?endif?><?php if($arResult["PROPERTIES"]["COMPANY"]["VALUE"]): ?>, <?=$arResult["PROPERTIES"]["COMPANY"]["VALUE"]?><?endif?>.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
	<?if ($arResult["DETAIL_PICTURE"]["SRC"]):?>
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="img"></div>
	<?else:?>
		<img src="<?=SITE_TEMPLATE_PATH?>/img/rew/no_photo.jpg" alt=""></div>
	<?endif?>
</div>
<?if ($arResult["DISPLAY_PROPERTIES"]["FILE"]):?>
	<div class="exam-review-doc">
		<p><?GetMessage("DOCUMENTS");?>Документы:</p>
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"] as $arItem):?>
			<div class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"><a href="<?=$arItem["SRC"]?>" target="_blank" download><?=$arItem["ORIGINAL_NAME"]?></a></div>
		<?endforeach?>
	</div>	
<?endif?>
<hr>
