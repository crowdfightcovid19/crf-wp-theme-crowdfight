<?php
/**
 * Defines the footer for the theme
 *
 * @since 0.0.1
 */

?>

        <div id="cfct-site-footer" class="container-fluid pt-4 pb-4" role="contentinfo">

            <div id="cfct-site-footer-container" class="row">

                <?php if(!is_front_page()): ?>

                    <div id="cfct-site-footer-text" class="col-12 col-md-6 text-left">
                        <span class="mt-auto mb-auto">Crowdfight &vert; <a href="/legal-notice">Legal notice</a> &vert; <a href="/privacy-policy">Privacy Policy</a></span>
                    </div>

                    <div id="cfct-site-footer-social" class="col-12 col-md-6 text-right">

                        <ul class="mt-auto mb-auto"> 
                            <li> 
                                <a href="https://twitter.com/CrowdfightTeam" target="_blank">
                                    <img alt="twitter" src="<?php echo get_template_directory_uri() . "/img/twitter.png" ?>">
                                </a> 
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCsUV4GunXz6pk5ao18gQQIA" target="_blank">
                                    <img alt="YouTube channel" src="<?php echo get_template_directory_uri() . "/img/youtube.svg" ?>">
                                </a>
                            </li>
                        </ul>

                    </div>

                <?php else: ?>

                      <div id="cfct-site-footer-text" class="col text-center">
                        <span class="mt-auto mb-auto">Crowdfight &vert; <a href="/legal-notice">Legal notice</a> &vert; <a href="/privacy-policy">Privacy Policy</a></span>
                    </div>

                <?php endif; ?>

            </div>

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
