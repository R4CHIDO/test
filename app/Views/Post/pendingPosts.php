<?php $this->extend("Layout"); ?>
<?php $this->section("content"); ?>

<?php foreach ($posts as $post) :  ?>

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><?= $post->first_name . " " . $post->last_name   . "  " ?> <button type="button" class="btn btn-light btn-rounded btn-fw btn-sm"><?= $post->user_cat_label ?> </button></h4>

      <p class="card-description">
        <?= $post->post_type_label ?> Posted <code><?= $post->created_at ?></code>
      </p>
      <p>
        <?= $post->post_title ?><a href=<?= site_url("Posts/viewPost/") . $post->post_id ?> type="button" class="btn btn-link">More</a>
        <a href="<?= site_url("Posts/acceptPost/" . $post->post_id) ?>" type="button" class="btn btn-sm btn-success btn-rounded btn-fw">Accept</a>
        <a   href="<?= site_url("Posts/removePost/" . $post->post_id) ?>" type="button" class="btn btn-sm btn-danger btn-rounded btn-fw">Remove</a>
      </p>
    </div>
  </div>
</div>

<?php endforeach; ?>

<?php $this->endsection(); ?>