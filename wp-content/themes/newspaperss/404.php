<?php
/**
 * The template for displaying 404 pages (Not Found)
 * @package newspaperss
 * @subpackage newspaperss
 */
get_header(); ?>
<!-- Home Section -->
<section class="section-404">
	<div class="grid-container">
		<div class="grid-y medium-grid-frame align-center ">
			<div class="cell  medium-cell-block">
				<!-- Hero Content -->
				<div class="home-content container">
					<div class="home-text">
						<div class="hs-cont">
							<!-- Headings -->
							<div class="hs-wrap">
								<div class="hs-line-13 font-alt mb-10">
									<h1 class="page-title"><?php  esc_html_e( 'Oops! That page can&rsquo;t be found.', 'newspaperss' ); ?></h1>
								</div>
								<div class="hs-line-4 font-alt mb-40">
									<p><?php  esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'newspaperss' ); ?></p>
								</div>
								<div class="local-scroll">
									<?php get_search_form(); ?>
								</div>
							</div>
							<!-- End Headings -->
						</div>
					</div>
				</div>
				<!-- End Hero Content -->
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
