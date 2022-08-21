<?php $this->extend("Layout"); ?>


<?php $this->section("content"); ?>
<div class="row d-flex align-center" width="100%">
 <div class="col-12 grid-margin">
  <div class="card">
   <div class="card-body">
    <h4 class="card-title">Horizontal Two column</h4>
    <form class="form-sample">
     <p class="card-description">
      Personal info
     </p>
     <div class="row">
      <div class="col-md-6">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
         <input type="text" class="form-control">
        </div>
       </div>
      </div>
      <div class="col-md-6">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
         <input type="text" class="form-control">
        </div>
       </div>
      </div>
     </div>
     <div class="row">
      <div class="col-md-6">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
         <select class="form-control">
          <option>Male</option>
          <option>Female</option>
         </select>
        </div>
       </div>
      </div>
      <div class="col-md-6">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-9">
         <input class="form-control" placeholder="dd/mm/yyyy">
        </div>
       </div>
      </div>
     </div>
     <div class="row">

      <div class="col-md-6">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Membership</label>
        <div class="col-sm-4">
         <div class="form-check">
          <label class="form-check-label">
           <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked="">
           Free
           <i class="input-helper"></i></label>
         </div>
        </div>
        <div class="col-sm-5">
         <div class="form-check">
          <label class="form-check-label">
           <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
           Professional
           <i class="input-helper"></i></label>
         </div>
        </div>
       </div>
      </div>
     </div>
     <p class="card-description">
      Address
     </p>
     <div class="row">
      <div class="col-md-6">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Address 1</label>
        <div class="col-sm-9">
         <input type="text" class="form-control">
        </div>
       </div>
      </div>

      <div class="col-md-6">
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-9">
         <input class="form-control" placeholder="dd/mm/yyyy">
        </div>
       </div>
      </div>
     </div>


    </form>
   </div>
  </div>
 </div>
</div>

<?php $this->endsection(); ?>