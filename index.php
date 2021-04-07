<?php
/**
 * The main template file
 *
 * @since 0.0.1
 */

get_header();
?>

    <div id="cfct-content-wrapper" class="container xxxx" role="banner">

        <?php if (have_posts()): ?>

            <?php the_post(); ?>

            <?php // TITLE ?>
            <div class="container-fluid">
                <div id="cfct-content-title" class="row justify-content-center">
                    <div class="col">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <?php // CONTENT ?>
            <div class="container-fluid">
                <div id="cfct-content" class="row justify-content-center pt-5 pb-5">
                    <div class="col">

                        <?php                         
                            the_content();
                        ?>

                    </div>
                </div>
            </div>
        
        <?php endif ?>

    </div>

<?php
get_footer();
