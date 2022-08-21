<?php $this->extend("Layout"); ?>


<?php $this->section("content"); ?>


<div class="col-12 grid-margin stretch-card">
 <div class="card">
  <div class="card-body">
   <h4 class="card-title">Add new Module</h4>
   <p class="card-description">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque adipisci ullam consequatur enim, explicabo eveniet eos ex quasi magnam facilis! </p>
   <?= form_open("Modules/newModule") ?>


   <div class="form-group">
    <label for="exampleInputName1">Module label</label>
    <input name="module_label" type="text" class="form-control" id="exampleInputName1" placeholder="Module label">
   </div>
   <div class="form-group">
    <label for="exampleInputName1">Masse Horaire</label>
    <input name="MH" type="number" class="form-control" id="exampleInputName1" placeholder="Masse horaire">
   </div>

   <div class="form-group">
   <label for="exampleFormControlSelect1">Select a filiere</label>

    <select name="filiere_id" style="color: black;" class="form-control" id="exampleFormControlSelect1">

     <!-- <select style="margin:0 0  30px 80px; display:none;" name="filiere_id" style="color: black;" id="exampleFormControlSelect10"> -->
     <?php foreach ($filieres as $filiere) :  ?>
      <option value="<?php echo $filiere->filiere_id ?>"  >
       <?php echo $filiere->filiere_label ?>
      </option>
     <?php endforeach;  ?>

    </select>

   </div>
   <div class="form-group">
   <label for="exampleFormControlSelect1">Select a teacher</label>

    <select name="user_id" style="color: black;" class="form-control" id="exampleFormControlSelect1">

     <!-- <select style="margin:0 0  30px 80px; display:none;" name="filiere_id" style="color: black;" id="exampleFormControlSelect10"> -->
     <?php foreach ($teachers as $t) :  ?>
      <option value="<?php echo $t->user_id ?>">
       <?php echo $t->first_name  . " " . $t->last_name ?>
      </option>
     <?php endforeach;  ?>

    </select>

   </div>

 


   <button type="submit" class="btn btn-dark me-2">Add</button>
   <button class="btn btn-light">Cancel</button>
   <?= form_close() ?>
  </div>
 </div>
</div>



<?php $this->endsection(); ?>