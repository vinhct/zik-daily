<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html" style="color: #FFF;font-weight: 600;font-size: 20px">Đại lý <?php echo $namegame ?>Club</a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">

            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="btn-toggle-rightsidebar">
                        <span  class="user-image" style="margin-right: 10px;width: 75px;">VP :<?php echo number_format($vippoint)?></span>
                        <span id="vippointsave" class="user-image" style="width: 75px"></span>

                    </a>
                </li>
                <li>
                    <a href="#" class="btn-toggle-rightsidebar">
                        <img src="<?php echo public_url('admin/images/vin.png')?>" class="user-image"><span  class="user-image" style="margin-right: 100px;"><?php echo number_format($vin)?></span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><img src="<?php echo public_url('admin') ?>/assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $admin_info->nickname ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('user/logout')?>"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<input type="hidden" id="hndvippointsave" name="hndvippointsave" value="<?php echo $vippointsave ?>">
<script>
    $(document).ready(function(){
        $("#vippointsave").text(bacVippoint($("#hndvippointsave").val()));
    });
    function bacVippoint(strVip){
        var strresult;
        if(strVip>=0 && strVip <= 80){
            strresult = "Đá";
        }else if(strVip>80 && strVip <= 800){
            strresult = "Đồng";
        }else if(strVip>800 && strVip <= 5000){
            strresult = "Bạc";
        }else if(strVip>4500 && strVip <= 8600){
            strresult = "Vàng";
        }else if(strVip>8600 && strVip <= 12000){
            strresult = "Bạch Kim 1";
        }else if(strVip>12000 && strVip <= 50000){
            strresult = "Bạch Kim 2";
        }else if(strVip>50000 && strVip <= 100000){
            strresult = "Kim Cương 1";
        }else if(strVip>100000 && strVip <= 2000000){
            strresult = "Kim Cương 2";
        }
        else if(strVip>=200000){
            strresult = "Kim Cương 3";
        }
        return strresult;
    }
</script>
