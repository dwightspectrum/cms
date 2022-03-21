
    	    <footer class="footer text-center"> 2022 &copy; Hotwork International Inc. </footer>
    	</div>
    </div>
    <script src="<?=base_url()?>asset/components/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?=base_url()?>asset/components/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>asset/components/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?=base_url()?>asset/components/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?=base_url()?>asset/components/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="<?=base_url()?>asset/components/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="<?=base_url()?>asset/components/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--Style Switcher -->
    <script src="<?=base_url()?>asset/components/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?=base_url()?>asset/components/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?=base_url()?>asset/components/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>\
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>asset/components/js/custom.min.js"></script>
    <script src="<?=base_url()?>asset/components/js/dashboard1.js"></script>
    <script src="<?=base_url()?>asset/components/js/jasny-bootstrap.js"></script>
    <script src="<?=base_url()?>asset/components/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="<?=base_url()?>asset/components/js/jquery.loadTemplate.min.js"></script>
    <script src="<?=base_url()?>asset/components/alertify/alertify.js"></script>
    <script src="<?=base_url()?>asset/components/js/moment.js"></script>
    <script src="<?=base_url()?>asset/components/js/moment-timezone.js"></script>

</body>

<script>
    $('#mark_all_btn').on('click', function() {
        $.ajax({
          type: 'POST',
          url: CONFIG.BASE_URL + 'freelancer/mark_all_as_read',
          dataType: 'json',
          success: function(result){
            alertify.logPosition("bottom right");

            if(result.success){
                alertify.success("Successfully marked!");
                $('#nofication-data').html('');
                displayNotifications();
            }else{
                alertify.error("Error occured!");
            }
          }
        });
    });
</script>

</html>
