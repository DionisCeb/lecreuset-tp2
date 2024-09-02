<?php

$articles = get_fields();
//var_dump($champs);
$article_image = $articles['article_image'];
$article_categorie = $articles['article_categorie'];
$article_description = $articles['article_description'];
$article_prix = $articles['article_prix'];
$article_actif = $articles['article_actif'];

?>
    
    <div class="container--article">
        <h1 class="article-titre"><?php the_title(); ?></h1>
        <div class="produit--article">
            <?php if( $article_image ) : ?>
                <div class="article--image">
                    <img src="<?php echo $article_image; ?>" alt="<?php  the_title(); ?>">
                </div>
                <div class="info-article">
                    <div class="article--titre">
                        <?php if( $article_categorie ) : ?>
                            <h1>Categorie: <?php echo  $article_categorie; ?></h1>
                        <?php endif; ?>
                    </div>
                    <div class="article--description">
                        <?php if( $article_description ) : ?>
                            <p>Description: <span class="designer"><?php echo  $article_description; ?></span></p>
                        <?php endif; ?>
                    </div>      
                    <?php endif; ?>
                    <div class="article--prix">
                        <?php if( $article_prix ) : ?>
                            <p>Prix: <span class="prix"><?php echo $article_prix; ?></span></p>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
    </div>