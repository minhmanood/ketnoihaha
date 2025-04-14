<?php if (isset($breadcrumbs) && is_array($breadcrumbs) && !empty($breadcrumbs)) { ?>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <?php
        $end_breadcrumbs = count($breadcrumbs);
        $start_breadcrumbs = 0;
        foreach ($breadcrumbs as $breadcrumb) {
          $class_active = '';
          $start_breadcrumbs++;
          $name = strtolower($breadcrumb['name']);
          if ($start_breadcrumbs === $end_breadcrumbs) {
            echo  "<li>" . ucfirst($name) . "</li>";
          } else {
            echo "<li><a href='" . $breadcrumb['url'] . "'>" . ucfirst($name) . "</a></li>";
          }
        }
        ?>
      </ol>
    </div>
  </nav>
<?php } ?>