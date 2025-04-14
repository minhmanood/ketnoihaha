<main class="main">

  <?php if (isset($slideshow_none) && is_array($slideshow_none) && !empty($slideshow_none)): ?>
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <?php $data_img_src = get_media('images', $slideshow_none[1]['image'], 'no-image.png'); ?>
      <style>
        :root {
          --slideshow-home: url(<?php echo $data_img_src; ?>);
        }
      </style>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up"><?php echo $slideshow_none[1]['title']; ?></h1>
            <p data-aos="fade-up" data-aos-delay="100"><?php echo $slideshow_none[1]['content']; ?></p>
            <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
              <a href="<?php echo $slideshow_none[1]['link']; ?>" class="btn-get-started">Tìm hiểu thêm <i class="bi bi-arrow-right"></i></a>

            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="<?php echo get_media('images', $slideshow_none[0]['image'], 'no-image.png'); ?>" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section>
    <!-- /Hero Section -->
  <?php endif; ?>

  <!-- About Section -->
  <?php if (isset($projects_comingup) && is_array($projects_comingup) && !empty($projects_comingup)): ?>
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up">
        <?php foreach ($projects_comingup as $key => $value): ?>
          <div class="row gx-0">
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h3>Sự kiện sắp diễn ra</h3>
                <h2><?php echo $value['name']; ?></h2>
                <p>
                  <?php echo $value['hometext']; ?>
                </p>
                <div class="text-center text-lg-start">
                  <a href="#"
                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>Tham gia ngay</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <img src=" <?php echo get_media('projects', $value['image'], 'no-image.png') ?> " class="img-fluid" alt="<?php echo $value['name']; ?>">
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </section>
  <?php endif; ?>
  <!-- /About Section -->

  <!-- Stats Section -->
  <section id="stats" class="stats section">


    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0 text-center">Còn lại</h4>
            </div>
            <div class="card-body">
              <div class="row text-center">
                <div class="col-3">
                  <h3 id="days" class="display-4">00</h3>
                  <p>Days</p>
                </div>
                <div class="col-3">
                  <h3 id="hours" class="display-4">00</h3>
                  <p>Hours</p>
                </div>
                <div class="col-3">
                  <h3 id="minutes" class="display-4">00</h3>
                  <p>Minutes</p>
                </div>
                <div class="col-3">
                  <h3 id="seconds" class="display-4">00</h3>
                  <p>Seconds</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Parse the date from database (format: dd/mm/yyyy)
      const eventDateStr = "<?php echo isset($projects_comingup[0]['time']) ? $projects_comingup[0]['time'] : '12/5/2025'; ?>";
      const [day, month, year] = eventDateStr.split('/');
      
      // Create a Date object (months are 0-indexed in JavaScript)
      const eventDate = new Date(year, month - 1, day);
      
      // Update the countdown every 1 second
      const x = setInterval(function() {
          // Get current date and time
          const now = new Date().getTime();
          
          // Calculate distance between now and event date
          const distance = eventDate - now;
          
          // Time calculations
          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
          // Display results
          document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
          document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
          document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
          document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');
          
          // If countdown is over
          if (distance < 0) {
              clearInterval(x);
              document.getElementById("days").innerHTML = "00";
              document.getElementById("hours").innerHTML = "00";
              document.getElementById("minutes").innerHTML = "00";
              document.getElementById("seconds").innerHTML = "00";
          }
      }, 1000);
    </script>

  </section><!-- /Stats Section -->

  <!-- Event Posts Section -->
  <?php if (isset($posts_project) && is_array($posts_project) && !empty($posts_project)) { ?>
    <section id="recent-posts" class="recent-posts section">


      <div class="container">

        <div class="row gy-5">
          <?php foreach ($posts_project as $key => $value) {
            $data_id = $value['id'];
            $data_title = word_limiter($value['title'], 15);
            $data_hometext = word_limiter($value['hometext'], 15);
            $data_link = site_url($value['cat_alias'] . '/' . $value['alias'] . '-' . $data_id);
            $data_image = array(
              'src' => get_media('posts', $value['homeimgfile'], 'no-image-thumb.png', '636x270x1'),
              'alt' => $value['homeimgfile']
            );
            $data_created_at = format_date_1($value['addtime']);
            $data_author = $value['full_name'];
            $data_category_name = $value['categories']['name'];
          ?>
            <div class="col-xl-6 col-md-6">
              <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                <div class="post-img position-relative overflow-hidden">
                  <img src="<?php echo $data_image['src']; ?>" class="img-fluid" alt="<?php echo $data_image['alt']; ?>">
                  <span class="post-date"><?php echo $data_created_at; ?></span>
                </div>

                <div class="post-content d-flex flex-column">

                  <h3 class="post-title"><?php echo $data_title; ?></h3>

                  <div class="meta d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-person"></i> <span class="ps-2"><?php echo $data_author; ?></span>
                    </div>
                    <span class="px-3 text-black-50">/</span>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-folder2"></i> <span class="ps-2"><?php echo $data_category_name; ?></span>
                    </div>
                  </div>

                  <hr>

                  <a href="<?php echo $data_link; ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                </div>

              </div>
            </div><!-- End post item -->
          <?php } ?>

        </div>

      </div>

    </section>
  <?php } ?>
  <!-- /Events Posts Section -->

  <!-- Values Section -->
  <?php if (isset($posts_activity) && is_array($posts_activity) && !empty($posts_activity)) { ?>
    <section id="values" class="values section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <!--<h2>Our Values</h2>-->
        <p>Tổ chức sự kiện thể thao chuyên nghiệp<br></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <?php foreach ($posts_activity as $key => $value) {
            $data_id = $value['id'];
            $data_title = word_limiter($value['title'], 15);
            $data_hometext = word_limiter($value['hometext'], 15);
            $data_link = site_url($value['cat_alias'] . '/' . $value['alias'] . '-' . $data_id);
            $data_image = array(
              'src' => get_media('posts', $value['homeimgfile'], 'no-image-thumb.png', '392x255x1'),
              'alt' => $value['homeimgfile']
            );
          ?>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                <img src="<?php echo $data_image['src']; ?>" class="img-fluid" alt="<?php echo $data_image['alt']; ?>">
                <h3><?php echo $data_title; ?></h3>
                <p><?php echo $data_hometext; ?></p>
              </div>
            </div><!-- End Card Item -->
          <?php } ?>

        </div>

      </div>

    </section>
  <?php } ?>
  <!-- /Values Section -->


  <?php if (isset($info_why_choose_us_none) && is_array($info_why_choose_us_none) && !empty($info_why_choose_us_none)) {
    $attributes = isset($info_why_choose_us_none['attributes']) ? @unserialize($info_why_choose_us_none['attributes']) : null;
  ?>
    <!-- Feature Details Section -->
    <section id="feature-details" class="feature-details section">
      <div class="container section-title" data-aos="fade-up">
        <!--<h2>Features</h2>-->
        <p>Quy trình tổ chức<br></p>
      </div><!-- End Section Title -->
      <div class="container">
        <?php if (is_array($attributes) && !empty($attributes)) { ?>
          <?php foreach ($attributes as $key => $value) { ?>
            <div class="row gy-4 align-items-center features-item">
              <!-- Hình phải nội dung trái -->
              <?php if ($key % 2 == 0) { ?>
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                  <img src="<?php echo get_media('info', $value['image'], 'no-image.png'); ?>" alt="">
                </div>
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                  <h3><?php echo $value['label']; ?></h3>

                  <p><?php echo $value['content']; ?></p>
                </div>
                <!-- Hình trái nội dung phải -->
              <?php
              } else { ?>
                <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                  <img src="<?php echo get_media('info', $value['image'], 'no-image.png'); ?>" alt="">
                </div>
                <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="100">
                  <h3><?php echo $value['label']; ?></h3>

                  <p><?php echo $value['content']; ?></p>
                </div>
              <?php } ?>
            </div><!-- Features Item -->
          <?php } ?>
        <?php } ?>
      </div>

    </section>
    <!-- /Feature Details Section -->
  <?php } ?>




  <?php if (isset($info_customer_experience_none) && is_array($info_customer_experience_none) && !empty($info_customer_experience_none)) { ?>
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Nhận xét</h2>
        <p>Khách hàng nói về chúng tôi<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <?php foreach ($info_customer_experience_none as $value) {
              $attributes = isset($value['attributes']) ? @unserialize($value['attributes']) : null;
            ?>
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <?php echo $attributes[0]['content']; ?>
                  </p>
                  <div class="profile mt-auto">
                    <img src="<?php echo get_media('users', 'no-avatar.jpg'); ?>"
                      class="testimonial-img" alt="">
                    <h3><?php echo $value['title']; ?></h3>
                    <h4><?php echo isset($attributes[0]['label']) ? $attributes[0]['label'] : ''; ?></h4>
                  </div>
                </div>
              </div><!-- End testimonial item -->
            <?php } ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section>
  <?php } ?>
  <!-- /Testimonials Section -->


  <?php if (isset($partner_none) && is_array($partner_none) && !empty($partner_none)) { ?>
    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Đối tác</h2>
        <p>Những đối tác của chúng tôi<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>

          <div class="swiper-wrapper align-items-center">
            <?php foreach ($partner_none as $value) { ?>
              <div class="swiper-slide">
                <img src="<?php echo get_media('images', $value['image'], 'no-image.png'); ?>" class="img-fluid" alt="">
              </div>
            <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Clients Section -->
  <?php } ?>

  <?php if (isset($posts_news) && is_array($posts_news) && !empty($posts_news)) { ?>
    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tin tức</h2>
        <p>Tin mới nhất về các sự kiện</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <?php foreach ($posts_news as $key => $value) {
            $data_id = $value['id'];
            $data_title = word_limiter($value['title'], 15);
            $data_hometext = word_limiter($value['hometext'], 15);
            $data_link = site_url($value['cat_alias'] . '/' . $value['alias'] . '-' . $data_id);
            $data_image = array(
              'src' => get_media('posts', $value['homeimgfile'], 'no-image-thumb.png', '636x270x1'),
              'alt' => $value['homeimgfile']
            );
            $data_created_at = format_date_1($value['addtime']);
            $data_author = $value['full_name'];
            $data_category_name = $value['categories']['name'];
          ?>
            <div class="col-xl-4 col-md-6">
              <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="<?php echo ($key + 1) * 100; ?>">

                <div class="post-img position-relative overflow-hidden">
                  <img src="<?php echo $data_image['src']; ?>" class="img-fluid" alt="<?php echo $data_image['alt']; ?>">
                  <span class="post-date"><?php echo $data_created_at; ?></span>
                </div>

                <div class="post-content d-flex flex-column">

                  <h3 class="post-title"><?php echo $data_title; ?></h3>

                  <div class="meta d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-person"></i> <span class="ps-2"><?php echo $data_author; ?></span>
                    </div>
                    <span class="px-3 text-black-50">/</span>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-folder2"></i> <span class="ps-2"><?php echo $data_category_name; ?></span>
                    </div>
                  </div>

                  <hr>

                  <a href="<?php echo $data_link; ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                </div>

              </div>
            </div>
          <?php } ?>

        </div>

      </div>

    </section><!-- /Recent Posts Section -->
  <?php } ?>
</main>