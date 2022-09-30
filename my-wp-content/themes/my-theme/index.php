<?php
/*
 * Template for all static pages.
 */
?>

<?php get_header(); ?>

<div class="section" style="min-height: 80vh;">
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div <?php post_class(); ?>>
                <h1 class="title"><?php echo the_title(); ?></h1>
                <div class="content">
			        <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
