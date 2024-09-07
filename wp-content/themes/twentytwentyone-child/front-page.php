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
            <div class="introduction flex-center-center height40">
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


/**
 * Fonction pour afficher les articles d'une catégorie spécifique
 *
 * $the_query La requête WP_Query contenant les articles
 * $categorie Le nom de la catégorie à afficher
 * $limite Le nombre maximal d'articles à afficher (par défaut 4)
 */

function afficher_articles_par_categorie($the_query, $categorie, $limite = 4) {
    $compteur = 0;
    ?>
    <section class="height50 flex-col-center-center gap30">
        <div class="catalog-title structure80">
            <h2><?php echo $categorie; ?></h2>
        </div>
        <div class="catalog_container structure80">
            <?php
            // Boucle à travers les articles
            while( $the_query->have_posts() ) : $the_query->the_post();
                $articles = get_fields();
                $article_image = $articles['article_image'];
                $article_categorie = $articles['article_categorie'];
                $article_description = $articles['article_description'];
                $article_prix = $articles['article_prix'];
                $article_actif = $articles['article_actif'];

                // Afficher les articles appartenant à la catégorie et limiter à $limite articles
                if (((is_array($article_categorie) && in_array($categorie, $article_categorie)) || $article_categorie === $categorie) && $compteur < $limite) {
                    $compteur++;
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
    <?php
}
?>

<main class="accueil-articles-section">
    <?php
    // Afficher les articles pour la catégorie "Vaisselle"
    afficher_articles_par_categorie($the_query, 'Vaisselle');

    // Réinitialiser le pointeur de boucle pour la prochaine catégorie
    $the_query->rewind_posts();

    // Afficher les articles pour la catégorie "Service"
    afficher_articles_par_categorie($the_query, 'Service');
    ?>
</main>

<?php
endif;


?>
<?php wp_reset_query(); 


// Récupérer le pied de page
get_footer();


?>