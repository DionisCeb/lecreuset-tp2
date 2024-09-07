<?php

$articles = get_fields();
//var_dump($champs);
$article_image = $articles['article_image'];
$article_categorie = $articles['article_categorie'];
$article_description = $articles['article_description'];
$article_prix = $articles['article_prix'];
$article_actif = $articles['article_actif'];

?>
    
    <section class="flex-center">
        <div class="structure80">
            <div class="container--article flex-col-center padding30">
                <h1 class="article-titre"><?php the_title(); ?></h1>
                <div class="produit--article flex-center-center gap50">
                    <?php if( $article_image ) : ?>
                        <div class="article--image">
                            <img src="<?php echo $article_image; ?>" alt="<?php  the_title(); ?>">
                        </div>
                        <div class="info-article flex-col gap20">
                            <div class="article--titre">
                                <?php if( $article_categorie ) : ?>
                                    <p><?php echo  $article_categorie; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="article--description">
                                <?php if( $article_description ) : ?>
                                    <p><strong>Description</strong> <br><span class="designer"><?php echo  $article_description; ?></span></p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <div class="article--prix">
                                <?php if( $article_prix ) : ?>
                                    <p><strong class="prix"><?php echo $article_prix; ?> $</strong></p>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>