<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="<?php echo base_url() ?>"><i class="lnr lnr-home"></i>
                        <span>Trang chủ</span></a></li>
                <?php if ($admin_info->status == "A"): ?>
                    <li>
                        <a href="<?php echo base_url('agency/listnoactive') ?>">
                            <i class="lnr lnr-dice"></i><span>Đại lý ngừng hoạt động</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo base_url('agency/add') ?>">
                        <i class="lnr lnr-dice"></i><span>Thêm mới đại lý</span>
                    </a>
                </li>
                <?php if ($admin_info->status == "D"): ?>
                    <li>
                        <a href="<?php echo base_url('agency/listnoactive') ?>">
                            <i class="lnr lnr-dice"></i><span>Đại lý ngừng hoạt động</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('agency/editinfo') ?>">
                            <i class="lnr lnr-dice"></i> <span>Cập nhật thông tin</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('agency/tranfermoney') ?>">
                            <i class="lnr lnr-dice"></i> <span>Chuyển <?php echo $namegame ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo base_url('agency/doanhso') ?>">
                        <i class="lnr lnr-dice"></i> <span>Doanh số</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('agency/topdoanhso') ?>">
                        <i class="lnr lnr-dice"></i> <span>Top doanh số liên minh</span>
                    </a>
                </li>
                <!--<li>
                <a href="<?php echo base_url('agency/topdscap2') ?>">
                    <i class="fa fa-dashboard"></i> <span>Top doanh số cấp 2</span>
                </a>
            </li>
           <li>
                <a href="<?php echo base_url('agency/topdoanhsocap2') ?>">
                    <i class="fa fa-dashboard"></i> <span>Top doanh số cấp 2 trực thuộc</span>
                </a>
            </li>-->
                <li>
                    <a href="<?php echo base_url('agency/listtranfer') ?>">
                        <i class="lnr lnr-dice"></i><span>Mua <?php echo $namegame ?> đại lý</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('agency/listtranfersellvin') ?>">
                        <i class="lnr lnr-dice"></i><span>Bán <?php echo $namegame ?> đại lý</span>
                    </a>
                </li>
                <!--<li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Doanh số</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url("agency/doanhso") ?>"><i class="fa fa-circle-o"></i> Top doanh số cấp 1</a></li>
                    <li><a href="<?php echo base_url("agency/topdscap2") ?>"><i class="fa fa-circle-o"></i> Top tổng doanh số cấp 2</a></li>

                </ul>
            </li>-->
                <li>
                    <a href="<?php echo base_url('freeze') ?>">
                        <i class="lnr lnr-dice"></i><span>Đóng băng</span>
                    </a>
                </li>
                <?php if($admin_info->status == "A"):?>
                    <li>
                        <a href="<?php echo base_url('user/transaction') ?>">
                            <i class="lnr lnr-dice"></i><span>Lịch sủ giao dịch trong game</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($admin_info->status == "D"): ?>

                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Giftcode</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="<?php echo base_url("agency/addgiftcode") ?>"><i class="fa fa-circle-o"></i> Xuất giftcode</a></li>
                                <li><a href="<?php echo base_url("agency/giftcode") ?>"><i class="fa fa-circle-o"></i> Danh sách giftcode</a></li>
                                <li><a href="<?php echo base_url("agency/giftcodeuse") ?>"><i class="fa fa-circle-o"></i> Thông kê giftcode trong kho</a></li>
                                <li><a href="<?php echo base_url("agency/usergiftcode") ?>"><i class="fa fa-circle-o"></i> Tài khoản sử dụng giftcode</a></li>
                                <li><a href="<?php echo base_url("agency/nicknameusegiftcode") ?>"><i class="fa fa-circle-o"></i> Thống kê giftcode đã dùng</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- <li class="treeview">
                   <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Lịch sử giao dịch trong game </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                   <ul class="treeview-menu">
                       <li><a href="<?php echo base_url("user/transactionagent") ?>"><i class="fa fa-circle-o"></i> Đại lý</a></li>
                       <li><a href="<?php echo base_url("user/transaction") ?>"><i class="fa fa-circle-o"></i> Tài khoản</a></li>
					   </ul>
               </li> -->
                <?php endif; ?>
                <?php if ($admin_info->nickname == "tongdaily") : ?>
                    <li>
                        <a href="<?php echo base_url('user/transactiontongdaily') ?>">
                            <i class="fa fa-dashboard"></i><span>Lịch sủ giao dịch tổng đại lý</span>
                        </a>
                    </li>
                <?php endif; ?>

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