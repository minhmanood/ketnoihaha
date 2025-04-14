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

      <div class="col-lg-12">

        <!-- Blog Details Section -->
        <section id="blog-details" class="blog-details section">
          <div class="container">

            <article class="article">

              <?php echo isset($row) ? $row['bodyhtml'] : ''; ?>

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End meta bottom -->

            </article>

          </div>
        </section><!-- /Blog Details Section -->

      </div>
    </div>
  </div>

</main>