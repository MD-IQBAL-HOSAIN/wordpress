<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newspaperss
 */
?>

<div class="single-post-outer clearfix">
	<?php if (true == get_theme_mod('show_single_ftimage', true)) : ?>
		<!-- Header image-->
		<?php
		global $post;
		$post_ids = $post->ID; ?>
		<div class="single-post-feat-bg-outer">
			<div class="single-post-thumb-outer">
				<div class="post-thumb">
					<?php echo get_the_post_thumbnail($post_ids, 'newspaperss-xxlarge', array('class' => 'float-center object-fit-img')); ?>
				</div>
			</div>
		</div>
		<!-- Header image-->
	<?php endif; ?>
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center single-wrap ">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : ?>
					<?php the_post(); ?>
					<div class="cell large-auto  small-12 ">
						<article class="single-post-wrap " id="post-<?php the_ID(); ?>">
							<div class="single-post-content-wrap">
								<div class="single-post-header">
									<?php if (true == get_theme_mod('show_single_breadcrumb', true)) : ?>
										<div class="single-post-top">
											<!-- post top-->
											<div class="grid-x ">
												<div class="cell large-12 small-12 ">
													<div class="breadcrumb-wrap">
														<?php newspaperss_breadcrumb(); ?>
													</div>
													<span class="text-right"><?php newspaperss_edit_link(); ?></span>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<!-- post meta and title-->
									<?php if (true == get_theme_mod('show_single_cat', true)) : ?>
										<div class="post-cat-info clearfix">
											<?php newspaperss_category_list(); ?>
										</div>
									<?php endif; ?>
									<div class="single-title ">
										<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
									</div>
									<?php if (true == get_theme_mod('newspaperss_show_single_author', true) || true == get_theme_mod('newspaperss_show_single_date', true) || true == get_theme_mod('newspaperss_show_single_comments', true)) : ?>
										<div class="post-meta-info ">
											<?php if (true == get_theme_mod('newspaperss_show_single_author', true)) : ?>
												<span class="meta-info-el meta-info-author">
													<?php echo get_avatar(get_the_author_meta('ID'), '40'); ?>
													<a class="vcard author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
														<?php echo get_the_author(); ?>
													</a>
												</span>
											<?php endif; ?>
											<?php if (true == get_theme_mod('newspaperss_show_single_date', true)) : ?>
												<span class="meta-info-el mate-info-date-icon">
													<i class="fa fa-clock-o"></i>
													<?php echo newspaperss_time_link(); ?>
												</span>
											<?php endif; ?>
											<?php if (true == get_theme_mod('newspaperss_show_single_comments', true) && have_comments()) : ?>
												<span class="meta-info-el meta-info-comment">
													<i class="fa fa-comment-o"></i>
													<?php newspaperss_meta_comment(); ?>
												</span>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
								<!-- post top END-->
								<!-- post main body-->
								<div class="single-content-wrap">
									<div class="entry single-entry ">
										<?php
										the_content(sprintf(
											/* translators: %s: Name of current post. */
											wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'newspaperss'), array('span' => array('class' => array()))),
											the_title('<span class="screen-reader-text">"', '"</span>', false)
										));
										wp_link_pages(array(
											'before' => '<div class="page-links">' . esc_html__('Pages:', 'newspaperss'),
											'after'  => '</div>',
										));
										?>
									</div>
									<?php if (true == get_theme_mod('newspaperss_show_single_tags', true)) : ?>
										<span class="single-post-tag">
											<?php newspaperss_meta_tag(); ?>
										</span>
									<?php endif; ?>
									<?php if (comments_open() || get_comments_number()) { ?>
										<div class="box-comment-content">
											<?php comments_template(); ?>
										</div>
									<?php } ?>
								</div>
								<?php if (true == get_theme_mod('newspaperss_show_single_authorbio', true)) : ?>
									<div class="single-post-box-outer">
										<?php get_template_part('parts/box', 'author'); ?>
									</div>
								<?php endif; ?>
								<?php get_template_part('functions/single', 'postnavi'); ?>
								<?php if (true == get_theme_mod('newspaperss_show_single_related', true)) : ?>
									<?php get_template_part('parts/related', 'post'); ?>
								<?php endif; ?>
							</div>
						</article>
					</div>
					<!-- post content warp end-->
				<?php endwhile ?>
			<?php endif ?>
			<!-- End of the loop. -->
			<?php get_template_part('sidebar'); ?>
		</div>
	</div>
</div>
<!-- .single-post-outer -->