<h3 class="page-title">
   Top doanh số
</h3>
<input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer">
<input type="hidden" value="<?php echo $admin_info->nickname ?>" id="nickname">
<input type="hidden" value="<?php echo $admin_info->nickname ?>" id="hdnnickname">
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <?php $this->load->view('admin/message', $this->data); ?>
                <input type="hidden" id="startDate">
                <input type="hidden" id="endDate">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="exampleInputEmail1" id="error" style="color: red"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-1 col-sm-2 col-xs-12">
                            <label for="exampleInputEmail1">Tháng :</label>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control"
                                       id="fromDate" name="fromDate" value="<?php echo $this->input->post("fromDate") ?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <input type="submit" value="Tìm kiếm" name="submit"
                                   class="btn btn-success" id="search_tran">
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-body" id="table1">


                <div id="spinner" class="spinner" style="display:none;">
                    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                         alt="Loading"/>
                </div>
                <div class="text-center pull-right">
                    <ul id="pagination-demo" class="pagination-lg"></ul>
                    <ul id="pagination-demosearch" class="pagination-lg"></ul>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    $(function () {
         $('#datetimepicker1').datetimepicker({
            format: 'MM/YYYY',

        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
    $(document).ready(function () {
       
        $("#spinner").show();
		$("#fromDate").val(getFirtDayOfMonth());
        var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));
        if ($("#statususer").val() == "A") {
            topDoanhSoAdmin();
        } else if ($("#statususer").val() == "D") {
            topDoanhSoAgent();
        }
    });
    $("#search_tran").click(function () {
        $("#spinner").show();
		 var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));
        if ($("#statususer").val() == "A") {
            topDoanhSoAdmin();
        } else if ($("#statususer").val() == "D") {
            topDoanhSoAgent();
        }
    });
     function listtopdoanhso(stt, agentName, nickName, total,bonusFix,bonusMore,bonusTotal,bonusByVinCash,bonusByVinplayCard,percent) {
        var html = "";
        html += "<tr>";
        html += "<td style='text-align: center'>" + (stt +1) + "</td>";
        html += "<td>" + agentName + "</td>";
        html += "<td>" + nickName + "</td>";
        html += "<td>" + commaSeparateNumber(total) + "</td>";
        html += "<td style='display:none>" + commaSeparateNumber(bonusFix) + "</td>";
        html += "<td >" + commaSeparateNumber(bonusMore) + "</td>";
        html += "<td style='display:none>" + commaSeparateNumber(bonusTotal) + "</td>";
        html += "<td style='display:none'>" + commaSeparateNumber(bonusByVinCash) + "</td>";
            html += "<td style='display:none'>" + commaSeparateNumber(bonusByVinplayCard) + "</td>";
            html += "<td style='display:none'>" + percent +' %' + "</td>";
        html += "</tr>";
        return html;
    }
    function listtopdoanhsoAgent(index, agentName, nickName, total,bonusFix,bonusMore,bonusTotal,bonusByVinCash,bonusByVinplayCard,percent) {
        var html = "";
        html += "<tr>";
        html += "<td style='text-align: center'>" + (index +1) + "</td>";
        html += "<td>" + agentName + "</td>";
        html += "<td>" + nickName + "</td>";
        html += "<td style='display: none'>" + commaSeparateNumber(total) + "</td>";
     
        if($("#hdnnickname").val()==nickName){
		    html += "<td style='display:none>" + commaSeparateNumber(bonusFix) + "</td>";
			html += "<td >" + commaSeparateNumber(bonusMore) + "</td>";
			html += "<td style='display:none>" + commaSeparateNumber(bonusTotal) + "</td>";
            html += "<td style='display:none'>" + commaSeparateNumber(bonusByVinCash) + "</td>";
            html += "<td style='display:none'>" + commaSeparateNumber(bonusByVinplayCard) + "</td>";
            html += "<td style='display:none'>" + percent +' %' + "</td>";
        }
        else{
			html += "<td style='display:none></td>";
			html += "<td ></td>";
			html += "<td style='display:none></td>";
            html += "<td style='display:none'></td>";
            html += "<td style='display:none'></td>";
            html += "<td style='display:none'></td>";
        }

        html += "</tr>";
        return html;
    }
    function topDoanhSoAdmin() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/topDoanhSo') ?>",
            data: {
                nickName: "",
                timestart: $("#startDate").val(),
                timeend: $("#endDate").val(),
                month: $("#fromDate").val()
            },
			cache: true,
            dataType: 'json',
            success: function (data) {
                $("#spinner").hide();
				 $("#error").html("");
                var result = "";
                if (data.transactions == "") {
					$('#table1').html("");
                } else {
					 var result = "";
                    var i = 1;
                    result += '<table id="myTable" class="tablesorter table table-bordered table-hover">';
                    result += ' <thead>';
                    result += ' <tr>';
                    result += ' <th style="text-align: center">TOP</th>';
                    result += ' <th>Tên đại lý</th>';
                    result += ' <th>Nickname</th>';
                    result += ' <th>Doanh số</th>';
                    result += ' <th style="display:none">Thưởng cố định(<?php echo $namegame ?>)</th>';
                    result += ' <th>Thưởng doanh số(<?php echo $namegame ?>)</th>';
                    result += ' <th style="display:none">Tổng thưởng(<?php echo $namegame ?>)</th>';
                     result += ' <th style="display:none">Thưởng <?php echo $namegame ?></th>';
                    result += ' <th style="display:none">Thưởng <?php echo $namegame ?>Card</th>';
                    result += ' <th style="display:none">% Chuyển đổi</th>';
                    result += ' </tr>';
                    result += ' </thead>';
                    result += '<tbody>';
                    $.each(data.transactions, function (index, value) {
                        result += listtopdoanhso(index, value.agentName, value.nickName, value.total,value.bonusFix,value.bonusMore,value.bonusTotal,value.bonusByVinCash,value.bonusByVinplayCard,value.percent);
                        i++;
                    });
                    result += '</tbody>';
                    result += '</table>';
                    $('#table1').html(result);

                }
            }
			,error: function(){
				$("#spinner").hide();
                 $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                },
			timeout:30000
        });
    }
    function topDoanhSoAgent() {
		
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/topDoanhSoAdmin') ?>",
            data: {
                 nickName: "",
                timestart: $("#startDate").val(),
                timeend: $("#endDate").val(),
                month: $("#fromDate").val()
            },
			cache: true,
            dataType: 'json',
            success: function (data) {
                $("#spinner").hide();
				$("#error").html("");
                if (data.transactions == "") {
				$('#table1').html("");
                } else {
                    var i = 1;
                    var result = "";
                    result += '<table id="TblAgent" class="tablesorter table table-bordered table-hover">';
                    result += ' <thead>';
                    result += ' <tr>';
                    result += ' <th style="text-align: center">TOP</th>';
                    result += ' <th>Tên đại lý</th>';
                    result += ' <th>Nickname</th>';
                    result += ' <th style="display: none">Doanh số</th>';
                    result += ' <th style="display:none">Thưởng cố định(<?php echo $namegame ?>)</th>';
                    result += ' <th>Thưởng doanh số(<?php echo $namegame ?>)</th>';
                    result += ' <th style="display:none">Tổng thưởng(<?php echo $namegame ?>)</th>';
                    result += ' <th style="display:none">Thưởng <?php echo $namegame ?></th>';
                    result += ' <th style="display:none">Thưởng <?php echo $namegame ?>Card</th>';
                    result += ' <th style="display:none">% Chuyển đổi</th>';
                    result += ' </tr>';
                    result += ' </thead>';
                    result += '<tbody>';
                    $.each(data.transactions, function (index, value) {
                        result += listtopdoanhsoAgent(index, value.agentName, value.nickName, value.total,value.bonusFix,value.bonusMore,value.bonusTotal,value.bonusByVinCash,value.bonusByVinplayCard,value.percent);
                    });

                    result += '</tbody>';
                    result += '</table>';
                    $('#table1').html(result);


                }
            },error: function(){
				$("#spinner").hide();
                 $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                },
			timeout:30000
        });
    }
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function getFirtDayOfMonth() {
        var date = new Date();
        var thangtruoc = '';
        var ngaytruoc = '';
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        if (firstDay.getMonth() < 10) {
            thangtruoc = "0" + (firstDay.getMonth() + 1);
        }
        else {
            thangtruoc = firstDay.getMonth() + 1;
        }
        if (firstDay.getDate() < 10) {
            ngaytruoc = "0" + firstDay.getDate();
        }
        else {
            ngaytruoc = firstDay.getDate();
        }
        $("#startDate").val( firstDay.getFullYear() + '-' + (thangtruoc) + '-' + (ngaytruoc) + " " + "00:00:00")
        return thangtruoc +'/'+firstDay.getFullYear();
    }

    function getLastDayOfMonth() {
        var date = new Date();
        var thangsau = '';
        var ngaysau = '';
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        if (lastDay.getMonth() < 10) {
            thangsau = "0" + (lastDay.getMonth() + 1);
        }
        else {
            thangsau = lastDay.getMonth() + 1;
        }
        if (lastDay.getDate() < 10) {
            ngaysau = "0" + lastDay.getDate();
        }
        else {
            ngaysau = lastDay.getDate();
        }
         $("#endDate").val(lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59")
        return lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59";
    }
    function LastDayOfMonth(Year, Month) {
        var nowDate=new Date((new Date(Year, Month,1))-1 );
        return formatLastDate(nowDate);
    }
     function formatLastDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate() +" 23:59:59",
                year = d.getFullYear() ;
 
            if (month.length < 2) month = '0' + month;
            if (day.length < 11) day = '0' + day;
			
            return [year, month, day].join('-');
    }
    function FirstDayOfMonth(Year, Month) {
        var nowDate=new Date(Year, Month-1, 1);
        return formatFirstDate(nowDate);
    }
     function formatFirstDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate() +" 00:00:00",
                year = d.getFullYear() ;
 
            if (month.length < 2) month = '0' + month;
            if (day.length < 11) day = '0' + day;
			;
            return [year, month, day].join('-');
        }
</script>
