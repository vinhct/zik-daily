<h3 class="page-title">
    Lịch sử giao dịch trong game
</h3>
<div class="row">
<div class="col-md-12">
<div class="panel">
<div class="panel-heading">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <label for="exampleInputEmail1" id="resultsearch" style="color: red"></label>
            </div>
        </div>
    </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nickname :</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="filter_iname" value="<?php echo $this->input->get('name') ?>" name="name" class="form-control">
                </div>
                <input type="hidden" id="hdnnickname" class="form-control"
                       value="<?php echo $nickname ?>">

                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tiền :</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="money_type" name="money" class="form-control">
                        <option value="vin"><?php echo $namegame ?></option>
                        <option value="xu">Xu</option>
                    </select>
                </div>


            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Từ ngày :</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control"
                               id="fromDate" name="fromDate"
                               value="<?php echo $start_time ?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Đến ngày :</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control"
                               id="toDate" name="toDate"
                               value="<?php echo $end_time ?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="submit" value="Tìm kiếm" name="submit"
                           class="btn btn-success" id="search_tran">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" value="Xuất Exel" name="submit"
                           class="btn btn-success" id="exportexel">
                </div>
            </div>
        </div>



</div>
<div class="panel-body">


    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>Nickname</th>
            <th>Số dư</th>
            <th>Tiền thay đổi</th>
            <th>Hành động</th>
            <th>Ngày tạo</th>
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
        <ul id="pagination-demosearch" class="pagination-sm"></ul>
    </div>

</div>
</div>
</div>
</div>




<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });
    $("#search_tran").click(function () {
        var fromDatetime = $("#fromDate").val();
        var toDatetime = $("#toDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
        if($("#filter_iname").val() == ""){
            alert('Bạn phải nhập nick name');
            return false;

        }else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/checkNickName') ?>",
                // url: "http://192.168.0.251:8082/api_backend",
                data: {
                    nickname: $("#filter_iname").val()
                },
                dataType: 'json',
                success: function (res) {

                        if(res == 1){
                            $("#resultsearch").html("Không tìm thấy kết quả");
                        }else{
                            $('#pagination-demosearch').css("display", "block");
                            $("#spinner").show();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('TranferAjax/getTransactionHistory') ?>",
                                data: {
                                    nickname: $("#filter_iname").val(),
                                    timestart: $("#fromDate").val(),
                                    timeend: $("#toDate").val(),
                                    moneytype: $("#money_type").val(),
                                    actiongame: "",
                                    servicename: "",
                                    page: 1,
                                    like: 1,
									record:50
                                },
                                dataType: 'json',
                                success: function (result) {
                                    $("#spinner").hide();

                                    var totalPage = result.totalPages;
                                    console.log(totalPage);
                                    if (result.transactions == "") {
                                        $('#pagination-demosearch').css("display", "none");
                                        $("#resultsearch").html("Không tìm thấy kết quả");
                                    } else {
                                        $("#resultsearch").html("");
                                        $('#pagination-demo').css("display", "none");
                                        $('#pagination-demosearch').twbsPagination({
                                            totalPages: totalPage,
                                            visiblePages: 5,
                                            onPageClick: function (event, page) {
                                                $("#spinner").show();
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo base_url('TranferAjax/getTransactionHistory') ?>",
                                                    data: {
                                                        nickname: $("#filter_iname").val(),
                                                        timestart: $("#fromDate").val(),
                                                        timeend: $("#toDate").val(),
                                                        moneytype: $("#money_type").val(),
                                                        actiongame: "",
                                                        servicename: "",
                                                        page: page,
                                                        like: 1,
														record:50
                                                    },
                                                    dataType: 'json',
                                                    success: function (result) {
                                                        $("#spinner").hide();

                                                        stt = 1
                                                        $.each(result.transactions, function (index, value) {
                                                            result += resultSearchTransction(stt, value.nickName, commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName,value.transactionTime);
                                                            stt++;
                                                        });
                                                        $('#logaction').html(result);
                                                    }
													,error: function(){
														$("#spinner").hide();
														$("#resultsearch").html("Kết nối không ổn định.Vui lòng thử lại sau");
													},
													timeout:30000
                                                });
                                            }
                                        });
                                    }
                                    stt = 1
                                    $.each(result.transactions, function (index, value) {
                                        result += resultSearchTransction(stt, value.nickName, commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName,value.transactionTime);
                                        stt++;
                                    });
                                    $('#logaction').html(result);
                                }
								,error: function(){
										$("#spinner").hide();
										$("#resultsearch").html("Kết nối không ổn định.Vui lòng thử lại sau");
									},
									timeout:30000
                            })
                        }
                },error: function(){
										$("#spinner").hide();
										$("#resultsearch").html("Kết nối không ổn định.Vui lòng thử lại sau");
									},
									timeout:30000
            });
        }

    });
    function resultSearchTransction(stt, nickName,  currentMoney, moneyExchange, serviceName,transactionTime) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + currentMoney + "</td>";
        rs += "<td>" + moneyExchange + "</td>";
        rs += "<td>" + serviceName + "</td>";
        rs += "<td>" + transactionTime + "</td>";
        rs += "</tr>";
        return rs;
    }

</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>