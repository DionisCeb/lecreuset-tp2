<?php
/* Template Name: A propos */
?>

<?php get_header(); 

$champs_apropos = get_fields();
$apropos_contenu = $champs_apropos['apropos_editeur'];


?>
<section class="flex-center">
    <section class="structure80">
        <?php echo $apropos_contenu; ?>
    </section>
</section>

<?php

get_footer(); ?>
