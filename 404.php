<?php get_header(); ?>

	<div id="content" class="full-width">

		<div id="post-<?php the_ID(); ?>" class="post">

			<div class="post-content">

				<div class="title">
					<h2><?php echo __('Oops, This Page Could Not Be Found!', 'Inhouse'); ?></a></h2>
				</div><!-- /.title -->

				<div class="error_page">
					something
				</div><!-- /.error_page -->

			</div><!-- /.post-content -->

		</div><!-- /#post-## -->
		
	</div><!-- /#content -->

<?php get_footer(); ?>