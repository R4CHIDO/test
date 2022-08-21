<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>
<div class="card" style="margin-bottom: 20px;">
 <div class="card-body">
  <h4 class="card-title"> <?= $post->first_name . " " . $post->last_name  ?></h4>
  <p class="card-description">
   <?= $post->post_type_label ?> Posted <code><?= $post->created_at ?></code> </p>
  <h6> <?= $post->post_title ?>
  </h6>
  <a style="margin: 20px;" href="<?= site_url("Posts/displayPdf/") . $post->post_id ?>" type="button" class="btn btn-outline-danger btn-icon-text">
   <i class="ti-download btn-icon-prepend"></i>
   Download file
  </a>
  <p>
   <?= $post->post_content ?>
  </p>
 </div>
</div>
<?= form_open("Posts/addComment/" . $post->post_id) ?>
<div class="col-md-12 grid-margin stretch-card">
 <div class="card">
  <div class="card-body">
   <!-- <h6 class="card-title">Answer</h6> -->
   <div class="form-floating">
    <textarea class="form-control" name="comment_content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
    <label for="floatingTextarea2">Your answer</label>
   </div>
   <br>
   <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="submit" class="btn btn-dark">Answer</button>
   </div>
  </div>
 </div>
</div>
<?= form_close() ?>
<?php foreach ($comments as $comment) :  ?>
 <div class="col-md-12 grid-margin stretch-card">

  <div class="card" style="margin-bottom: 20px;">
   <div class="card-body">
    <h4 class="card-title"> <?= $comment->first_name . " " . $comment->last_name  ?> <code><?= $comment->created_at->humanize() ?></code> </h4>

    
    <p>
    <?= $comment->comment_content ?>
    </p>
   </div>
  </div>
 </div>
<?php endforeach; ?>



<?php $this->endsection(); ?>