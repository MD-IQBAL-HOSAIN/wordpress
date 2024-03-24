<div>
	<br> <br>
	<div>
		<div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
			<h3>Pages Link</h3>
		</div>
		<?php wp_page_menu('show_home=1&menu_class=my-menu&sort_column=menu_order'); ?>
	</div>
	<div>
		<div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
			<h3>Categories Link</h3>
		</div>
		<ul>
			<?php wp_list_categories('title_li=&depth=4&orderby=name&exclude=16,34'); ?>
		</ul>
	</div>
	<div>
		<div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
			<h3>Tag Cloud</h3>
		</div>
		<?php wp_tag_cloud() ?>
	</div>
	<div>
		<div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
			<h3>Social Menu</h3>
		</div>
		<?php get_template_part("socialmenu"); ?>
	</div>
	<div>
		<div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
			<h3>Author Meta</h3>
		</div>
		The email address for user id 1 is <?php the_author_meta('user_email', 1); ?>
	</div>
	<div>
		<div style="background-color: darkcyan; color: white; text-align:center; padding: 5px;">
			<h3>Calender</h3>
		</div>
	</div>
	<div>		
		<?php
		if (is_active_sidebar('right_sidebar2')) {
			dynamic_sidebar('right_sidebar2');
		} else {
			echo 'No widgets assigned to the right sidebar.';
		}
		?>

	</div>
</div>