<!DOCTYPE html>
<!-- <?= tim ?> -->
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="s-code Kabupaten Kediri">
    <title><?php echo $_title; ?> | s-code</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i|Dosis:300,500" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/css/core.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Alert -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-msg/bootstrap-msg.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap-msg/bootstrap-msg.min.js"></script>

    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/logo.png">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo.png">

    <!-- Highchart -->
    <script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
</head>

<?php
if ($this->uri->segment(2) == 'login') {
    echo $_login;
}
?>

<?php if ($this->uri->segment(2) != 'login') : ?>

    <body class="pace-done">

        <!-- Preloader -->
        <div class="preloader">
            <div class="spinner-dots">
                <span class="dot1"></span>
                <span class="dot2"></span>
                <span class="dot3"></span>
            </div>
        </div>

        <!-- Sidebar -->
        <?php echo $_sidebar; ?>
        <!-- END Sidebar -->

        <!-- Topbar -->
        <?php echo $_topbar; ?>
        <!-- END Topbar -->

        <!-- Main container -->
        <main class="main-container">
            <!-- Main Content -->
            <div class="main-content">
                <?php echo $_body; ?>
            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php echo $_footer; ?>
            <!-- END Footer -->

        </main>
        <!-- END Main container -->

        <!-- Global quickview -->
        <div id="qv-global" class="quickview" data-url="<?= base_url() ?>assets/data/quickview-global-for-index.html">
            <div class="spinner-linear">
                <div class="line"></div>
            </div>
        </div>
        <!-- END Global quickview -->

    </body>
<?php endif; ?>

<!-- Scripts -->
<script src="<?php echo base_url(); ?>assets/js/core.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>

<script>
    $(document).ready(function() {
        //disallow enter form
        $('form').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

    });

    <?php if ($this->session->flashdata('alert')) {
        $dataalert = explode("|", $this->session->flashdata('alert'));
        $status = $dataalert[0];
        $message = $dataalert[1];
    ?>
        window.onload = function() {
            Msg.icon = {
                info: 'icon fa fa-bath',
                success: 'icon fa fa-anchor',
                error: 'icon fa fa-close',
                warning: 'icon fa fa-bell-o',
                danger: 'icon fa fa-bolt'
            };
            Msg.<?= $status ?>('<?= $message ?>', 4000);
        }
    <?php }; ?>
</script>

</html>