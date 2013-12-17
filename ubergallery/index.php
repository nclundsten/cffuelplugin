<?php if($gallery->getSystemMessages()): ?>
    <ul id="systemMessages">
        <?php foreach($gallery->getSystemMessages() as $message): ?>
            <li class="<?php echo $message['type']; ?>">
                <?php echo $message['text']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div id="galleryListWrapper">
    <?php if (!empty($galleryArray) && $galleryArray['stats']['total_images'] > 0): ?>
        <ul id="galleryList" class="clearfix">
            <?php foreach ($galleryArray['images'] as $image): ?>
                <li><a href="<?php echo $image['file_path']; ?>" title="<?php echo $image['file_title']; ?>" rel="colorbox"><img src="<?php echo $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>"/></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
