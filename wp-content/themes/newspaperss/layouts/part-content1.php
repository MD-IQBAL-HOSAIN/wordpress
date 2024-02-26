<?php

/**
 * post layout1 for displaying postpage
 *
 * @package silkthemes
 * @subpackage newspaperss
 * @since newspaperss 1.0
 */
?>

<div class="block-content-wrap lates-post-blogbig">
	<article class="grid-x grid-padding-x post-wrap-blog ">
		<?php if (has_post_thumbnail()) {
		?>
			<div class=" small-12 cell thumbnail-resize">
				<?php the_post_thumbnail('newspaperss-xlarge', array('class' => 'float-center')); ?>
			</div>
		<?php
		} ?>
		<div class=" small-12 cell ">
			<?php if (has_post_thumbnail()) : ?>
				<div class="post-body ">
				<?php else : ?>
					<div class="post-body post-body-noimg ">
					<?php endif; ?>
					<div class="post-list-content">
						<div class="post-cat-info ">
							<?php newspaperss_category_list(); ?>
						</div>
						<?php the_title(sprintf('<h3 class="post-title is-size-2"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<div class="post-meta-info ">
							<div class="post-meta-info-left">
								<span class="meta-info-el meta-info-author">
									<a class="vcard author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
										<?php the_author(); ?>
									</a>
								</span>
								<span class="meta-info-el meta-info-date">
									<time class="date update"><?php the_time(get_option('date_format')); ?></time>
								</span>
							</div>
						</div>
					</div>
					</div>
				</div>
	</article>
</div>