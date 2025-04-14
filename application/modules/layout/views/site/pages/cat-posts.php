<main class="main">

  <!-- Page Title -->
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <?php $projects_comingup = modules::run('projects/get_projects', array('inhome' => 1)); ?>
          <img src="<?php echo base_url(get_module_path('projects') . $projects_comingup[0]['image']); ?>" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
    <?php $this->load->view('breadcrumb'); ?>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row">

      <div class="col-lg-8">

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">
          <div class="container">
            <div class="row gy-4">
              <?php echo isset($post_list) ? $post_list : ''; ?>
            </div><!-- End blog posts list -->
          </div>
        </section><!-- /Blog Posts Section -->

        <!-- Blog Pagination Section -->
        <?php if (isset($pagination) && !empty($pagination)) { ?>
          <!-- Blog Pagination Section -->
          <section id="blog-pagination" class="blog-pagination section">

            <div class="container">
              <div class="d-flex justify-content-center">
                <?php echo $pagination; ?>
              </div>
            </div>

          </section>
          <!-- /Blog Pagination Section -->
        <?php } ?>

      </div>

      <div class="col-lg-4 sidebar">

        <?php echo isset($post_sidebar) ? $post_sidebar : ''; ?>

      </div>

    </div>
  </div>

</main>