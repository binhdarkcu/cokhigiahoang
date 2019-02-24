<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/mllc-view.js?ver=1540196819'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/ownScript.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider-min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider.start.main.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider-min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider.start.carousel.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.isotope.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.isotope.folio.start.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.validate.min.js?ver=4.9.8'></script>
<?php  global $post;$post_slug=$post->post_name;?>
<?php if($post_slug == 'bao-gia'):?>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/form-wizard/jquery.steps.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/form-wizard/base64.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/form-wizard/main.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/libs/chosen_v1.8.7/chosen.jquery.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo plugins_url(); ?>/baogia/libs/jqueryToast/jquery.toast.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo plugins_url(); ?>/baogia/libs/iziModal/iziModal.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/libs/jquery-ui-1.12.1.custom/jquery-ui.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/libs/jquery-ui-1.12.1.custom/datepicker-vi.js?ver=4.9.8'></script>
<?php endif;?>

<?php if($post_slug == 'gui-bao-gia'):?>
<script type='text/javascript' src='<?php echo plugins_url(); ?>/baogia/libs/jqueryToast/jquery.toast.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/simple.money.format.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/form-wizard/base64.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/form-wizard/gui-bao-gia.js?ver=4.9.8'></script>
<?php endif;?>

<?php wp_footer(); ?>
