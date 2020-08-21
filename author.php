<?php get_header(); ?>

<?php
$attorney = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
$user_id = 'user_' . $attorney->ID;

$first_name = $attorney->first_name;
$last_name = $attorney->last_name;
$telephone = $attorney->telephone;
$email = $attorney->user_email;
$linkedin = $attorney->linkedin;

$title = get_field( 'title', $user_id );
$photo = get_field( 'photo', $user_id );

$practice = get_field( 'practice_areas', $user_id );
$admissions = get_field( 'admissions', $user_id );

$office = get_field( 'office', $user_id );
if ( $office ) :
    foreach ( $office as $post ) :
        $office_photo_id = get_post_thumbnail_id( $post->ID ); 
        $office_address = get_field( 'address', $post->ID );
        $office_address_2 = get_field( 'address_2', $post->ID );
        $office_city = get_field( 'city', $post->ID );
        $office_state = get_field( 'state', $post->ID );
        $office_zip = get_field( 'zip', $post->ID );
        $office_main_phone = get_field( 'main_phone', $post->ID );
        $office_link = get_the_permalink( $post->ID );
    endforeach;
wp_reset_postdata();
endif;
?>

<main id="content">
    <header class="author-header" id="pageHeader">
        <?php echo wp_get_attachment_image( $office_photo_id, 'full' ); ?>
        <div class="overlay">
            <h1>
                <?php echo $first_name . ' ' . $last_name; ?><br>
                <span class="subheading"><?php echo $title . ', Rasmussen Dickey Moore'; ?></span>
            </h1>
        </div>
    </header>

    <section class="author-profile">
        <div class="container">
            <div class="row author-intro">
                <?php
                    if ( $photo ) :
                        $has_photo = ' has-photo';
                    endif;
                ?>
                <div class="author-info<?php echo $has_photo; ?>">
                    <div class="author-photo">
                        <?php echo wp_get_attachment_image( $photo, 'full' ); ?>
                    </div>
                    <ul class="author-contact">
                        <li><a href="tel:<?php echo $telephone; ?>"><i class="fas fa-fw fa-phone"></i><?php echo phone_format( $telephone ); ?></a></li>
                        <li><a href="mailto:<?php echo $email; ?>"><i class="fas fa-fw fa-envelope"></i><?php echo $email; ?></a></li>
                        <?php if ( $linkedin ) : ?>
                        <li><a href="<?php echo $linkedin; ?>"><i class="fab fa-fw fa-linkedin"></i>LinkedIn</a></li>
                        <?php endif; ?>
                        <li><a href="#"><i class="fas fa-fw fa-address-card"></i>vCard</a></li>
                        <li>
                            <a href="<?php echo $office_link; ?>">
                            <i class="fas fa-fw fa-map-marker-alt"></i><address><span class="addr-1"><?php echo $office_address; ?></span>
                                <span class="addr-2"><?php echo $office_address_2; ?></span>
                                <span class="addr-csz"><?php echo $office_city; ?>, <?php echo $office_state; ?> <?php echo $office_zip; ?></span>
                            </address>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="author-bio">
                    <?php the_field( 'attorney_bio', $user_id ); ?>
                </div>
            </div>

            <?php
                if ( have_rows( 'civic_activities', $user_id ) AND ( have_rows( 'honors', $user_id ) ) || have_rows( 'memberships' , $user_id ) ) :
                    $class = ' honors-and-activities';
                elseif ( ( have_rows( 'honors', $user_id ) || have_rows( 'memberships' , $user_id ) ) OR have_rows( 'civic_activities', $user_id ) ) :
                    $class = ' honors-or-activities';
                endif;
            ?>
            <div class="row author-details<?php echo $class; ?>">
                <div class="author-education">
                    <div class="author-wrap">
                    <h3>Education</h3>
                    <ul>
                    <?php
                        $law_school = get_field( 'law_school', $user_id );
                        $grad_school = get_field( 'grad_school', $user_id );
                        $college = get_field( 'college', $user_id );

                        if ( ! empty ( $law_school['name'] ) ) :
                    ?>
                        <li>
                            <h4><?php echo $law_school['name']; ?> <span class="year"><?php echo $law_school['year']; ?></span></h4>
                            <p>
                            <?php
                                echo $law_school['degree'];
                                if ( $law_scool['honors'] ) : 
                                    echo '<br><span class="honors">';
                                    echo $law_school['honors'];
                                    echo '</span>';
                                endif;
                            ?>
                            </p>
                        </li>
                    <?php 
                        endif;
                        if ( ! empty ( $grad_school['name'] ) ) :
                    ?>
                        <li>
                            <h4><?php echo $grad_school['name']; ?> <span class="year"><?php echo $grad_school['year']; ?></span></h4>
                            <p>
                            <?php
                                echo $grad_school['degree'];
                                if ( $grad_scool['honors'] ) : 
                                    echo '<br><span class="honors">';
                                    echo $grad_school['honors'];
                                    echo '</span>';
                                endif;
                            ?>
                            </p>
                        </li>
                    <?php
                        endif;
                        if ( ! empty ( $college['name'] ) ) :
                    ?>
                        <li>
                            <h4><?php echo $college['name']; ?> <span class="year"><?php echo $college['year']; ?></span></h4>
                            <p>
                            <?php
                                echo $college['degree'];
                                if ( $college['honors'] ) : 
                                    echo '<br><span class="honors">';
                                    echo $college['honors'];
                                    echo '</span>';
                                endif;
                            ?>
                            </p>
                        </li>
                    <?php
                        endif;
                    ?>
                    </ul>
                    </div>
                </div>

                <div class="author-practice">
                    <div class="author-wrap">
                    <h3>Practice Areas</h3>
                    <ul>
                    <?php
                        foreach ( $practice as $post ) :
                            setup_postdata( $post->ID );
                    ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php
                            wp_reset_postdata();
                        endforeach;
                    ?>
                    </ul>
                    </div>
                </div>

                <div class="author-admissions">
                    <div class="author-wrap">
                    <h3>Admissions</h3>  
                    <ul>
                    <?php
                        foreach ( $admissions as $post ) :
                            // setup_postdata( $post->ID );
                            $parent = get_post_ancestors( $post->ID );
                            global $post;
                            $post->post_parent_title = get_the_title( $parent[0] );
                            $adm[] = $post;
                            wp_reset_postdata();
                        endforeach;

                        function arrSortObjsByKey($key, $order = 'DESC')
                        {
                            return function($a, $b) use ($key, $order)
                            {
                                // Swap order if necessary
                                if ($order == 'DESC') :
                                    list($a, $b) = array($b, $a);
                                endif;

                                // Check data type
                                if ( is_numeric ( $a->$key ) ) :
                                    return $a->$key - $b->$key; // compare numeric
                                else :
                                    return strnatcasecmp( $a->$key, $b->$key ); // compare string
                                endif;
                            };
                        }

                        usort( $adm, arrSortObjsByKey( 'post_parent_title', 'ASC' ));

                        foreach ( $adm as $post ) :
                            if ( $post->post_parent_title == 'State Courts' ) :
                                $parent_title = '';
                            else : 
                                $parent_title = $post->post_parent_title . ', ';
                            endif;
                            echo '<li>' . $parent_title . $post->post_title . '</li>';
                        endforeach;
                    ?>
                    </ul>
                    </div>
                </div>

                <?php if ( have_rows( 'honors', $user_id ) || have_rows( 'memberships' , $user_id ) ) : ?>
                <div class="author-honors">
                    <div class="author-wrap">
                    <?php if ( have_rows( 'honors', $user_id ) ) : ?>
                    <h3>Honors <br>&amp; Awards</h3>
                    <ul>
                    <?php
                        while ( have_rows( 'honors', $user_id ) ) :
                            the_row();
                    ?>
                        <li>
                            <?php if ( get_sub_field( 'honor_url' ) ) : ?>
                            <a href="<?php the_sub_field( 'honor_url' ); ?>">
                            <?php endif; ?>
                            <span class="honor"><?php the_sub_field( 'honor' ); ?></span>
                            <?php if ( get_sub_field( 'honor_url' ) ) : ?>
                            </a>
                            <?php endif; ?>
                            <?php if ( get_sub_field( 'year' ) ) : ?>
                            <span class="year"> <?php the_sub_field( 'year' ); ?></span>
                            <?php endif; ?>
                            <?php if ( get_sub_field( 'source' ) ) : ?>
                            <span class="source">
                                <?php if ( get_sub_field( 'source_url' ) ) : ?>
                                <a href="<?php the_sub_field( 'source_url' ); ?>">
                                <?php endif; ?>
                                <?php the_sub_field( 'source' ); ?>
                                <?php if ( get_sub_field( 'source_url' ) ) : ?>
                                </a>
                                <?php endif; ?>
                            </span>
                            <?php endif; ?>
                        </li>
                    <?php
                        endwhile;
                    endif;
                    ?>
                    </ul>

                    <?php if ( have_rows( 'memberships', $user_id ) ) : ?>
                    <h3>Memberships</h3>
                    <ul>
                    <?php
                        while ( have_rows( 'memberships', $user_id ) ) :
                            the_row();
                    ?>
                        <li>
                            <?php if ( get_sub_field( 'membership_url' ) ) : ?>
                            <a href="<?php the_sub_field( 'membership_url' ); ?>">
                            <?php endif; ?>
                            <span class="honor"><?php the_sub_field( 'membership' ); ?></span>
                            <?php if ( get_sub_field( 'membership_url' ) ) : ?>
                            </a>
                            <?php endif; ?>
                        </li>
                    <?php
                        endwhile;
                    endif;
                    ?>
                    </ul>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ( have_rows( 'civic_activities', $user_id ) ) : ?>
                <div class="author-activities">
                    <div class="author-wrap">
                    <h3>Civic <br>Activities</h3>
                    <ul>
                    <?php
                        while ( have_rows( 'civic_activities', $user_id ) ) :
                            the_row();
                    ?>
                        <li>
                            <?php if ( get_sub_field( 'organization_url' ) ) : ?>
                            <a href="<?php the_sub_field( 'organization_url' ); ?>">
                            <?php endif; ?>
                            <span class="organization"><?php the_sub_field( 'organization' ); ?></span>
                            <?php if ( get_sub_field( 'organization_url' ) ) : ?>
                            </a>
                            <?php endif; ?>
                            <?php if ( get_sub_field( 'year' ) ) : ?>
                            <span class="year"><?php the_sub_field( 'year' ); ?></span>
                            <?php endif; ?>
                            <?php if ( get_sub_field( 'role' ) ) : ?>
                            <span class="role">
                                <?php the_sub_field( 'role' ); ?>
                            </span>
                            <?php endif; ?>
                        </li>
                    <?php
                        endwhile;
                    ?>
                    </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if ( have_posts() ) : ?>
    <div class="container">
        <section class="attorney-blog">       
            <header class="blog-header">
                <h2>RDM's Knowledge Blog <span class="subheading">Posts by <?php echo $first_name . ' ' . $last_name; ?></span></h2>
            </header>
            <?php
                $args = array(
                    'post_type' => 'post',
                    'meta_query' => array(
                        array(
                            'key' => 'post_authors',
                            'value' => '"' . $attorney->ID . '"',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $posts_query = new WP_Query( $args );
                if ( $posts_query->have_posts() ) :
                    while ( $posts_query->have_posts() ) :
                        $posts_query->the_post();
                        get_template_part( 'content/author-post' );
                    endwhile;
                    wp_reset_postdata();
                endif;
                // echo '<pre>' . print_r( $posts_query ) . '</pre>';
            ?>
       
        </section>
    </div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>