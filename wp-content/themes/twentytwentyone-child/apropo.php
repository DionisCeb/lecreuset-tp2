<?php
/* Template Name: A propos */
?>

<?php get_header(); 

$champs_apropos = get_fields();
$apropos_contenu = $champs_apropos['apropos_editeur'];


?>
<section class="flex-center">
    <section class="structure80">
        <div class="contenu flex-col gap20">
            <?php echo $apropos_contenu; ?>
        </div>
    </section>
</section>

<?php

get_footer(); ?>
