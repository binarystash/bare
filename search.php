<?php get_header() ?>
	
	<div id="primary" class="site-content unreset">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<header class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
				</header>

				<div class="entry-content">
					<?php the_content() ?>
				</div>

				<?php if ( comments_open() ) : ?>
					<div class="comments-link">
						<?php comments_popup_link( '<span class="leave-reply">Leave a reply</span>', '1 Reply', '% Replies' ); ?>
					</div>
				<?php endif; ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile ?>

			<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
			<div class="clear"></div>

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