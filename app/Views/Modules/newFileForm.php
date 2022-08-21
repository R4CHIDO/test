<?php $this->extend("Layout"); ?>


<?php $this->section("content"); ?>


<div class="col-12 grid-margin stretch-card">
 <div class="card">
  <div class="card-body">
   <h4 class="card-title">Add new File</h4>
   <p class="card-description">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque adipisci ullam consequatur enim, explicabo eveniet eos ex quasi magnam facilis! </p>
   <?= form_open_multipart("Modules/newFile/"  ) ?>



   <div class="form-group">
   <label for="exampleFormControlSelect1">Select a module</label>

    <select name="module_id" style="color: black;" class="form-control" id="exampleFormControlSelect1">

     <!-- <select style="margin:0 0  30px 80px; display:none;" name="filiere_id" style="color: black;" id="exampleFormControlSelect10"> -->
     <?php foreach ($modules as $module) :  ?>
      <option value="<?php echo $module->module_id ?>">
       <?php echo $module->module_label?>
      </option>
     <?php endforeach;  ?>

    </select>

   </div>
   <div class="form-group">
   <label for="exampleFormControlSelect1">Select a attachement type</label>

    <select name="file_type_id" style="color: black;" class="form-control" id="exampleFormControlSelect1">
     <!-- <select style="margin:0 0  30px 80px; display:none;" name="filiere_id" style="color: black;" id="exampleFormControlSelect10"> -->
     <?php foreach ($file_types as $ft) :  ?>
      <option value=<?= $ft->file_type_id ?>>
       <?php echo $ft->file_type_label?>
      </option>
     <?php endforeach;  ?>

    </select>

   </div>

   
   <div class="form-group">
    <label for="exampleInputName1">File name</label>
    <input name="file_label" type="text" class="form-control" id="exampleInputName1" placeholder="Post title">
   </div>

   <div class="form-group">
    <div class="mb-3">
     <label for="formFile" class="form-label">Upload an attachement </label>
     <input type="file" name="file_url" id="formFile" placeholder="imageurl" class="form-control" rows="3" />
    </div>
   </div>


   <button type="submit" class="btn btn-dark me-2">Add</button>
   <button class="btn btn-light">Cancel</button>
   <?= form_close() ?>
  </div>
 </div>
</div>



<?php $this->endsection(); ?>