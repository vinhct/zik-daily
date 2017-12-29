<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đại lý <?php echo $namegame ?>Club| Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo public_url('admin')?>/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/assets/css/demo.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/dist/css/AdminLTE.min.css">
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.md5.js"></script>
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.validate.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/dist/js/validate_login.js"></script>
     <script src="<?php echo public_url('admin') ?>/dist/js/base64.js"></script>
<!--    <link rel="icon" type="image/png" sizes="96x96" href="--><?php //echo public_url('admin') ?><!--/assets/img/favicon.ico">-->
</head>
<body>
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <input type="hidden" id="nickname">
                <input type="hidden" id="vintotal">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="<?php echo public_url("admin") ?>/assets/img/unnamed1.png" width="60" height="60">
                            </div>
                            <h3 style="color:blue">Đại lý <?php echo $namegame ?>Club</h3>
                            <h5 style="color: red" id="validate-text"></h5>

                        </div>
                        <form class="form-auth-small" action="index.php">
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input type="text" class="form-control" id="param_username" name="username"
                                       placeholder="Tên đăng nhập">
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" class="form-control" id="param_password" name="password"
                                      placeholder="Mật khẩu">
                            </div>
                            <div class="form-group clearfix">


                            </div>
                            <input type="button" value="Đăng nhập" id="login" class="btn btn-success btn-lg btn-block">
                            <div id="flag" style="display: none"><?php echo $flag ?></div>
                            <div class="bottom">

                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                            <input type="hidden" id="hdnusername" name="hdnusername" value="">
                            <input type="hidden" id="hndvin" name="hndvin" value="">
                            <input type="hidden" id="hndvippoint" name="hndvippoint" value="">
                            <input type="hidden" id="hndvippointsave" name="hndvippointsave" value="">
                            <input type="hidden" id="hdnaccesstoken" name="hdnaccesstoken" value="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="mySmallModalLabel">Nhập odp</h4>

                                <div id="error" style="color: #ff0000"></div>
                            </div>
                            <div class="modal-body" style="height: 100px">

                                <input class="form-control" type="text" id="odplogin" name="odplogin"
                                       placeholder="Nhập ODP" maxlength="5">
                                <input type="button" class="btn btn-success pull-right" style="margin-top: 10px"
                                       value="Đăng nhập" id="loginodp">
                            </div>


                            <div class="modal-footer">
                                <input type="hidden" id="hdnusername" name="hdnusername" value="<?php echo $nickname ?>">
                                <input type="button" class="btn btn-success pull-left" value="Lấy ODP" id="getodp">
                                <input type="button" class="btn btn-success pull-right" value="Lấy lại ODP" id="getreodp">
                            </div>

                        </div>
                    </div>
                </div>
                <div id="spinner" class="spinner" style="display:none;">
                    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<style>.spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */

    }

    .tranfer-error {
        color: #FF0000; /* red */
        font-weight: normal;
    }

</style>




<script>
    $(document).ready(function () {
        if ($("#flag").text() == 1) {

            $("#bsModal3").modal('show');
            return false;
        }
    });
    $("#login").click(function(){
        if($("#param_username").val()=="")
        {
            $("#validate-text").html("Username không được để trống");
            $("#param_username").focus();
            return false;
        }
        else if($("#param_password").val()=="")
        {
            $("#validate-text").html("Password không được để trống");
            $("#param_password").focus();
            return false;
        }
        else{
             $("#validate-text").html("");
             //call ajax
              $.getJSON({
                type: "post",
                url: "<?php echo base_url('login/acceptlogin')?>",
                data: {
                    username: $("#param_username").val(),
                    password: $("#param_password").val(),
                },
                dataType: 'json',
                success: function (data) {
                   
                    if(data.errorCode=="0")
                    {
                        var sess=data.sessionKey;
                        var info =$.parseJSON(Base64.decode(sess));
                        $("#hdnusername").val(info.nickname);
                        $("#hndvin").val(info.vinTotal);
                        $("#hndvippoint").val(info.vippoint);
                        $("#hndvippointsave").val(info.vippointSave);
                        $("#hdnaccesstoken").val(data.accessToken);
                        $("#bsModal3").modal('show');
                    }
                   else if (data.errorCode == "1001") {
                    $("#validate-text").html('Bạn không có quyền truy cập');
                    } else if (data.errorCode == "1005") {
                        $("#validate-text").html( 'Tên đăng nhập không tồn tại');
                    } else if (data.errorCode == "1007") {
                         $("#validate-text").html( 'Mật khẩu không chính xác');
                    } else if (data.errorCode == "1009") {
                         $("#validate-text").html('Tài khoản bị khóa');
                    }
                }
                ,error: function(){
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
                
            });
        }



    });
    $("#getodp").click(function(){
        $.getJSON({
                type: "post",
                url: "<?php echo base_url('login/getODP')?>",
                dataType: 'json',
                 data: {
                    hdnusername: $("#hdnusername").val()
                },
                success: function (data) {
                  if(data=="0")
                  {
                    $("#error").html("Bạn lấy mã odp thành công");
                  }
                 else if(data=="1")
                  {
                    $("#error").html("Hệ thống bị gián đoạn");
                  }
                 else if(data=="2")
                  {
                    $("#error").html("Nickname không tồn tại");
                  }
                 else if(data=="4")
                  {
                    $("#error").html("Bạn chưa đăng ký bảo mật trên trang <?php echo $namegame ?>.club");
                  }
                 else if(data=="5")
                  {
                    $("#error").html("Bạn đã lấy odp rồi, gửi tin nhắn để lấy lại");
                  }
                }
                ,error: function(){
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
                
            });
    });
    $("#getreodp").click(function () {
        $("#error").html("Mời bạn soạn tin nhắn <?php echo $namegame ?> ODP gửi 8079 để lấy lại ODP");
    });
    $("#loginodp").click(function () {
        if ($("#odplogin").val() == "") {
            $("#error").html("Mã otp không được để trống ");
        }
        else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('login/loginODP')?>",
                data: {
                    hdnusername: $("#hdnusername").val(),
                    odplogin: $("#odplogin").val(),
                    hndvin: $("#hndvin").val()
                },
                dataType: 'json',
                success: function (result) {
                    if (result == 0) {

                       //lưu vào session
                       $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('login/saveUserLogin')?>",
                        data: {
                            hdnusername: $("#hdnusername").val(),
                            hndvin: $("#hndvin").val(),
                            hndvippoint: $("#hndvippoint").val(),
                            hndvippointsave: $("#hndvippointsave").val(),
							hdnaccesstoken:$("#hdnaccesstoken").val()
                        },
                        dataType: 'json',
                        success: function (res) {
                         if(res==0)
                         {
                            window.location.href = "<?php  echo base_url()?>";
                         }
                        }
                    });
                   }
                    else if (result == 1) {
                        $("#error").html("Hệ thống bị gián đoạn");

                    } else if (result == 2) {
                        $("#error").html("Nickname không tồn tại");

                    } else if (result == 4) {
                        $("#error").html("chưa đăng ký bảo mật trên trang <?php echo $namegame ?>.club");

                    } else if (result == 5) {
                        $("#error").html("odp sai");

                    }
                    else if (result == 6) {
                        $("#error").html("odp hết hạn");

                    }

                }
				,error: function(){
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
				
            });
        }
    });
</script>
</body>
</html>

