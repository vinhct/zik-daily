<h3 class="page-title">
    Danh sách đại lý ngừng hoạt động
    <?php if (isset($nickname) && $nickname): ?>
        <input type="hidden" id="nickname" value="<?php echo $nickname ?>">
    <?php endif; ?>
    <input type="hidden" id="statusdl" value="<?php echo $admin_info->status ?>">
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
                        <th>STT</th>
                        <th>Nick name</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($status == "D") : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($list1 as $row): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <a style="color: #37ca1e"><?php echo $row->nickname ?></a></td>
                                <td class="option">
                                    <a  class="verify_action" href="<?php echo base_url('agency/update/' . $row->id) ?>">
                                        <img src="<?php echo public_url('admin') ?>/images/edit.png"/>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php $i = 1; ?>
                        <?php foreach ($list1 as $row): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <a style="color: #37ca1e"><?php echo $row->nickname ?></a></td>
                                <td class="option">
                                    <a  class="verify_action" href="<?php echo base_url('agency/update/' . $row->id) ?>">
                                        <img src="<?php echo public_url('admin') ?>/images/edit.png"/>
                                    </a>
                                    <a  class="verify_delete" href="<?php echo base_url('agency/deleteagent/' . $row->id) ?>">
                                        <img src="<?php echo public_url('admin') ?>/images/delete.png"/>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
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
        if(!confirm('Bạn chắc chắn muốn update ?'))
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
                    window.location.href = "<?php echo base_url('agency/listnoactive') ?>"
                }
                else
                {
                    alert("Error");
                }
            }
        });
        event.preventDefault();
    });
	 $("a.verify_delete").click(function(event){
        if(!confirm('Bạn chắc chắn muốn xóa đại lý này không ?'))
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
                    window.location.href = "<?php echo base_url('agency/listnoactive') ?>"
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
        if($("#statusdl").val() == "A") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/stopAgent') ?>",
                dataType: 'json',
                data: {

                    nickname: $("#nickname").val(),
                    status: 1
                },
                success: function (res) {
                }
            });
        }else if($("#statusdl").val() == "D"){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/stopAgent') ?>",
                dataType: 'json',
                data: {
                    nickname: $("#nickname").val(),
                    status: 2
                },
                success: function (res) {
                }
            });
        }
    });
</script>