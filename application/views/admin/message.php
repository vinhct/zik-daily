<?php if(isset($message) && $message):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i> Thông báo: <?php echo $message?>
    </div>
<?php endif;?>



