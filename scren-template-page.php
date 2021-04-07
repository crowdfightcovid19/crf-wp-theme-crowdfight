<?php 
    /** 
     *  Template Name: SCReN Page Template 
     */ 
?>

<?php
    add_filter('the_content', 'wpautop');
?>

<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

        <?php // Bootstrap 4 CSS from CDN ?>
        <link   rel="stylesheet" 
                href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                crossorigin="anonymous">

		<?php // jQuery NOT SLIM (we need AJAX) ?>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
				integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
				crossorigin="anonymous">
		</script>

		<?php wp_head(); ?>	

	</head>

	<body <?php body_class(); ?>>


        <div id="scren-header-container" class="container-fluid">
            <div class="row justify-content-center pt-5">
                <div class="col-12 col-md-8 col-lg-6">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/logos_scren.png" alt="SCReN Logos">
                </div>
            </div>
        </div>


        <div id="cfct-content-wrapper" class="container-fluid scren-content-wrapper" role="banner">

            <?php if (have_posts()): ?>

                <?php the_post(); ?>

                <div class="container">
                    <div id="cfct-content-title" class="row justify-content-center pt-5">
                        <div class="col">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>

                <?php // CONTENT ?>
                <div id="cfct-content" class="row justify-content-center pt-5 pb-5">
                    <div class="col-12 col-md-8">

                        <?php                         
                            the_content();
                        ?>

                    </div>
                </div>

            <?php endif ?>

        </div>

		<?php wp_footer(); ?>

        <?php
            // Bootstrap 4 Javascript libraries from CDN
            // jQuery included on the header so it can be used throughout the document
        ?>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
                crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
                crossorigin="anonymous">
        </script>

	</body>
</html>