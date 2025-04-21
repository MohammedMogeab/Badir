<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

try {
    $categories = $db->query("SELECT * from categories")->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /");
    exit();
}

?>

<!-- (مقدمة الصفحه)بداية الصفحه  -->
<header class="bg-white_shadow">
    <!-- <?= $heading ?> -->
    <?php if ($page ?? false): ?>
        <section class="bar-search">
            <div class="search-container">
                <form class="form-search" method="Get" action="/<?= $page ?>">
                    <input type="text"
                        name="search"
                        class="search-input"
                        placeholder="ابحث هنا "
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

                    <button type="submit" name="submit" value="search" class="my-items-btn" aria-label="بحث">بحث</button>

                    <select name="filter" class="filter-select">
                        <option value="all" <?= ($_GET['filter'] ?? 'all') === 'all' ? 'selected' : '' ?>>الجميع</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= htmlspecialchars($category['category_id']) ?>"
                                <?= ($_GET['filter'] ?? '') == $category['category_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ( false) : ?>
                        <button type="submit" name="submit" value="foryou" aria-label="خاصة بك">خاصه بك</button>
                    <?php endif; ?>
                </form>


            </div>
        </section>
    <?php endif; ?>
</header>