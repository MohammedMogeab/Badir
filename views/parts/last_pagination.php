<section>
    <div>
        <a href="/charity_campaigns_index?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] - 1 : 1 ?>" style="<?php echo  $_GET['page_number'] - 1 <= 0 ? 'pointer-events: none; cursor: default;opacity: 0.3;' : 'pointer-events: auto; cursor: pointer' ?>"><img src="views/media/images/left.png" alt="previous" loading="lazy" heigh="50px" width="50px"></a>
        <div>
            <div>
                <div><?php echo (isset($_GET['page_number']) ? $_GET['page_number'] - 1 : 0) . " . . . "; ?></div>
                <div><?php echo "   " . isset($_GET['page_number']) ? $_GET['page_number'] : 1 . "   "; ?></div>
                <div><?php echo " . . . " . (isset($_GET['page_number']) ? $_GET['page_number'] + 1 : 2); ?></div>
            </div>
        </div>
        <a href="/charity_campaigns_index?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] + 1 : 2 ?>" style="<?php echo  $_GET['page_number'] + 1 > $pages_count['campaigns'] ? 'pointer-events: none; cursor: default;opacity: 0.3; ' : 'pointer-events: auto; cursor: pointer' ?>"><img src="views/media/images/next.png" alt="next" loading="lazy" heigh="50px" width="50px"></a>
    </div>
</section>