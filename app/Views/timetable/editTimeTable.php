<?php $this->extend("Layout"); ?>


<?php $this->section("content"); ?>


<div class="col-12 grid-margin stretch-card">
 <div class="card">
  <div class="card-body">
   <h4 class="card-title">Edit Time Table</h4>
   <p class="card-description">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque adipisci ullam consequatur enim, explicabo eveniet eos ex quasi magnam facilis! </p>
   <?= form_open_multipart("TimeTables/editTimeTable/" . $timeTable->emploi_id ) ?>
   
   
   
   
   
   
   <div class="form-group">
    <div class="mb-3">
     <label for="formFile" class="form-label">Upload the time table for <span><?= $timeTable->group_label ?> </span></label>
     <input type="file" style="height: 40px;" name="emploi_url" id="formFile" placeholder="imageurl" class="form-control" rows="3" />
    </div>
   </div>
   

   <button type="submit" class="btn btn-dark me-2">Update</button>
   <button class="btn btn-light">Cancel</button>
   <?= form_close() ?>
  </div>
 </div>
</div>



<?php $this->endsection(); ?>