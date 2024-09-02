<?php
/**
 * Afficher tous les articles individuels
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

 // l'en-tête du thème
get_header();

// le type de publication actuelle
$post_type = get_post_type();

switch ( $post_type ) {
	case 'article':
		// le type de publication 'article'
		get_template_part( 'template-parts/article' );
		break;
	
	default:
	//les données du post (l'article) courant
	while ( have_posts() ) :
		the_post();
	
		//afficher le contenu d'un post (article)
		get_template_part( 'template-parts/content/content-single' );	
	endwhile;
		break;
}

// Inclut le pied de page du thème
get_footer();
