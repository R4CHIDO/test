<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>

<div class="col-12 grid-margin stretch-card">
 <div class="card">
  <div class="card-body">
   <h4 class="card-title">Create new Post</h4>
   <p class="card-description">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque adipisci ullam consequatur enim, explicabo eveniet eos ex quasi magnam facilis! </p>
   <?= form_open_multipart("Posts/newPost") ?>

   <div class="form-group">
    <label for="exampleInputName1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Post title">
   </div>
   <div class="form-group">
    <label for="exampleInputName1">Content</label>
    <textarea class="form-control" name="post_content" placeholder="Leave a comment here" style="height: 100px"></textarea>
   </div>

   <?php if (session('user_cat_id') !== 4) : ?>

    <div class="form-group">
     <label for="exampleFormControlSelect1">Post type</label>
     <select name="post_type_id" style="color: black;" class="form-control" id="exampleFormControlSelect1">
      <?php foreach ($Post_types as $pp) :  ?>
       <option value="<?php echo $pp->post_type_id ?>">
        <?php echo $pp->post_type_label ?>
       </option>
      <?php endforeach;  ?>
     </select>
    </div>
   <?php endif;  ?>



   <div class="form-group">
    <div class="mb-3">
     <label for="formFile" class="form-label">Import attachment</label>
     <input type="file" name="attachement_url" id="formFile" placeholder="imageurl" class="form-control" rows="3" />
    </div>
   </div>

   <div class="form-group">
    <label for="formFile" class="form-label">Destination</label>
    <div style="margin:0 0  0px 30px;" class="form-check">
     <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" >
     <label class="form-check-label" for="flexRadioDefault1">
      Global
     </label>
    </div>
    <div style="margin:0 0  0px 30px;" class="form-check">
     <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
     <label class="form-check-label" for="flexRadioDefault2">
      Specified groups
     </label>
     <select name="filiere_id" class="form-control" id="exampleFormControlSelect10">

      <!-- <select style="margin:0 0  30px 80px; display:none;" name="filiere_id" style="color: black;" id="exampleFormControlSelect10"> -->
      <option value="0">None</option>
      <?php foreach ($filieres as $f) :  ?>
       <option value="<?php echo $f->filiere_id ?>">
        <?php echo $f->filiere_label ?>
       </option>
      <?php endforeach;  ?>
     </select>

    </div>
   </div>

   <button type="submit" class="btn btn-dark me-2">Submit</button>
   <button class="btn btn-light">Cancel</button>
   <?= form_close() ?>
  </div>
 </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function() {
  $("#flexRadioDefault2").change(function() {
   $("#exampleFormControlSelect10").css("display", "inline");
  });
  $("#flexRadioDefault1").change(function() {
   $("#exampleFormControlSelect10").css("display", "none");
  });
 });
</script>
<?php $this->endsection(); ?>