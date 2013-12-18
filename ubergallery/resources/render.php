<link rel="stylesheet" type="text/css" href="/wp-content/plugins/ubergallery/resources/rebase-min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo UBERGALLERY_STYLE_PATH_RELATIVE; ?>" />
<?php echo $gallery->getColorboxStyles(5); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<?php echo $gallery->getColorboxScripts(); ?>

<!-- Start UberGallery v<?php echo UberGallery::VERSION; ?> - Copyright (c) <?php echo date('Y'); ?> Chris Kankiewicz (http://www.ChrisKankiewicz.com) -->
<div id="galleryWrapper">
    <div id="galleryListWrapper">
        <?php if (!empty($galleryArray) && $galleryArray['stats']['total_images'] > 0): ?>
            <ul id="galleryList" class="clearfix">
                <?php foreach ($galleryArray['images'] as $image): ?>
                    <li><a href="<?php echo $image['file_path']; ?>" title="<?php echo $image['file_title']; ?>" rel="colorbox"><img src="<?php echo $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>"/></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="line"></div>
    <div id="galleryFooter" class="clearfix">

        <?php if ($galleryArray['stats']['total_pages'] > 1): ?>
        <ul id="galleryPagination">

            <?php foreach ($galleryArray['paginator'] as $item): ?>

                <li class="<?php echo $item['class']; ?>">
                    <?php if (!empty($item['href'])): ?>
                        <a href="<?php echo $item['href']; ?>"><?php echo $item['text']; ?></a>
                    <?php else: ?><?php echo $item['text']; ?><?php endif; ?>
                </li>

            <?php endforeach; ?>

        </ul>
        <?php endif; ?>
    </div>
</div>
<!-- End UberGallery - Distributed under the MIT license: http://www.opensource.org/licenses/mit-license.php -->
