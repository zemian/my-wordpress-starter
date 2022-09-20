<?php
/*
 * Default WP index for theme.
 */
?>

<?php get_header(); ?>

<div class="section" style="min-height: 80vh;">
    <div class="container">
        <div class="columns">
            <div class="column is-8 is-offset-2">
				<?php
				if (have_posts()):
					while (have_posts()):
						the_post();
						?>
                        <div <?php post_class('block'); ?>>
                            <h1 class="title">
                                <a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a>
                            </h1>
                            <p class="subtitle"><?php echo get_the_modified_time('F jS, Y'); ?></p>
                            <div class="content">
								<?php the_excerpt(); ?>
                            </div>
                        </div>
					<?php
					endwhile;
				else:
					?>
                    <div class="notification">There is no article found. Create a new post now!</div>
				<?php
				endif;
				?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

