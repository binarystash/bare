<?php get_header() ?>
	
	<div id="primary" class="site-content unreset">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

			 <div <?php post_class() ?>>

				<header class="entry-header">
					<h1 class="entry-title"><?php the_title() ?></h1>
				</header>

				<div class="entry-content">
					<?php the_content() ?>
				</div>
				
				<?php the_tags() ?>

				<?php if ( comments_open() ) : ?>
					<div class="comments-link">
						<?php comments_popup_link( '<span class="leave-reply">Leave a reply</span>', '1 Reply', '% Replies' ); ?>
					</div>
				<?php endif; ?>

				<?php comments_template( '', true ); ?>

				</div>

			<?php endwhile ?>

		<?php else: ?>

			<header class="entry-header">
				<h1 class="entry-title">Nothing found</h1>
			</header>

			<div class="entry-content">
				<p>Apologies, but no results were found. Perhaps searching will help find a related post.</p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->

		<?php endif ?>

	</div>

<?php get_sidebar() ?>
<?php get_footer() ?>