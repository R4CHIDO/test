<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>







<div class="grid-margin stretch-card">
 <div class="card">
  <div class="card-body">
   <h4 class="card-title">Modules</h4>
   <p class="card-description">
    thes are  <code>your modules</code>
   </p>
   <div class="table-responsive">
    <table class="table table-hover">
     <thead>
      <tr>
       <th>Module name</th>
       <th>MH</th>
       <th>Teacher</th>
       <th>Filiere</th>

      </tr>
     </thead>
     <tbody>
      <?php foreach ($modules as $module) :  ?>
       <tr>
        <td><?= $module->module_label ?></td>
        <td><label class="badge badge-danger"><?= $module->MH . ' hour ' ?></label></td>
        <td><?= $module->first_name . " " . $module->last_name ?></td>
        <td><?= $module->filiere_label ?></td>
       </tr>
      <?php endforeach; ?>

     </tbody>
    </table>
   </div>
  </div>
 </div>
</div>
<?php $this->endsection(); ?>