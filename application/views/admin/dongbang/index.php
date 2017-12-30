<h3 class="page-title">
    Danh sách giao dịch trong 24h
</h3>

<div class="row">
<div class="col-md-12">
<div class="panel">
<div class="panel-heading">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <label for="exampleInputEmail1" id="error" style="color: red"></label>
            </div>
        </div>
        <input type="hidden" value="<?php echo $admin_info->nickname ?>" id="nickname" name="nickname">
        <input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer"
               name="statususer">
    </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Hành động :</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="action" class="form-control">
                        <option value="" <?php if ($this->input->post("action") == "") {echo "selected";} ?>>Chọn hành động</option>
                        <option value="1"<?php if ($this->input->post("action") == "1") {echo "selected";} ?>>Đóng băng</option>
                        <option value="2" <?php if ($this->input->post("action") == "2") {echo "selected";} ?>>Đã mở</option>
                        <option value="0" <?php if ($this->input->post("action") == "0") {echo "selected";} ?>>Đã đóng băng</option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="submit" value="Tìm kiếm" name="submit"
                           class="btn btn-success" id="search_tran">
                </div>



            </div>
        </div>

</div>
<div class="panel-body">
    <table id="example2" class="table table-bordered table-hover" style="table-layout: fixed;word-wrap: break-word;">
        <thead>
        <tr>
            <th >STT</th>
            <th >TK chuyển</th>
            <th >TK nhận</th>
            <th >Số <?php echo $namegame ?> gửi</th>
            <th >Số <?php echo $namegame ?> nhận</th>
            <th >Phí</th>
            <th >Mô tả</th>
            <th >Trạng thái</th>
            <th >Thời gian</th>
            <th >Hành động</th>
        </tr>
        </thead>
        <tbody id="logaction">
        </tbody>
    </table>
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
             alt="Loading"/>
    </div>
    <div class="text-center pull-right">
        <ul id="pagination-demo" class="pagination-lg"></ul>
    </div>

