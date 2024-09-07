<?php
// Récupérer l'en-tête de la page
get_header();

//Les champs à récupérer depuis ACF
$champs_accueil = get_fields();
$accueil_slogan =  $champs_accueil['accueil_slogan'];
$accueil_image_bg =  $champs_accueil['accueil_image_bg'];
//si l’image de fond n’est pas saisie dans l’admin, l’image de fond (le-creuset-bg-par-defaut.jpg) par défaut est affichée
if ( ! $accueil_image_bg ) {
    $accueil_image_bg = get_template_directory_uri() . '/assets/images/le-creuset-bg-par-defaut.jpg';
}
$accueil_introduction =  $champs_accueil['accueil_introduction'];
?>
<header class="introduction-header">
    <div class="intro height60">
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
            <div class="introduction flex-center-center height30">
                <div class="introduction-description"><?php echo $accueil_introduction; ?></div>
            </div>
        <?php endif; ?>
    </header>
    <?php


// Les paramètres pour la requête de récupération des articles
$args = [
    'posts_per_page'    => -1,
    // SPECIFICATION que le type de post est "article"
    'post_type'     => 'article',
];

// Effectuer la requête
$the_query = new WP_Query( $args );

// Vérifier s'il y a des publications d'articles
if( $the_query->have_posts() ):


?>

<main class="accueil-articles-section">
    <!-- Section Vaisselle -->
    <section class="height50 flex-col-center-center gap30">
        <div class="catalog-title structure80">
            <h2>Vaisselle</h2>
        </div>
        <div class="catalog_container structure80">
            <?php
            //les variables pour les articles de vaisselle
            /**
             * vaissele_aticles_afficher -> Afficher les articles avec la categorie(vaissele)
             * vaisselle_compteur_afficher -> Pour afficher un nombre limité d'articles 
             */
            $vaissele_aticles_afficher = false;
            $vaisselle_compteur_afficher = 0;
            // Boucle à travers les articles
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
                <a href="<?php the_permalink(); ?>">
                    <p class="article-titre"><?php the_title(); ?></p>
                </a>
            </div>
            <?php
            }
            endwhile;
            ?>
        </div>
    </section>

    <!-- Section Service -->
    <section class="height50 flex-col-center-center gap30">
        <div class="catalog-title structure80">
            <h2>Service</h2>
        </div>
        <div class="catalog_container structure80">
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
    </section>
</main>


<?php endif; ?>
<?php wp_reset_query(); 


// Récupérer le pied de page
get_footer();


?>