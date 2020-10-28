<?php
/**
 * The template file for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dutchtown
 * @subpackage Itaska
 * @since 0.1
 */

get_header(); ?>
<main class="main-search" id="content">
    <header class="main-header">
		<div class="main-header-container container">
			<h1><span></h1>
		</div>
    </header>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
            the_post();
			get_template_part( 'content/front-page-post' );
        endwhile;
        echo bootstrap_pagination();
    endif;
    ?>
</main>
<?php get_footer(); ?>