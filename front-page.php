<?php
/**
 * The main template file
 *
 * @since 0.0.1
 */

get_header();
?>

    <div id="cfct-content-wrapper" class="container-fluid" role="banner">

        <?php if (have_posts()): ?>

            <?php the_post(); ?>

            <?php // CONTENT ?>
            <div id="cfct-content" class="row justify-content-center pt-5 pb-5">
                <div class="col">

                    <?php                         
                        the_content();
                    ?>

                </div>
            </div>
        
        <?php endif ?>

    </div>

<?php
get_footer();