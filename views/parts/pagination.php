<!-- شريط التنقل -->

<div style="display: flex; justify-content: space-around; width: 100%;">
<div style="display: flex; width: 50%; justify-content: space-around; ; height:20px; padding: 40px; align-self:center; align-items: center; text-align: center;">
    <a href="/<?= $page?>?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] - 1 : 1 ?>" style="<?php echo !isset($_GET['page_number']) || $_GET['page_number'] - 1 <= 0 ? 'pointer-events: none; cursor: default; opacity: 0.3; ' : 'pointer-events: auto; cursor: pointer' ?>"><img src="views/media/images/left.png" alt="previous" loading="lazy" heigh= "50px" width= "50px"></a>
    <div style="height: inherit; width: auto; font-size: larger; font-family: 'Times New Roman', Times, serif;" >
        <div style="display: flex; flex-direction: row; justify-content: space-around; width: 100%;">
        <div style="width: fit-content;"><?php echo (isset($_GET['page_number'])? $_GET['page_number'] - 1 : 0) . " . . . " ; ?></div>
        <div style="color: blue; width: fit-content;"><?php echo "   " . isset($_GET['page_number'])? $_GET['page_number'] : 1 . "   "; ?></div>
        <div style="width: fit-content;"><?php echo " . . . " . (isset($_GET['page_number'])? $_GET['page_number'] + 1: 2 ); ?></div>
        </div>
    </div>
    <a href="/<?= $page?>?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] + 1 : 2 ?>"style="<?php echo $has_next ? 'pointer-events: none; cursor: default; opacity: 0.3;  ' : 'pointer-events: auto; cursor: pointer' ?>"><img src="views/media/images/next.png" alt="next" loading="lazy" heigh= "50px" width= "50px" ></a>
    </div>
</div>