<?php
/* Template Name: Service */
?>

<?php get_header(); ?>


<?php
$champs_service = get_fields();
$service_image_bg =  $champs_service['service_image_bg'];
$service_introduction =  $champs_service['service_introduction'];
?>
<header class="introduction-header">
    <div class="intro">
        <?php if( $service_image_bg ) : ?>
            <div class="bg-image-container">
                <img class="bg-image" src="<?php echo esc_html($service_image_bg); ?>" alt="Random PHP" />
            </div>
        <?php endif; ?>
        <?php if( $service_introduction ) : ?>
            <h2><?php echo esc_html($service_introduction); ?></h2>
        <?php endif; ?>
    </div>
    </header>
    <h2><?php the_title(); ?></h2>
<?php
 get_footer(); ?>