</div>
</div>
</div>
</div>
<script>
    $(document).ready(function () {
        $("#spinner").show();
        if ($("#statususer").val() == "D") {
            listAgent($("#action").val());
        } else {
            listAdmin($("#action").val())

        }
    });
    $("#search_tran").click(function () {
        $("#spinner").show();
        if ($("#statususer").val() == "D") {
            listAgent($("#action").val());
        } else {
            listAdmin($("#action").val())

        }
    });
    //danh sach giao dich dong bang cua dai ly
    function resulttranferlist(stt, namesend, namerecive, moneysend, moneyrecive, fee, mota, status, date, process, transctionNo) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td class ='idnamesend'>" + namesend + "</td>";
        rs += "<td class = 'idnamerecive'>" + namerecive + "</td>";
        rs += "<td class='mns'>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td class='mnr'>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td class='f'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + mota + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        rs += "<td class='time'>" + date + "</td>";
        rs += "<td>";

        if (process == 1) {
            rs += "<input type='button' value='Đóng băng''  class='btn btn-primary' onclick=\"TransactionAccess('" + transctionNo + "')\"> ";
        }
        if (process == 2) {
            rs += "<input type='button' value='Đã mở'  value='Đã Đóng Băng' class='btn btn-primary' disabled=disabled> ";
        }
        if (process == 0) {
            rs += "<input type='button' value='Đã Đóng Băng' class='btn btn-primary' disabled=disabled >";
        }

        rs += "</td>";
        rs += "</tr>";
        return rs;
    }
    //danh sach giao dich dong bang cua admin
    function resulttranferlistAdmin(stt, namesend, namerecive, moneysend, moneyrecive, fee, mota, status, date,process) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td class ='idnamesend'>" + namesend + "</td>";
        rs += "<td class = 'idnamerecive'>" + namerecive + "</td>";
        rs += "<td class='mns'>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td class='mnr'>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td class='f'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + mota + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "<td>";
        if (process == 1) {
            rs += "<span>Chưa đóng băng</span>";
        }
        if (process == 2) {
            rs += "Đã mở";
        }
        if (process == 0) {
            rs += "<span>Đã đóng băng</span>";
        }
        rs += "</td>";
        rs += "</tr>";
        return rs;
    }
    function statustranfer(feetran) {
        var strresult;
        switch (feetran) {
            case 1:
                strresult = "TK thường chuyển DL cấp 1";
                break;
            case 2:
                strresult = "TK thường  chuyển DL cấp 2";
                break;
            case 3:
                strresult = "DL cấp 1 chuyển TK thường";
                break;
            case 4:
                strresult = "DL cấp 1 chuyển DL cấp 1";
                break;
            case 5:
                strresult = "DL cấp 1 chuyển DL cấp 2";
                break;
            case 6:
                strresult = "DL cấp 2 chuyển TK thường";
                break;
            case 7:
                strresult = "DL cấp 2 chuyển DL cấp 1";
                break;
            case 8:
                strresult = "DL cấp 2 chuyển DL cấp 2";
                break;
        }
        return strresult;
    }
    function TransactionAccess(transactionNo) {
        var box = confirm("Bạn có chắc chắn muốn đóng băng giao dịch này? Giao dịch này sẽ không được tính doanh số sau khi đóng băng");
        if (box == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/closeFreeze')?>",
                data: {
                    transactionNo: transactionNo,
                },
                dataType: 'json',
                success: function (result) {

                    if (result.errorCode == "0") {
                        $(".error").html("Đóng băng thành công");
                        window.location.href="freeze";
                    }
                    else if (result.errorCode == "1001") {
                        $(".error").html("User chưa login");
                    }
                    else if (result.errorCode == "1043") {
                        $(".error").html("Không tìm thấy giao dịch chuyển tiền");
                    }
                    else if (result.errorCode == "1042") {
                        $(".error").html("Không đủ tiền dể đóng băng");
                    }
                    else if (result.errorCode == "1017") {
                        $(".error").html("Số tiền đóng băng bằng 0");
                    }
                    else if (result.errorCode == "1030") {
                        $(".error").html("Lỗi hệ thống");
                    }
                    else if (result.errorCode == "1034") {
                        $(".error").html("Lỗi hệ thống");
                    }
                    else if (result.errorCode == "1031") {
                        $(".error").html("Lỗi hệ thống");
                    }
                }
				,error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
            });

        }

    }
    //list agent
    function listAgent($freeze) {
    var oldpage=1;
	 var result = "";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/freezeAgent') ?>",
            data: {
                nickname: $("#nickname").val(),
                page: 1,
                freeze: $freeze
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                var result = "";
                $("#spinner").hide();
                if (data.listTranfer == "") {
                    $("#logaction").html("");
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
					if(oldpage==1){
						 stt = 1;
							$.each(data.listTranfer, function (index, value) {
								result += resulttranferlist(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money, value.transaction_no);
								stt++
							});
							$('#logaction').html(result);
					}
                    $('#pagination-demo').twbsPagination({
                        totalPages: 1000,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                           oldpage=page;
							if(oldpage>1){
								result = "";
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('TranferAjax/freezeAgent') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        page: page,
                                        freeze: $freeze
                                    },
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(data.listTranfer, function (index, value) {
                                            result += resulttranferlist(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money, value.transaction_no);
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                    }
                                });
                            }
                        }
                    });
                   
                }
            }
			,error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
        });
    }
    //list admin
    function listAdmin($freeze) {
       var oldpage=1;
	    var result = "";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/freezeAdmin') ?>",
            data: {
                page: 1,
                freeze: $freeze
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
               
                $("#spinner").hide();
                if (data.listTranfer == "") {
                    $("#logaction").html("");
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
					if(oldpage==1){
						 stt = 1;
							$.each(data.listTranfer, function (index, value) {
								result += resulttranferlistAdmin(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money);
								stt++
							});
							$('#logaction').html(result);
					}
                    $('#pagination-demo').twbsPagination({
                        totalPages: 1000,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
							oldpage=page;
							if(oldpage>1){
								result = "";
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('TranferAjax/freezeAdmin') ?>",
                                    data: {
                                        page: page,
                                        freeze: $freeze
                                    },
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(data.listTranfer, function (index, value) {
                                            result += resulttranferlistAdmin(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money);
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                    }
                                });
								}
								
                            
                        }
                    });
                   
                }
            }
			,error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
        });
    }
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>