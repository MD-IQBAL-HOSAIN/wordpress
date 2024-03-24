<?php get_header() ?>
<?php //get_template_part("nav"); ?>
<div class="container">
    <hr>
    <div class="row">
        <div class="col-9">
            <?php
            // 
            // $myPosts = new WP_Query( 'posts_per_page=20' );
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    //loop content (template tags, html, etc)
            ?>

                    <div class="row">
                        <div class="col-md-8">
                            <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                            <a href="<?php the_permalink() ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                            written by <?php the_author(); ?> at <?php the_date(); ?> <?php the_time(); ?>
                            in category: <?php the_category(); ?>
                            <h6>Post ID: <?php the_ID(); ?></h6>
                            <p><?php the_tags(); ?></p>

                            <?php if (is_home()) { ?>
                                <p><?php the_excerpt(); ?></p>
                            <?php } else { ?>
                                <p><?php the_content(); ?></p>
                            <?php } ?>
                            <?php edit_post_link() ?>
                            <hr>
                            <div>
                                <?php
                                // comment_form()
                                comments_template();
                                ?>
                            </div>
                            <!-- previous move -->
                            <div>
                                <div style="background-color: darkcyan; color: white; text-align:center; padding: 15px;" class="nav-previous alignleft">
                                    <?php previous_posts_link('Previous posts'); ?>
                                </div>
                                <div style="background-color: darkcyan; color: white; text-align:center; padding: 15px;" class="nav-next alignright">
                                    <?php next_posts_link('Next Posts'); ?>
                                </div>
                            </div>
                            <!-- next move -->
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
            <!-- <p>Next Post: <?php next_posts_link(__('Older Entries', 'textdomain')); ?></p> -->
        </div>
        <div class="col-3">
      <div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
        <h3><b>Sidebar</b></h3>
      </div>
      <?php get_sidebar(); ?>
    </div>
    </div>

</div>
<?php get_footer() ?>