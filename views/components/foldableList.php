<?php if (count($links) > 0) : ?>
    <div class="foldable-list-container">
        <ul>
            <?php foreach ($links as $link) : ?>
                <li><a href="<?= $link['link'] ?>"><?= $link['label'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>