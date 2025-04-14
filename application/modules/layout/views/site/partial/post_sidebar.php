<div class="widgets-container">

	<!-- Search Widget -->
	<div class="search-widget widget-item">

		<h3 class="widget-title">Search</h3>
		<form action="">
			<input type="text">
			<button type="submit" title="Search"><i class="bi bi-search"></i></button>
		</form>

	</div><!--/Search Widget -->

	<!-- Categories Widget -->
	<?php if (isset($list_postcats) && is_array($list_postcats) && !empty($list_postcats)) { ?>
		<div class="categories-widget widget-item">

			<h3 class="widget-title">Danh mục</h3>
			<ul class="mt-3">
				<?php foreach ($list_postcats as $value) {
					$data_title = $value['name'];
					$data_numbers_of_posts = $value['numbers_of_posts'];
					$data_link = site_url('danh-muc-bai-viet/' . $value['alias']);
				?>
					<li><a href="<?php echo $data_link; ?>"><?php echo $data_title; ?> <span>(<?php echo $data_numbers_of_posts; ?>)</span></a></li>

				<?php } ?>
			</ul>

		</div><!--/Categories Widget -->
	<?php } ?>

	<!-- Recent Posts Widget -->
	<?php if (isset($list_posts_recently) && is_array($list_posts_recently) && !empty($list_posts_recently)) { ?>
		<div class="recent-posts-widget widget-item">

			<h3 class="widget-title">Mới nhất</h3>
			<?php foreach ($list_posts_recently as $value) {
				$data_id = $value['id'];
				$data_title = word_limiter($value['title'], 15);
				$data_link = site_url($value['cat_alias'] . '/' . $value['alias'] . '-' . $data_id);
				$data_image = array(
					'src' => get_media('posts', $value['homeimgfile'], 'no-image-thumb.png'),
					'alt' => $value['homeimgfile']
				);
				$data_created_at = date('M j, Y', ($value['addtime']));
			?>
				<div class="post-item">
					<img src="<?php echo $data_image['src']; ?>" alt="" class="flex-shrink-0">
					<div>
						<h4><a href="<?php echo $data_link; ?>"><?php echo $data_title; ?></a></h4>
						<time datetime="<?php echo date('Y-m-d', $value['addtime']); ?>"><?php echo $data_created_at; ?></time>
					</div>
				</div><!-- End recent post item-->
			<?php } ?>
		</div><!--/Recent Posts Widget -->
	<?php } ?>

	<?php if (isset($list_tags) && is_array($list_tags) && !empty($list_tags)) { ?>
		<!-- Tags Widget -->
		<div class="tags-widget widget-item">

			<h3 class="widget-title">Tags</h3>
			<ul>
				<?php foreach ($list_tags as $value) { ?>
					<li><a href="#"><?php echo $value['name']; ?></a></li>
				<?php } ?>
			</ul>

		</div><!--/Tags Widget -->
	<?php } ?>

</div>