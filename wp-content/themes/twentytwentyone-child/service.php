<?php
/* Template Name: Service */
?>

<?php get_header(); ?>


<?php
$champs_service = get_fields();
$service_image_bg =  $champs_service['service_image_bg'];
if ( ! $service_image_bg ) {
    $service_image_bg = get_template_directory_uri() . '/assets/images/le-creuset-bg-par-defaut.jpg';
}
$service_introduction =  $champs_service['service_introduction'];
?>
<header class="introduction-header">
    <div class="intro height40">
        <?php if( $service_image_bg ) : ?>
            <div class="bg-image-container">
                <img class="bg-image" src="<?php echo esc_html($service_image_bg); ?>" alt="Random PHP" />
            </div>
        <?php endif; ?>
        <?php if( $service_introduction ) : ?>
            <h2 class="h2-left"><?php echo esc_html($service_introduction); ?></h2>
        <?php endif; ?>
    </div>
    </header>
<?php


$args = [
    'posts_per_page'    => -1,
    'post_type'     => 'article',
];

// query
$the_query = new WP_Query( $args );

if( $the_query->have_posts() ):


?>

<main class="catalog-main flex-center">
    <div class="structure90">
        <h2><?php the_title(); ?></h2>
        <section class="catalog_section">
            <?php
            $service_aticles_afficher = false;
            $service_compteur_afficher = 0;
            while( $the_query->have_posts() ) : $the_query->the_post();
            $articles = get_fields();
            $article_image = $articles['article_image'];
            $article_categorie = $articles['article_categorie'];
            $article_description = $articles['article_description'];
            $article_prix = $articles['article_prix'];
            $article_actif = $articles['article_actif'];
            //Afficher les articles avec la categorie "Service"
            if ((is_array($article_categorie) && in_array('Service', $article_categorie)) || $article_categorie === 'Service') {
                $service_aticles_afficher = true;
            ?>
        
            <div class="carte">
                <div class="article-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?= $article_image; ?>" />
                    </a>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <p class="article-titre"><?php the_title(); ?></p>
                </a>
                
            </div>
            <?php
            }
            endwhile;
            ?>
        </section>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer(); ?>
