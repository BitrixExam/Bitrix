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
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("AZAZAZAZAZAZAZAZAZA")));
    ?>
	<div class="review-block" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
		<div class="review-text">
			<div class="review-block-title"><span class="review-block-name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></span><span class="review-block-description"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
					<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
						<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
							<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
						<?else:?>
							<?=$arProperty["DISPLAY_VALUE"];?>
						<?endif?>
					<?endforeach;?></div>
				</span>
			<div class="review-text-cont">
			<?echo $arItem["PREVIEW_TEXT"];?>
			</div>
		</div>
		<div class="review-img-wrap">
		<?if($arItem["PREVIEW_PICTURE"]["SRC"] == true):?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" style="float:left"/></a>
		<?else:?>
			<img class="preview_picture" border="0" src="<?=SITE_TEMPLATE_PATH?>/img/rew/no_photo.jpg" style="float:left"/>
		<?endif?>
		</div>
	</div>
<?endforeach?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

