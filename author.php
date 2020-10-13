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
                        <li><a href="tel:<?php echo $telephone; ?>"><svg class="mdi" width="24" height="24" viewBox="0 0 24 24"><path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg><span class="contact"><?php echo phone_format( $telephone ); ?></span></a></li>
                        <li><a href="mailto:<?php echo $email; ?>"><svg class="mdi" width="24" height="24" viewBox="0 0 24 24"><path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg><span class="contact"><?php echo $email; ?></span></a></li>
                        <?php if ( $linkedin ) : ?>
                        <li><a href="<?php echo $linkedin; ?>"><svg class="mdi" width="24" height="24" viewBox="0 0 24 24"><path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" /></svg><span class="contact">LinkedIn</span></a></li>
                        <?php endif; ?>
                        <li><a href="#"><svg class="mdi" width="24" height="24" viewBox="0 0 24 24"><path d="M2,3H22C23.05,3 24,3.95 24,5V19C24,20.05 23.05,21 22,21H2C0.95,21 0,20.05 0,19V5C0,3.95 0.95,3 2,3M14,6V7H22V6H14M14,8V9H21.5L22,9V8H14M14,10V11H21V10H14M8,13.91C6,13.91 2,15 2,17V18H14V17C14,15 10,13.91 8,13.91M8,6A3,3 0 0,0 5,9A3,3 0 0,0 8,12A3,3 0 0,0 11,9A3,3 0 0,0 8,6Z" /></svg><span class="contact">vCard</span></a></li>
                        <li><a href="<?php echo $office_link; ?>"><svg class="mdi" width="24" height="24" viewBox="0 0 24 24"><path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg><span class="contact"><address>
                                <span class="addr-1"><?php echo $office_address; ?></span>
                                <span class="addr-2"><?php echo $office_address_2; ?></span>
                                <span class="addr-csz"><?php echo $office_city; ?>, <?php echo $office_state; ?> <?php echo $office_zip; ?></span>
                            </address></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="author-bio">
                    <?php 
                        the_field( 'attorney_bio', $user_id );
                        $cta = get_field( 'cta', $user_id );
                        if ( $cta['headline'] ) :
                    ?>
                    <div class="cta bg-<?php echo $cta['color']; ?>">
                        <h3><?php echo $cta['headline']; ?></h3>
                        <?php echo $cta['body']; ?>
                        <p><a class="btn" href="<?php echo $cta['button_link']; ?>"><?php echo $cta['button_text']; ?></a></p>
                    </div>
                    <?php endif; ?>
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
                            <h4><?php echo $law_school['name']; ?><?php if ( $law_school['year'] ) : ?> <span class="year"><?php echo $law_school['year']; ?></span><?php endif; ?></h4>
                            <p>
                            <?php
                                echo $law_school['degree'];
                                if ( $law_school['honors'] ) : 
                                    echo ', <span class="honors">';
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
                            <h4><?php echo $grad_school['name']; ?><?php if ( $grad_school['year'] ) : ?> <span class="year"><?php echo $grad_school['year']; ?></span><?php endif; ?></h4>
                            <p>
                            <?php
                                echo $grad_school['degree'];
                                if ( $grad_school['honors'] ) : 
                                    echo ', <span class="honors">';
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
                            <h4><?php echo $college['name']; ?><?php if ( $college['year'] ) : ?> <span class="year"><?php echo $college['year']; ?></span><?php endif; ?></h4>
                            <p>
                            <?php
                                echo $college['degree'];
                                if ( $college['honors'] ) : 
                                    echo ', <span class="honors">';
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
    ?>
    <div class="container">
        <section class="attorney-blog">       
            <header class="blog-header">
                <h2>RDM's Knowledge Blog <span class="subheading">Posts by <?php echo $first_name . ' ' . $last_name; ?></span></h2>
            </header>
            <?php
                while ( $posts_query->have_posts() ) :
                    $posts_query->the_post();
                    get_template_part( 'content/author-post' );
                endwhile;
            ?>
        </section>
    </div>
    <?php
        wp_reset_postdata();
        endif;
        // echo '<pre>' . print_r( $posts_query ) . '</pre>';endif; 
    ?>
</main>
<?php get_footer(); ?>