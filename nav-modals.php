<div class="modal nav-modal fade" id="navPracticeAreas" data-keyboard="false" tabindex="-1" aria-labelledby="practiceAreasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="practiceAreasModalLabel">Practice Areas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                <?php
                    $args = array(
                        'post_type' => 'practice_areas',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC'
                    );
                    $services_query = new WP_Query( $args );
                    if ( $services_query->have_posts() ) :
                        while ( $services_query->have_posts() ) :
                            $services_query->the_post();
                            ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></l1>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/practice-areas/" role="button" class="btn btn-primary">See All Practice Areas</a>
            </div>
        </div>
    </div>
</div>

<div class="modal nav-modal fade" id="navAttorneys" data-keyboard="false" tabindex="-1" aria-labelledby="attorneysModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attorneysModalLabel">
                    Attorneys
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                <?php
                    $args = array(
                        'number' => -1,
                        'meta_key' => 'start_date',
                        'orderby' => 'start_date',
                        'order' => 'ASC',
                        'role' => 'contributor',
                        'fields' => 'all'
                    );
                    $attorneys_query = new WP_User_Query( $args );
                    $attorneys = $attorneys_query->get_results();
                    if ( ! empty ( $attorneys ) ) :
                        foreach ( $attorneys as $attorney ) :
                            $info = get_userdata( $attorney->ID );
                            $user_id = 'user_' . $attorney->ID;
                            ?>
                    <li>
                        <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><span class="attorney-name"><?php echo $info->first_name . ' ' . $info->last_name; ?> </span>
                        <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span></a>
                    </li>
                            <?php
                        endforeach;
                    endif;
                ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/attorneys/" role="button" class="btn btn-primary">See All Attorneys</a>
            </div>
        </div>
    </div>
</div>

<div class="modal nav-modal fade" id="navContact" data-keyboard="false" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">
                    Contact RDM
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Send us a message using the form below. You can also call our Kansas City Headquarters at <a href="tel:8169601611">816-960-1611</a></p>
                <?php echo do_shortcode( '[forminator_form id="823"]' ); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/contact/" role="button" class="btn btn-primary">More Contacts</a>
            </div>
        </div>
    </div>
</div>

<div class="modal nav-modal fade" id="navOffices" data-keyboard="false" tabindex="-1" aria-labelledby="officesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="officesModalLabel">
                    RDM's Locations
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="modal-body">
                    <div class="row">
                    <?php
                        $args = array(
                            'post_type' => 'offices',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        );
                        $offices_query = new WP_Query( $args );
                        if ( $offices_query->have_posts() ) :
                            while ( $offices_query->have_posts() ) :
                                $offices_query->the_post();
                                ?>
                                <div class="office col-sm-4">
                                    <?php the_post_thumbnail(); ?>
                                    <h6><a class="stretched-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                    <ul>
                                        <li><?php echo phone_format( get_field( 'main_phone' ) ); ?></li>
                                        <li><?php the_field( 'address' ); ?><br><?php the_field( 'address_2' ); ?><br><?php the_field( 'city' ); ?>, <?php the_field( 'state' ); ?> <?php the_field( 'zip' ); ?></li>
                                    </ul>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/offices/" role="button" class="btn btn-primary">More About Our Offices</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="searchModal" data-keyboard="false" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="searchform" role="search" action="<?php echo esc_url( site_url() ); ?>" method="get">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel" aria-label="s">Search RDM.law</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'rdm' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" aria-labelled-by="searchModalLabel">
                    <!-- <button id="searchsubmit" type="submit" name="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>