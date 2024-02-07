<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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
<div class="item-wrap">
    <div class="rew-footer-carousel">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <div class="item">
                <div class="side-block side-opin" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="inner-block">
                        <div class="title">
                            <div class="photo-block">
                                <? if ($arItem["PREVIEW_PICTURE"]): ?>
                                    <?php
                                    $arImageFile = CFile::ResizeImageGet(
                                        $arItem["PREVIEW_PICTURE"]["ID"],
                                        ['width' => 39, 'height' => 39],
                                        BX_RESIZE_IMAGE_EXACT,
                                        true
                                    );
                                    $sPictureSrc = $arImageFile['src'];
                                    ?>
                                <? else: ?>
                                    <?php
                                    $sPictureSrc = SITE_TEMPLATE_PATH . '/img/rew/no_photo_left_block.jpg';
                                    ?>
                                <? endif; ?>
                                <img src="<?= $sPictureSrc ?>" alt="">
                            </div>
                            <div class="name-block">
                                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                    <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                                        <?= $arItem["NAME"] ?>
                                    <? endif; ?>
                                </a>
                            </div>
                            <div class="pos-block">
                                <? if ($arItem["DISPLAY_PROPERTIES"]["POSITION"]["DISPLAY_VALUE"]): ?>
                                    <?= ucfirst($arItem["DISPLAY_PROPERTIES"]["POSITION"]["DISPLAY_VALUE"]); ?>,
                                <? endif ?>
                                <? if ($arItem["DISPLAY_PROPERTIES"]["COMPANY"]["DISPLAY_VALUE"]): ?>
                                    <?= $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["DISPLAY_VALUE"]; ?>
                                <? endif ?>
                            </div>
                        </div>
                        <div class="text-block">
                            <?=TruncateText($arItem["PREVIEW_TEXT"], 150); ?>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>