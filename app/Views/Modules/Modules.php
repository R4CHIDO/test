<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>







<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Modules</h4>
      <p class="card-description">
        thes are All <code>the modules</code>
      </p>
<div class="d-flex flex-row justify-content-between">
  <div>
<a href= "<?= site_url("Modules/newModuleForm") ?>" type="button" class="btn btn-dark">Add new module</a>
</div>      
<div class="form-group">
        <div class="input-group">
          <input type="text" id="search" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
          <div class="input-group-append">
            <button class="btn btn-sm btn-primary" type="button">Search</button>
          </div>
        </div>
      </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover  muTable">
          <thead>
            <tr>
              <th>Module name</th>
              <th>MH</th>
              <th>Filiere</th>
              <th>Teacher</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($modules as $module) :  ?>
              <tr>
                <td><?= $module->module_label ?></td>
                <td><label class="badge badge-danger"><?= $module->MH . ' hour ' ?></label></td>
                <td><?= $module->filiere_label ?></td>
                <td><?= $module->first_name . " " . $module->last_name ?></td>
             
                <td>
                  <a href="<?= site_url('Modules/deleteModule/' . $module->module_id ) ?>"  class="badge btn badge-danger">   <i class="ti-trash"></i></a>
                  <a href="<?= site_url('Modules/editModuleForm/' . $module->module_id ) ?>"  class="badge btn badge-warning">   <i class="ti-pencil"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
  $(document).ready(function() {
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("muTable tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<?php $this->endsection(); ?>