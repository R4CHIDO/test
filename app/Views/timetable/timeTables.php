<?php $this->extend("Layout"); ?>


<?php $this->section("content"); ?>


<div class="row" style="margin-bottom: 20px;">
  <div class="col-sm-12">
    <div class="home-tab">











      <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">

        </ul>
        <div>
          <div class="btn-wrapper">
            <a href="<?= site_url('TimeTables/newTimeTableForm') ?>" class="btn btn-primary text-white me-0"><i class="icon-download"></i> add </a>
          </div>
        </div>
      </div>
      <div class=" row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($timeTables as $timeTable) :  ?>
          <div class="col " style="margin-bottom:20px;">
            <div class="card h-100">
              <img src=<?= site_url('timetables/' . $timeTable->emploi_url); ?> class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $timeTable->group_label; ?></h5>
                <div class="d-flex flex-row justify-content-between">
                  <button type="button" class="btn btn-sm btn-inverse-success btn-fw"><?= $timeTable->created_at->humanize(); ?></button>
                  <a href=<?= site_url("TimeTables/editTimeTableForm/" . $timeTable->emploi_id )?>   style="color: white;" type="button" class="btn btn-dark btn-sm btn-icon-text">
                    Update
                  </a>
                

                </div>
              </div>
            </div>
          </div>
        <?php endforeach;  ?>

      </div>


    </div>
  </div>
</div>












<?php $this->endsection(); ?>
<!-- Button to launch a modal -->