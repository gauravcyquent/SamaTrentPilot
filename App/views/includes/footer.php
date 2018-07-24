</div>
</div>
<!-- Mainly scripts -->
<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<?php /*<script src="<?php echo base_url(); ?>assets/js/plugins/chartJs/Chart.min.js"></script>*/ ?>

<!-- PAGE LEVEL FOOTER SCRIPTS -->
<?php if (isset($includes_for_layout_js['js']) AND count($includes_for_layout_js['js']) > 0): ?>
    <?php foreach ($includes_for_layout_js['js'] as $js): ?>
        <?php if ($js['options'] === NULL OR $js['options'] == 'footer'): ?>
            <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
        <?php endif; ?>	
    <?php endforeach; ?>
<?php endif; ?>

<!-- END PAGE LEVEL  FOOTER SCRIPTS -->

<!-- select-js -->
<script src="<?php echo base_url(); ?>assets/js/custom-select/js/bootstrap-select.js"></script>
<!-- select-js -->
<!-- scroll-bar-js -->
<script src="<?php echo base_url(); ?>assets/js/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- scroll-bar-js -->
<script>
$('#slimtest1').slimScroll({
    height: '270px'
});
</script>
<script>
		(function($){
			$(window).load(function(){
			$.mCustomScrollbar.defaults.theme="minimal-dark"; //set "light-2" as the default theme
			$(".demo-yx").mCustomScrollbar({
					axis:"yx"
				});
				
			
				
			});
		})(jQuery);			
</script>
<script>
    (function ($) {
        $(window).load(function () {
            $("#content-md").mCustomScrollbar({
                /*setHeight:170,*/
                theme: "minimal-dark"
            });
            $("#content-md9").mCustomScrollbar({
                /*setHeight:170,*/
                theme: "minimal-dark"
            });
            $("#content-md1").mCustomScrollbar({
                /*setHeight:170,*/
                theme: "minimal-dark"
            });

        });
    })(jQuery);
</script>
</body>
</html>