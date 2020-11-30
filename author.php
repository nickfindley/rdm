<?php get_header(); ?>

<?php
$attorney = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
$user_id = 'user_' . $attorney->ID;

$color = get_field( 'attorney_color', $user_id ) ? get_field( 'attorney_color', $user_id ) : 'red';

$first_name = $attorney->first_name;
$last_name = $attorney->last_name;
$telephone = $attorney->telephone;
$mobile = $attorney->mobile;
$email = $attorney->user_email;
if ( $email == 'nfindley@rdm.law') : $email = ''; endif;
$linkedin = $attorney->linkedin;

$title = get_field( 'title', $user_id );
$photo = get_field( 'photo', $user_id );

$law_school = get_field( 'law_school', $user_id );
$grad_school = get_field( 'grad_school', $user_id );
$college = get_field( 'college', $user_id );

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
    <header class="page-header big-image-header bg-<?php echo $color; ?>" id="pageHeader">
        <?php echo wp_get_attachment_image( $office_photo_id, 'full', '', ['class' => 'no-lazyload'] ); ?>
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
                        <?php if ( $telephone ) : ?>
                        <li>
                            <a href="tel:<?php echo $telephone; ?>">
                                <i class="fas fa-fw fa-phone-alt"></i><span class="contact"><?php echo phone_format( $telephone ); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ( $mobile ) : ?>
                        <li>
                            <a href="tel:<?php echo $mobile; ?>">
                                <i class="fas fa-fw fa-mobile-alt"></i><span class="contact"><?php echo phone_format( $mobile ); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ( $email ) : ?>
                        <li>
                            <a href="mailto:<?php echo $email; ?>" target="_blank">
                                <i class="fas fa-fw fa-envelope"></i><span class="contact"><?php echo $email; ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ( $linkedin ) : ?>
                        <li>
                            <a href="<?php echo $linkedin; ?>" target="_blank">
                                <i class="fab fa-fw fa-linkedin"></i><span class="contact">Connect on LinkedIn</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ( $vcard ) : ?>
                        <li>
                            <a href="#" target="_blank">
                                <i class="fas fa-fw fa-address-card"></i><span class="contact">vCard</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo $office_link; ?>" class="office-address">
                                <i class="fas fa-fw fa-map-marker-alt"></i>
                                <span class="contact">
                                    <address>
                                        <span class="addr-1"><?php echo $office_address; ?></span>
                                        <span class="addr-2"><?php echo $office_address_2; ?></span>
                                        <span class="addr-csz"><?php echo $office_city; ?>, <?php echo $office_state; ?> <?php echo $office_zip; ?></span>
                                    </address>
                                </span>
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
                    <div class="cta bg-<?php echo $color; ?>">
                        <h3><?php echo $cta['headline']; ?></h3>
                        <?php echo $cta['body']; ?>
                        
                        <p class="cta-contact-links">
                            <a class="btn" href="<?php echo $cta['button_link']; ?>"><?php echo $cta['button_text']; ?></a>

                            <span>
                                <?php if ( $telephone ) : ?>
                                <span class="cta-contact-link">
                                    <a class="btn" href="tel:<?php echo $telephone; ?>"><span class="sr-only">Telephone</span><i class="fas fa-phone"></i></a>
                                </span>
                                <?php endif; ?>
                                <?php if ( $mobile ) : ?>
                                <span class="cta-contact-link">
                                    <a class="btn" href="tel:<?php echo $mobile; ?>"><span class="sr-only">Mobile</span><i class="fas fa-mobile-alt"></i></a>
                                </span>
                                <?php endif; ?>
                                <?php if ( $email ) : ?>
                                <span class="cta-contact-link">
                                    <a class="btn" href="mailto:<?php echo $email; ?>"><span class="sr-only" target="_blank">Email</span><i class="fas fa-envelope"></i></a>
                                </span>
                                <?php endif; ?>
                            </span>
                        </p>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>

            <?php
                if ( 
                    have_rows( 'civic_activities', $user_id ) AND
                    ( have_rows( 'honors', $user_id ) ) || have_rows( 'memberships' , $user_id )
                ) :
                    $class = ' honors-and-activities';
                elseif (
                    ( have_rows( 'honors', $user_id ) || have_rows( 'memberships' , $user_id ) ) OR have_rows( 'civic_activities', $user_id )
                ) :
                    $class = ' honors-or-activities';
                endif;

                if (
                    ! empty ( $law_school['name'] ) OR
                    ! empty ( $grad_school['name'] ) OR
                    ! empty ( $college['name'] ) OR
                    get_field( 'practice_areas', $user_id ) OR
                    get_field( 'admissions', $user_id ) OR
                    have_rows( 'civic_activities', $user_id ) OR
                    have_rows( 'honors', $user_id ) OR
                    have_rows( 'memberships' , $user_id )
                ) :
            ?>
            <div class="row author-details<?php echo $class; ?>">
                <?php
                    if (
                        ! empty ( $law_school['name'] ) OR
                        ! empty ( $grad_school['name'] ) OR
                        ! empty ( $college['name'] )
                    ) :
                ?>
                <div class="author-education">
                    <div class="author-wrap">
                    <h3>Education</h3>
                    <ul>
                    <?php if ( ! empty ( $law_school['name'] ) ) : ?>
                        <li>
                            <h4><?php echo $law_school['name']; ?></h4>
                            <p>
                            <?php
                                echo $law_school['degree'];
                                if ( $law_school['honors'] ) : 
                                    echo ', <span class="honors">';
                                    echo $law_school['honors'];
                                    echo '</span>';
                                endif;
                                if ( $law_school['year'] ) :
                            ?>
                                <span class="year"><?php echo $law_school['year']; ?></span>
                            <?php
                                endif;
                            ?>
                            </p>
                        </li>
                    <?php 
                        endif;
                        if ( ! empty ( $grad_school['name'] ) ) :
                    ?>
                        <li>
                            <h4><?php echo $grad_school['name']; ?></h4>
                            <p>
                            <?php
                                echo $grad_school['degree'];
                                if ( $grad_school['honors'] ) : 
                                    echo ', <span class="honors">';
                                    echo $grad_school['honors'];
                                    echo '</span>';
                                endif;
                                if ( $grad_school['year'] ) :
                            ?>
                                <span class="year"><?php echo $grad_school['year']; ?></span>
                            <?php
                                endif;
                            ?>
                            </p>
                        </li>
                    <?php
                        endif;
                        if ( ! empty ( $college['name'] ) ) :
                    ?>
                        <li>
                            <h4><?php echo $college['name']; ?></h4>
                            <p>
                            <?php
                                echo $college['degree'];
                                if ( $college['honors'] ) : 
                                    echo ', <span class="honors">';
                                    echo $college['honors'];
                                    echo '</span>';
                                endif;
                                if ( $college['year'] ) :
                            ?>
                                <span class="year"><?php echo $college['year']; ?></span>
                            <?php
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
                <?php
                    endif;
                    if ( $practice ) :
                ?>
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
                <?php
                    endif;
                    if ( $admissions ) :
                ?>
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

                        usort( $adm, arrSortObjsByKey( 'post_parent_title', 'ASC' ));
                        foreach ( $adm as $post ) :
                            if ( $post->post_parent_title == 'State Courts' ) :
                                $parent_title = '';
                            else : 
                                $parent_title = '<span class="court-parent">' . $post->post_parent_title . ' </span>';
                            endif;
                            echo '<li>' . $parent_title . $post->post_title . '</li>';
                        endforeach;
                    ?>
                    </ul>
                    </div>
                </div>
                <?php
                    endif;
                    if ( have_rows( 'honors', $user_id ) || have_rows( 'memberships' , $user_id ) ) :
                ?>
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
                            <a href="<?php the_sub_field( 'honor_url' ); ?>" target="_blank">
                            <?php endif; ?>
                            <span class="honor"><?php the_sub_field( 'honor' ); ?></span>
                            <?php if ( get_sub_field( 'honor_url' ) ) : ?>
                            </a>
                            <?php endif; ?>

                            <?php if ( get_sub_field( 'year' ) ) : ?>
                            <br><span class="year"> <?php the_sub_field( 'year' ); ?></span>
                            <?php endif; ?>

                            <?php if ( get_sub_field( 'source' ) ) : ?>
                            <span class="source">
                                <?php if ( get_sub_field( 'source_url' ) ) : ?>
                                <a href="<?php the_sub_field( 'source_url' ); ?>" target="_blank">
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
                            <a href="<?php the_sub_field( 'membership_url' ); ?>" target="_blank">
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
                <?php
                    endif;
                    if ( have_rows( 'civic_activities', $user_id ) ) :
                ?>
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
                            <a href="<?php the_sub_field( 'organization_url' ); ?>" target="_blank">
                            <?php endif; ?>
                            <span class="organization"><?php the_sub_field( 'organization' ); ?></span>
                            <?php if ( get_sub_field( 'organization_url' ) ) : ?>
                            </a>
                            <?php endif; ?>
                            <?php if ( get_sub_field( 'role' ) ) : ?>
                            <span class="role">
                                <?php the_sub_field( 'role' ); ?>
                            </span>
                            <?php endif; ?>
                            <?php if ( get_sub_field( 'year' ) ) : ?>
                            <span class="year"><?php the_sub_field( 'year' ); ?></span>
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
            <?php endif; ?>
        </div>
    </section>

    <?php
        if ( $first_name == 'The RDM Team' ) :
            $args = array(
                'post_type' => 'post',
                'author' => 1
            );
        else :
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
        endif;

        $posts_query = new WP_Query( $args );
        if ( $posts_query->have_posts() ) :
    ?>
    <div class="container">
        <section class="attorney-blog">       
            <header class="blog-header">
                <h2>RDM's <?php the_field( 'blog_name', 'options' ); ?> Blog <span class="subheading">Posts by <?php echo $first_name . ' ' . $last_name; ?></span></h2>
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
    ?>
</main>
<?php get_footer(); ?>