<?php
get_header();


$champs_accueil = get_fields();
$accueil_slogan =  $champs_accueil['accueil_slogan'];
$accueil_image_bg =  $champs_accueil['accueil_image_bg'];
$accueil_introduction =  $champs_accueil['accueil_introduction'];
?>
<header class="introduction-header">
    <div class="intro">
        <?php if( $accueil_image_bg ) : ?>
            <div class="bg-image-container">
                <img class="bg-image" src="<?php echo esc_html($accueil_image_bg); ?>" alt="Random PHP" />
            </div>
        <?php endif; ?>
        <?php if( $accueil_slogan ) : ?>
            <h2><?php echo esc_html($accueil_slogan); ?></h2>
        <?php endif; ?>
    </div>
    
    <?php if( $accueil_introduction ) : ?>
            <div class="introduction"><?php echo $accueil_introduction; ?></div>
        <?php endif; ?>
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

<main class="accueil-articles-section">
    <!-- Section Vaisselle -->
    <h2>Vaisselle</h2>

    <div class="catalog_container">
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
        if (((is_array($article_categorie) && in_array('Vaisselle', $article_categorie)) || $article_categorie === 'Vaisselle') && $vaisselle_compteur_afficher < 5) {
            $vaissele_aticles_afficher = true;
            //compteur jusqu'a 5 articles per ligne
            $vaisselle_compteur_afficher++;
        ?>
        
        <div class="carte-article">
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
    </div>

    <!-- Section Service -->
    <h2>Service</h2>

    <div class="catalog_container">
        <?php
        $services_aticles_afficher = false;
        $service_compteur_afficher = 0;
        while( $the_query->have_posts() ) : $the_query->the_post();
        $articles = get_fields();
        $article_image = $articles['article_image'];
        $article_categorie = $articles['article_categorie'];
        $article_description = $articles['article_description'];
        $article_prix = $articles['article_prix'];
        $article_actif = $articles['article_actif'];
        //Afficher les articles avec la categorie "Service"
        if (((is_array($article_categorie) && in_array('Service', $article_categorie)) || $article_categorie === 'Service')&& $service_compteur_afficher < 5) {
            $services_aticles_afficher = true;
            $service_compteur_afficher++;
        ?>
        
        <div class="carte-article">
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
    </div>
</main>


<?php endif; ?>
<?php wp_reset_query(); 



get_footer();


?>