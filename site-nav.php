<div id="navbarWrapper" class="navbar-wrapper fixed-top nav-translucent">
    <div id="navbarCollapse">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand rfs-disable" href="/">R<span class="bar">|</span>D<span class="bar">|</span>M<span class="sr-only"> </span><span class="sub-brand rfs-disable">Trial Counsel</span></a>
                <div class="ml-auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse" aria-controls="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
                            'container'       => 'div',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id'    => 'navbarPrimary',
                            'menu_class'      => 'navbar-nav',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                        ) );
                    ?>
                </div>
            </div>
        </nav>

        <!--<nav class="navbar navbar-expand-md">
            <div class="container">
                <?php
                    wp_nav_menu( array(
                        'theme_location'  => 'locations',
                        'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
                        'container'       => 'div',
                        'container_class' => 'collapse navbar-collapse d-flex justify-content-center',
                        'container_id'    => 'navbarLocations',
                        'menu_class'      => 'navbar-nav',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
            </div>
        </nav>-->
    </div>
</div>