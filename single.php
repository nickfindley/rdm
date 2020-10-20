<?php get_header(); ?>
<?php 
    $post_color = get_field( 'post_color' ) ? get_field( 'post_color' ) : 'blue';
?>
<main id="content">
    <header class="page-header big-image-header bg-red" id="pageHeader">
        <?php
            the_post_thumbnail();
        ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php
                        the_title();
                        if ( get_field( 'post_subtitle' ) ) :    
                    ?>
                    <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <div class="single post-<?php echo $post_color; ?>">
            <section class="single-content">
                <?php the_content(); ?>
            </section>

            <aside class="single-meta">                
            <?php
                $users = get_field( 'post_authors' );
                if ( $users ) :
                    if ( count ( $users ) > 1 ) :
                        echo '<h3>Authors</h3>';
                    else : 
                        echo '<h3>Author</h3>';
                    endif;
            ?>
                <ul class="post-authors">
            <?php
                    foreach ( $users as $user ) :
            ?>
                    <li>
                        <div class="attorney-photo">
            <?php
                        echo wp_get_attachment_image( get_field( 'photo', 'user_' . $user->ID ), 'medium' );
            ?>
                        </div>
                        <a class="stretched-link" href="<?php echo get_author_posts_url( $user->ID ); ?>">
                            <?php echo $user->display_name; ?>
                            <br>
                            <span class="attorney-title">
                                <?php the_field( 'title', 'user_' . $user->ID ); ?>
                            </span>
                        </a>
                    </li>
            <?php
                    endforeach;
                echo '</ul>';
                endif;
            ?>

            <h3>Published</h3>
            <p class="post-published"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?><br><span class="permalink">Permanent Link</span></a></p>

            <h3>Filed under</h3>
            <ul class="post-categories">
            <?php
                $cats = get_the_category();
                foreach ( $cats as $c ) :
            ?>
                <li><a href="<?php echo get_category_link( $c->term_id ); ?>"><?php echo $c->name; ?></a></li>
            <?php
                endforeach;
            ?>
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>