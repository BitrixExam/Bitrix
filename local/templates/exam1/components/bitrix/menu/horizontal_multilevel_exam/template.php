<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<nav class="nav">
    <div class="inner-wrap">
        <div class="menu-block popup-wrap">
            <a href="" class="btn-menu btn-toggle"></a>
            <div class="menu popup-block">
                <ul class="">

					<li class="main-page"><a href="/"><?=GetMessage('MAIN');?></a></li>
					
					<?
					$previousLevel = 0;
					foreach($arResult as $arItem):?>

						<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
							<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
						<?endif?>
						<?
							$style = '';
							if (isset($arItem["PARAMS"]["CLASS"])) {
								$style = $arItem["PARAMS"]["CLASS"];
							}
						?>

						<?if ($arItem["IS_PARENT"]):?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>

								<li <?if (isset($arItem['PARAMS']['IMG'])):?> class="main-page"<?endif?>><a href="<?=$arItem["LINK"]?>" class="<?=$style?>" <?if (isset($arItem['PARAMS']['IMG'])):?> style="background-image: url(<?=$arItem['PARAMS']['IMG']?>)"<?endif?>><?=$arItem["TEXT"]?></a>
									<ul>
									<?if ($arItem["PARAM"]["DESCRIPTION"]):?>
										<div class="menu-text"><?=$arItem["PARAM"]["DESCRIPTION"]?></div>
									<?endif?>
							<?else:?>
								<li ><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
									<ul>

									
							<?endif?>

								<? if (isset($arItem["PARAMS"]["DESCRIPTION"])) { ?>
									<div class='menu-text'><?=$arItem["PARAMS"]["DESCRIPTION"];?></div>
								<? } ?>

						<?else:?>

							<?if ($arItem["PERMISSION"] > "D"):?>

								<?if ($arItem["DEPTH_LEVEL"] == 1):?>
									<li><a href="<?=$arItem["LINK"]?>" class="<?=$style?>"><?=$arItem["TEXT"]?></a></li>
								<?else:?>
									<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
								<?endif?>

							<?else:?>

								<?if ($arItem["DEPTH_LEVEL"] == 1):?>
									<li><a href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
								<?else:?>
									<li><a href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
								<?endif?>

							<?endif?>

						<?endif?>

						<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

					<?endforeach?>

					<?if ($previousLevel > 1):?>
						<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
					<?endif?>
				</ul>
				<a href="" class="btn-close"></a>
            </div>
            <div class="menu-overlay"></div>
        </div>
    </div>
</nav>
<?endif?>
