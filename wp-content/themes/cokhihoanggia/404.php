<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<script>var is404 = true;</script>

<body class="home page-template page-template-homepage page-template-homepage-php page page-id-596 woocommerce-no-js">

    <div class="wrapper upper modern-header">

        <?php get_template_part("template-parts/header") ?>
        <div class="page-header p-border">
            <div class="titlewrap container">

                <h1 class="entry-title dekoline"><?php the_title(); ?></h1>

                <div class="page-crumbs">
                    <a href="<?php echo HOME_URL; ?>"><i class="fa fa-home"></i>  <i class='fa fa-angle-right'></i>
                        Trang chủ</a>
                </div>

            </div>

        </div>

        <div class="container container_alt">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header>
					<h1 class="page-title">Oops! Không tìm thấy trang này.</h1>
				</header><!-- .page-header -->

				<div class="page-content">
                                    <p>Không tìm thấy dữ liệu nào tại đây. <a href="<?php echo get_site_url();?>"><strong>Click vào đây</strong></a> để quay về trang chủ.</p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->
            
        </div><!-- /.container -->
    </div>
</body>
<?php get_footer(); ?>
