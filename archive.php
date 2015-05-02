<?php get_header() ?>
	
	<div id="primary" class="site-content unreset">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h2 class="archive-title"><?php

					if ( is_day() ) :
						printf( 'Daily Archives: %s', '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( 'Monthly Archives: %s', '<span>' . get_the_date( 'F Y monthly archives date format' ) . '</span>' );
					elseif ( is_year() ) :
						printf( 'Yearly Archives: %s', '<span>' . get_the_date( 'Y yearly archives date format' ) . '</span>' );
					elseif ( is_category() ) :
						printf( 'Category Archives: %s', '<span>' . single_cat_title( '', false ) . '</span>' ); 
					else :
						'Archives';
					endif;
				?></h2>
			</header>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( ! post_password_required() && ! is_attachment() ) :
					the_post_thumbnail();
				endif; ?>
				
				<div <?php post_class() ?>>
				
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
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

		<?php wp_link_pages( $args ); ?>

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