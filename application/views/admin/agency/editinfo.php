<!-- head -->

<h3 class="page-title">
    Cập nhật thông tin đại lý
</h3>


<div class="row">
<div class="col-md-12">
<div class="panel">
<div class="panel-heading">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <label for="exampleInputEmail1" id="errorstatus" style="color: red"></label>
            </div>
        </div>
    </div>
</div>
<div class="panel-body">
<form id="form" class="form" enctype="multipart/form-data" method="post" action="">
<fieldset>
<div class="form-group ">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12">
            <label for="inputEmail3" class="control-label">Nick name:</label>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <input type="text" readonly class="form-control" name="nicknamedl" readonly
                   value="<?php echo $info->nickname ?>">
        </div>
    </div>
</div>

<?php if ($admin_info->status == "A"): ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label">Tên đại lý:</label>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="nameagentdl"
                       value="<?php echo $info->nameagent ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label">Địa chỉ:</label>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="addressdl"
                       value="<?php echo $info->address ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label">Điện thoại:</label>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="phonedl"
                       value="<?php echo $info->phone ?>">
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label">Tên đại lý:</label>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="nameagentdl" readonly
                       value="<?php echo $info->nameagent ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label">Địa chỉ:</label>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="addressdl" readonly
                       value="<?php echo $info->address ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label">Điện thoại:</label>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="phonedl" readonly
                       value="<?php echo $info->phone ?>">
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="form-group">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12">
            <label for="inputEmail3" class="control-label">Tên ngân hàng:</label>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <select class="form-control" name="namebank">
                <option value="">Chọn</option>
                <option value="BIDV" <?php if ($info->namebank == "BIDV") {
                    echo "selected";
                } ?>>BIDV
                </option>
                <option value="VietinBank" <?php if ($info->namebank == "VietinBank") {
                    echo "selected";
                } ?>>VietinBank
                </option>
                <option value="VietcomBank" <?php if ($info->namebank == "VietcomBank") {
                    echo "selected";
                } ?>>VietcomBank
                </option>
                <option value="MSB" <?php if ($info->namebank == "MSB") {
                    echo "selected";
                } ?>>MaritimeBank
                </option>
            </select>

        </div>

    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-12">
            <label for="inputEmail3" class="control-label">Tên tài khoản ngân
                hàng:</label>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <input type="text" class="form-control" name="usernamebank"
                   value="<?php echo $info->nameaccount ?>">

        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <label for="inputEmail3" class="col-sm-2 control-label">Số tài khoản ngân
            hàng:</label>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <input type="text" class="form-control" name="numberbank"
                   value="<?php echo $info->numberaccount ?>">

        </div>
        <label for="inputEmail3" class="col-sm-2 control-label"></label>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">Facebook:</label>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <input type="text" class="form-control" name="facebookdl"
                   value="<?php echo $info->facebook ?>">
        </div>
        <div class="col-sm-4"><label class="control-label" for="inputError"
                                     style="color: #ff0000"><?php echo form_error('phone') ?></label>
        </div>
    </div>
</div>

<?php if ($admin_info->status == "A"): ?>
    <div class="form-group">
        <div class="row">
            <label for="inputEmail3" class="col-sm-2 control-label">Thứ tự trong
                game:</label>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input class="form-control" for="inputError"
                       name="ordername"
                       value="<?php echo $info->order ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label for="inputEmail3" class="col-sm-2 control-label">Hiển thị trong
                game:</label>

            <div class="col-sm-2">
                <input type="checkbox" id="isshow" name="chk"
                       value="<?php echo $info->show ?>" <?php if ($info->show == 1) {
                    echo "checked";
                } ?>>

            </div>
            <input type="hidden" name="displayname" id="displayname" value="">
        </div>
    </div>
<?php endif; ?>
<div class="form-group">
    <div class="row">
        <label class="col-sm-2 control-label">Phí dịch vụ:</label>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <label class="control-label">1000<?php echo $namegame ?>/1 tin nhắn</label>
        </div>
    </div>
</div>
<fieldset>
    <legend>Đại lý cấp 1</legend>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Nhận tin nhắn SMS:</label>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="checkbox" id="isSMS" name="chkSMS"
                       value="<?php echo $info->sms ?>" <?php if ($info->sms != -1) {
                    echo "checked";
                } ?> >
            </div>
        </div>
    </div>
    <div class="form-group" id="money">

        <div class="row">
            <label class="col-sm-2 control-label">Giá trị giao dịch tối thiểu nhận
                SMS:</label>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" id="txtmoney" name="txtmoney" class="form-control"
                       value="<?php echo $info->sms ?>" size="20">

            </div>
        </div>
</fieldset>
<fieldset>
    <legend>Đại lý cấp 2</legend>
    <table id="tbllv2" class="table table-bordered table-hover">
        <tr>
            <th>NickName</th>
            <th>Nhận SMS</th>
            <th>Giá trị giao dịch tối thiểu nhận SMS
            </th>
        </tr>
        <?php $j = 0; ?>
        <?php foreach ($infolv2 as $row) { ?>
            <tr>
                <td><?php echo $row->nickname ?></td>
                <td><input type='checkbox' id='isSMS_<?php echo $j ?>' name='chkSMS_<?php echo $j ?>'></td>
                <td><input type='text' id='lvlmoney_<?php echo $j ?>' name='lvlmoney_<?php echo $j ?>'
                           value="<?php echo $row->sms ?>">

                </td>

            </tr>
            <?php $j++;
        } ?>
    </table>
</fieldset>

<div class="form-group">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <input type="submit" value="Cập nhật" name="submit"
                   class="btn btn-primary pull-left">
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
</fieldset>
</form>
</div>


</div>
</div>

</div>


<script>
    $(document).ready(function () {
        $("#displayname").val($('#isshow').val());
        if ($("#isSMS").is(':checked')) {
            $("#money").show();
        }
        else {
            $("#money").hide();
        }// unchecked*!/*/
    });
    $('#isshow').on('change', function () {
        this.value = this.checked ? 1 : 0;
        $("#displayname").val(this.value);
    }).change();
    $('#isSMS').click(function () {
        if ($(this).prop("checked") == true) {
            $("#money").show();
            $("#txtmoney").val("0");
        }
        else if ($(this).prop("checked") == false) {
            $("#money").hide();
            $("#txtmoney").val("-1");

        }
    });
    $("#tbllv2 tr td").each(function (i, tr) {
        $("#isSMS_" + i).click(function () {
            if ($(this).prop("checked") == true) {
                $("#lvlmoney_" + i).show();
                $("#lvlmoney_" + i).val("0");
            }
            else if ($(this).prop("checked") == false) {
                $("#lvlmoney_" + i).hide();
                $("#lvlmoney_" + i).val("-1");
            }
        });
        if ($("#lvlmoney_" + i).val() != -1) {

            $("#isSMS_" + i).attr("checked", "checked");
            $("#lvlmoney_" + i).show();


        }
        else {
            $("#isSMS_" + i).attr("unchecked", "unchecked");
            $("#lvlmoney_" + i).hide();
        }
    });
</script>