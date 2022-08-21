<?php $this->extend("Layout"); ?>


<?php $this->section("content"); ?>


<div class="card shadow mb-4  mycard">
 <!-- Card Header - Dropdown -->
 <small style="margin: 20px;" class="text-muted">
  My time table
 </small>
 <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col" style="margin-bottom:20px;">
   <div class="card h-100">
    <img src=<?=  site_url('timetables/' . $mine->emploi_url); ?> class="card-img-top" alt="...">
    <div class="card-body">
     <h5 class="card-title"><?= $mine->group_label; ?></h5>
     <button type="button" class="btn btn-sm btn-inverse-success btn-fw"><?= $mine->created_at->humanize(); ?></button>

    </div>

   </div>
  </div>

 </div>
</div>


<div class="card shadow mb-4  mycard">

 <small style="margin: 20px;" class="text-muted">
  Others
 </small>


 <div class=" row row-cols-1 row-cols-md-3 g-4">
  <?php foreach ($timeTables as $timeTable) :  ?>
   <div class="col " style="margin-bottom:20px;">
    <div class="card h-100">
     <img src=<?= site_url('timetables/' . $timeTable->emploi_url); ?> class="card-img-top" alt="...">
     <div class="card-body">
      <h5 class="card-title"><?= $timeTable->group_label; ?></h5>

      <button type="button" class="btn btn-sm btn-inverse-success btn-fw"><?= $timeTable->created_at->humanize(); ?></button>

     </div>
    </div>
   </div>
  <?php endforeach;  ?>

 </div>

 <!-- Card Body -->


 <?php $this->endsection(); ?>
 <!-- Button to launch a modal -->