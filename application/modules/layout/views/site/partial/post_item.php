<?php if (isset($data) && is_array($data) && !empty($data)): ?>
  <?php foreach ($data as $key => $value) {
    $data_id = $value['id'];
    $data_title = word_limiter($value['title'], 15);
    $data_hometext = word_limiter($value['hometext'], 100);
    $data_link = site_url($value['categories']['alias'] . '/' . $value['alias'] . '-' . $data_id);
    $data_image = array(
      'src' => get_media('posts', $value['homeimgfile'], 'no-image-thumb.png', '832x270x1'),
      'alt' => $value['homeimgfile']
    );
    $data_created_at = date('M j, Y', ($value['addtime']));
    $data_author = $value['full_name'];
    $data_category_name = $value['categories']['name'];
  ?>
    <div class="col-12">
      <article>
        <div class="post-img">
          <img src="<?php echo $data_image['src']; ?>" alt="<?php echo $data_image['alt']; ?>" class="img-fluid">
        </div>
        <h2 class="title">
          <a href="<?php echo $data_link; ?>"><?php echo $data_title; ?></a>
        </h2>
        <div class="meta-top">
          <ul>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                href=""><?php echo $data_author; ?></a></li>
            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                href=""><time datetime="<?php echo date('Y-m-d', $value['addtime']); ?>"><?php echo $data_created_at; ?></time></a></li>
          </ul>
        </div>
        <div class="content">
          <p>
            <?php echo $data_hometext; ?>
          </p>
          <div class="read-more">
            <a href="<?php echo $data_link; ?>">Read More</a>
          </div>
        </div>
      </article>
    </div><!-- End post list item -->
  <?php } ?>
<?php endif; ?>