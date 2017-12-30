<h3 class="page-title">

<?php if ($status == "D") : ?>
    Danh sách đại lý cấp 2 trực thuộc
<?php else: ?>
    Danh sách đại lý cấp 1
<?php endif; ?>
<?php if (isset($nickname) && $nickname): ?>
    <input type="hidden" id="nickname" value="<?php echo $nickname ?>">
<?php endif; ?>
</h3>



<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <?php $this->load->view('admin/message', $this->data); ?>
            </div>
            <div class="panel-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <?php if ($admin_info->nickname == "tongdaily") : ?>
                            <th>STT</th>
                            <th>Tên đại lý</th>
                            <th>Nick name</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Số dư <?php echo $namegame ?></th>
                            <th>Két sắt</th>
                            <th>Vippoint</th>
                            <th>Vippoint tích lũy</th>
                        <?php else:?>
                            <th>STT</th>
                            <th>Tên đại lý</th>
                            <th>Nick name</th>
                            <th style="display:none">Email</th>
                            <th>Điện thoại</th>
                            <th>Địa chỉ</th>
                            <?php if ($status == "A") : ?>
                                <th>Trạng thái</th>
                                <th>Số dư <?php echo $namegame ?></th>
                                <th>Két sắt</th>
                                <th>Vippoint</th>
                                <th>Vippoint tích lũy</th>
                                <th>Tổng <?php echo $namegame ?></th>
                            <?php endif; ?>
                            <th>Doanh số</th>
                            <th>Hành động</th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($admin_info->nickname == "tongdaily") : ?>
                        <?php echo $list3; ?>
                    <?php else: ?>
                        <?php if ($status == "D") : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($list2 as $row): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->nameagent ?></td>
                                    <td>
                                        <a href="<?php echo base_url('agency/listtranfer/' . $row->nickname) ?>"
                                           style="color: #37ca1e"><?php echo $row->nickname ?></a></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->phone ?></td>
                                    <td><?php echo $row->address ?></td>
                                    <td><a href="<?php echo base_url('agency/doanhso') ?>">Chi
                                            tiết</a></td>
                                    <td>
                                        <a class="verify_action" href="<?php echo base_url('agency/delete/' . $row->id) ?>">
                                            <img src="<?php echo public_url('admin') ?>/images/delete.png"/>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php echo $list1; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>


<script>
    $(".successful").click(function () {
        $(".successful").hide();
    });
    $("a.verify_action").click(function(event){
        if(!confirm('Bạn chắc chắn muốn hủy chức năng đại lý ?'))
        {
            return false;
        }
        var href = $(this).attr("href")
        var btn = this;
        $.ajax({
            type: "GET",
            url: href,
            success: function(response) {
                if (response == "Success")
                {
                    $(btn).closest('tr').fadeOut("slow");
                    window.location.href = "<?php echo base_url('') ?>"
                }
                else
                {
                    alert("Error");
                }
            }
        });
        event.preventDefault();
    });
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/listAgent') ?>",
            dataType: 'json',
            data: {
                nickname: $("#nickname").val(),
                status: 0
            },
            success: function (res) {
            }
        });
		 $('tr').each(function () {
         var sum = 0;
	     $(this).find('.combat').each(function () {
	         var combat = $(this).text();
	         if (!isNaN(combat) && combat.length !== 0) {
	             sum += parseFloat(combat);
	         }
	     });
	     $(this).find('.total-combat').html(commaSeparateNumber(sum));
     });
    });
function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>