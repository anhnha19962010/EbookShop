<script type="text/javascript">
    var BASE_URL = '<?php echo base_url(); ?>'
</script>
<script
              src="https://code.jquery.com/jquery-2.2.4.min.js"
              integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
              crossorigin="anonymous"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('public/assets/bootstrap/js/bootstrap.min.js') ?>" crossorigin="anonymous"></script>
<script src="<?php echo site_url('public/assets/js') ?>/jquery.jqChart.min.js" type="text/javascript"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Select2 -->
<script src="<?php echo site_url('public/assets/js') ?>/plugins/select2/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo site_url('public/assets/js') ?>/plugins/iCheck/icheck.min.js"></script>
<!-- Confirmation -->
<script src="<?php echo site_url('public/assets') ?>/bootstrap/js/bootstrap-confirmation.js"></script>
<script src="<?php echo site_url('public/assets') ?>/js/jquery.blockUI.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo site_url('public/assets/fancybox') ?>/jquery.fancybox.js?v=2.1.5"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('public/assets/adminlte') ?>/dist/js/app.min.js"></script>
<script src="<?php echo site_url('public/assets/js') ?>/custom.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        $('input[type="checkbox"].normal, input[type="radio"].normal').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                    // ,increaseArea: '20%' // optional
                });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        $(document).on('ifChecked', '.checkth, .checkft', function (event) {
            $('.checkth, .checkft').iCheck('check');
            $('.checkitem').each(function () {
                $(this).iCheck('check');
            });
        });
        $(document).on('ifUnchecked', '.checkth, .checkft', function (event) {
            $('.checkth, .checkft').iCheck('uncheck');
            $('.checkitem').each(function () {
                $(this).iCheck('uncheck');
            });
        });
        $(document).on('ifUnchecked', '.checkitem', function (event) {
            $('.checkth, .checkft').attr('checked', false);
            $('.checkth, .checkft').iCheck('update');
        });
    });
</script>
<script charset="UTF-8" src="<?php echo site_url()?>/public/assets/bxslider/jquery.bxslider.min.js" type="text/javascript"></script>

<?php
//display js
if (isset($ckeditor)) {?>

 <script src="<?php echo $ckeditor; ?>"></script>
<?php }?>
<?php if (isset($ckeditorloader)) {?>

 <script src="<?php echo $ckeditorloader; ?>"></script>
<?php }?>

<script src="<?php echo site_url('public/assets/js') ?>/script.js"></script>
<script src="<?php echo site_url('public/assets/js') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo site_url('public/assets/js') ?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo site_url('public/assets/js') ?>/flot.js"></script>

</body>
</html>