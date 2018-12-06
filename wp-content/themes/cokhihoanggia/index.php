<?php
get_header();
?>
<body class="home page-template page-template-homepage page-template-homepage-php page page-id-596 woocommerce-no-js">

    <div class="wrapper upper modern-header">

        <?php get_template_part("template-parts/header") ?>

        <div class="builder container_alt container_pad">


            <div id="ml-template-wrapper-824" class="ml-template-wrapper ml_row"><div id="ml-block-824-1" class="ml-block ml-block-ml_flexslider_block ml_span12 ml-first clearfix">

                </div></div></div>
        <div class="clearfix"></div>

        <?php get_template_part("template-parts/slider"); ?>

        <div class="clearfix"></div>


        <div class="container_alt container_pad builder woocommerce"><div><div></div>

                <?php get_template_part("template-parts/what-we", "do"); ?>



                <div id="ml-block-824-4" class="ml-block ml-block-ml_clear_block ml_span12 ml-first clearfix">
                    <div class="aq-block-clear aq-block-hr-single" style="height:30px;"></div>
                </div>

                <div id="ml-block-824-9" class="ml-block ml-block-ml_clear_block ml_span12 ml-first clearfix">
                    <div class="aq-block-clear aq-block-hr-single" style="height:px;"></div>
                </div>


                <?php get_template_part("template-parts/lastest", "news"); ?>
                <?php get_template_part("template-parts/featured", "projects"); ?>
                <div id="ml-block-824-11" class="ml-block ml-block-ml_text_block_action ml_span12 ml-first clearfix">
                </div></div></div>





        <?php get_template_part("template-parts/footer"); ?>

    </div><!-- /.wrapper  -->

    <?php get_template_part("template-parts/search", "widget") ?>

    <?php get_template_part("template-parts/go", "top") ?>

    <?php get_footer(); ?>
</body>
</html>
