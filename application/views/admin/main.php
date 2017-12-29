<html>
<head>
    <?php $this->load->view('admin/head') ?>
</head>

<body>
<div id="wrapper">
    <?php $this->load->view('admin/header') ?>
    <?php $this->load->view('admin/left') ?>

    <!-- Content -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <?php $this->load->view($temp, $this->data); ?>
            </div>
        </div>
    </div>
    <!-- End content -->

    <?php $this->load->view('admin/footer') ?>
</div>

</body>
</html>