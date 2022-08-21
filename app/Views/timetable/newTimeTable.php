<?php $this->extend("Layout"); ?>


<?php $this->section("content"); ?>


<div class="col-12 grid-margin stretch-card">
 <div class="card">
  <div class="card-body">
   <h4 class="card-title">Create new Post</h4>
   <p class="card-description">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque adipisci ullam consequatur enim, explicabo eveniet eos ex quasi magnam facilis! </p>
   <?= form_open_multipart("TimeTables/addTimeTable") ?>




   <div class="form-group">
   <label for="exampleFormControlSelect1">Select a group</label>

    <select name="group_id" style="color: black;" class="form-control" id="exampleFormControlSelect1">

     <!-- <select style="margin:0 0  30px 80px; display:none;" name="filiere_id" style="color: black;" id="exampleFormControlSelect10"> -->
     <?php foreach ($groups as $group) :  ?>
      <option value="<?php echo $group->group_id ?>">
       <?php echo $group->group_label ?>
      </option>
     <?php endforeach;  ?>

    </select>

   </div>

   <div class="form-group">
    <div class="mb-3">
     <label for="formFile" class="form-label">Upload the time table </label>
     <input type="file" name="emploi_url" id="formFile" placeholder="imageurl" class="form-control" rows="3" />
    </div>
   </div>


   <button type="submit" class="btn btn-dark me-2">Add</button>
   <button class="btn btn-light">Cancel</button>
   <?= form_close() ?>
  </div>
 </div>
</div>



<?php $this->endsection(); ?>