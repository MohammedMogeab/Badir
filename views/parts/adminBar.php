<!-- قائمة المشرف للتحكم بي الموقع -->
<?php if ($_SESSION['user'] ?? false) : ?>
    <?php if ($_SESSION['user']['type'] == "admin" || $_SESSION['user']['type'] == "manager") : ?>
        <nav class="bar_admin">
            <ul>
                <div class="bar_divide">
                <li>
                    <form action="/islamic_endowments_manage" method="get"><input type="hidden" name="" value=""><button type="submit"  aria-label="الاوقاف">الاوقاف</button></form>
                </li>
                <li>
                    <form action="/charity_projects_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="المشاريع">المشاريع</button></form>
                </li></div>
                <div class="bar_divide">
                <li>
                    <form action="/charity_campaigns_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="حملات خيرية">حملات خيرية</button></form>
                </li>
                <!-- <li>
                </li> -->
                <li>
                    <form action="/executive_partners_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="الشركاء التنفيذيين">الشركاء التنفيذيين</button></form>
                </li></div>
                <div class="bar_divide">
                <li>
                    <form action="/islamic_payments_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="المصارف الاسلاميه"> المصارف الاسلاميه</button></form>
                </li>
                <li>
                    <form action="/users_manage" method="get"><input type="hidden" name="" value=""><button type="submit" aria-label="المصارف الاسلاميه"> المستخدمين </button></form>
                </li></div>

            </ul>
        </nav>
    <?php endif; ?>
<?php endif; ?>
