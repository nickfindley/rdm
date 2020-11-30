        <footer class="site-footer">
            <div class="container">
            <?php
            if ( function_exists( 'yoast_breadcrumb' ) ) :
                if (
                    // is_archive() OR
                    // is_author() OR
                    // is_page() OR
                    // is_post_type_archive( 'practice_areas' ) OR
                    // is_single()
                    ! is_front_page()
                ) :
            ?>
                <div class="footer-breadcrumbs">
                    <div class="footer-breadcrumbs-wrapper">
                        <?php yoast_breadcrumb( '<p class="breadcrumbs">','</p>' ); ?>
                    </div>
                </div>
            <?php
                endif;
            endif;
            ?>
                <div class="row">
                    <div class="footer-section">
                    <?php
                        if ( is_active_sidebar( 'footer-1' ) ) :
                            dynamic_sidebar( 'footer-1');
                        endif;
                    ?>
                    </div>

                    <div class="footer-section">
                    <?php
                        if ( is_active_sidebar( 'footer-2' ) ) :
                            dynamic_sidebar( 'footer-2');
                        endif;
                    ?>
                    </div>

                    <div class="footer-section">
                    <?php
                        if ( is_active_sidebar( 'footer-3' ) ) :
                            dynamic_sidebar( 'footer-3');
                        endif;
                    ?>
                    </div>
                </div>
            </div>
        </footer> 
    </div>
    <?php require_once 'nav-modals.php'; ?>
    <?php wp_footer(); ?>
    <script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function($) {
        $('a').each(function() {
            var a = new RegExp('/' + window.location.host + '/');
            if(!a.test(this.href)) {
                $(this).click(function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    window.open(this.href, '_blank');
                });
            }
        });
    });
    //]]>
    </script>
</body>
</html>