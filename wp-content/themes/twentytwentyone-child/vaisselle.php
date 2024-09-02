<?php
/* Template Name: Vaisselle */
?>

<?php get_header(); ?>

<?php
$champs_vaisselle = get_fields();
$vaisselle_image_bg =  $champs_vaisselle['vaisselle_image_bg'];
$vaisselle_introduction =  $champs_vaisselle['vaisselle_introduction'];
?>
<header class="introduction-header">
    <div class="intro">
        <?php if( $vaisselle_image_bg ) : ?>
            <div class="bg-image-container">
                <img class="bg-image" src="<?php echo esc_html($vaisselle_image_bg); ?>" alt="Random PHP" />
            </div>
        <?php endif; ?>
        <?php if( $vaisselle_introduction ) : ?>
            <h2><?php echo esc_html($vaisselle_introduction); ?></h2>
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

<main class="flex-center">
    <div class="structure90">
        <h2><?php the_title(); ?></h2>
        <section class="catalog_section">
            <?php
            $vaissele_aticles_afficher = false;
            $vaisselle_compteur_afficher = 0;
            while( $the_query->have_posts() ) : $the_query->the_post();
            $articles = get_fields();
            $article_image = $articles['article_image'];
            $article_categorie = $articles['article_categorie'];
            $article_description = $articles['article_description'];
            $article_prix = $articles['article_prix'];
            $article_actif = $articles['article_actif'];
            //Afficher les articles avec la categorie "Vaisselle"
            if ((is_array($article_categorie) && in_array('Vaisselle', $article_categorie)) || $article_categorie === 'Vaisselle') {
                $vaissele_aticles_afficher = true;
            ?>
        
            <div class="carte">
                <div class="article-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?= $article_image; ?>" />
                    </a>
                </div>
                <p class="article-titre"><?php the_title(); ?></p>
                <div class="link-wrapper">
                    <a class="link-btn" href="<?php the_permalink(); ?>">Voir plus</a>
                </div>
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
