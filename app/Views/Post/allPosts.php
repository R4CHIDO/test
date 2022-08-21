<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>


<div class="row">
  <div class="col-sm-12">
    <div class="home-tab">
    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
          </li>
        </ul>
        <div>
          <div class="btn-wrapper">
            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
            <a href="<?= site_url('TimeTables/newTimeTableForm') ?>" class="btn btn-primary text-white me-0"><i class="icon-download"></i> add </a>
          </div>
        </div>
      </div>

<?php foreach ($posts as $post) :  ?>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $post->first_name . " " . $post->last_name   . "  " ?> <button type="button" class="btn btn-light btn-rounded btn-fw btn-sm"><?= $post->user_cat_label ?> </button></h4>

        <p class="card-description">
          <?= $post->post_type_label ?> Posted <code><?= $post->created_at ?></code>
        </p>
        <p>
          <?= $post->post_title . " " ?> <a href=<?= site_url("Posts/viewPost/") . $post->post_id . " " ?>  class="">  More</a>
          
        </p>
      </div>
    </div>
  </div>
  
  <?php endforeach; ?>
</div>
</div>
</div>
<?php $this->endsection(); ?>