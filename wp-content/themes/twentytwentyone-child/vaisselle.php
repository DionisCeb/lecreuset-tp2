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
    <h2><?php the_title(); ?></h2>
    <?php

get_footer(); ?>
