<?php get_header(); ?>
<?php
$ajax_nonce = wp_create_nonce('H4GpryAtCnbwJVTdNMMf');
?>
<?php if($_GET['token']):?>
<script>var token = "<?php echo $_GET['token'];?>", homeUrl = "<?php echo get_site_url();?>";</script>
<?php endif;?>
<body class="home page-template page-template-homepage page-template-homepage-php page page-id-596 woocommerce-no-js">

    <div class="wrapper upper modern-header">

        <?php get_template_part("template-parts/header") ?>
        <div class="page-header p-border">
            <div class="titlewrap container">

                <h1 class="entry-title dekoline"><?php the_title(); ?></h1>

                <div class="page-crumbs">
                    <a href="<?php echo HOME_URL; ?>"><i class="fa fa-home"></i>  <i class='fa fa-angle-right'></i>
                        Trang chủ</a> <i class='fa fa-angle-right'></i> <a href="<?php echo HOME_URL ?>/bao-gia">Gửi báo giá</a>
                </div>

            </div>

        </div>

        <div class="container container_alt">

            <div id="core">
                <div id="form-wrapper"></div>

                <div id="button-controls" class="actions">
                    <ul class="action-list">
                        <li>
                            <a href="#finish" id="gui-bao-gia">Lưu báo giá</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /.container -->
    </div>
    <input id="ajax_nonce" type="hidden" value="<?php echo $ajax_nonce; ?>"/>
</body>

<?php get_template_part("template-parts/footer"); ?>
<?php get_footer(); ?>

<script id="template-1" type="text/template">
<?php get_template_part("template-parts/emailing/template1"); ?>
</script>

<script id="template-2" type="text/template">
<?php get_template_part("template-parts/emailing/template2"); ?>
</script>

<script id="template-3" type="text/template">
    <?php get_template_part("template-parts/emailing/template-gian-giao"); ?>
</script>
