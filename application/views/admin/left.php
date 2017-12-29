<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="<?php echo base_url() ?>"><i class="lnr lnr-home"></i>
                        <span>Trang chủ</span></a></li>
                <?php if ($admin_info->status == "A"): ?>
                    <li>
                        <a href="<?php echo base_url('agency/listnoactive') ?>" >
                            <i class="lnr lnr-dice"></i><span>Đại lý ngừng hoạt động</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo base_url('agency/add') ?>">
                        <i class="lnr lnr-dice"></i><span>Thêm mới đại lý</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</div>
<script>
    jQuery(function ($) {
        $("ul a").click(function (e) {
            var link = $(this);
            var item = link.parent("li");
            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }
            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                console.log(href);
                link.attr("href", "#");
                setTimeout(function () {
                    link.attr("href", href);
                }, 3000);
                e.preventDefault();
            }
        })
            .each(function () {
                var link = $(this);
                if (link.get(0).href === location.href) {
                    link.addClass("active").parents("li").addClass("active ");
                    return false;
                }
            });
    });

</script>