<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Add new member</h4>
    <form class="form-sample" action=<?= site_url('Users/addMember') ?> method="POST">
      <p class="card-description">
        Personal info
      </p>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">First Name</label>
            <div class="col-sm-9">
              <input name="first_name" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Last Name</label>
            <div class="col-sm-9">
              <input name="last_name" type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-4">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="male" checked="">
                  Male
                  <i class="input-helper"></i></label>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" id="membershipRadios2" value="female">
                  Female
                  <i class="input-helper"></i></label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Date of Birth</label>
            <div class="col-sm-9">
              <input name="birth_date" class="form-control" placeholder="dd/mm/yyyy">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
              <input name="adress" type="text" class="form-control" placeholder="Ex: Rue Al Adarissa">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
            <div class="col-sm-9">
              <input name="tel" type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
            </div>
          </div>
        </div>



      </div>
      <p class="card-description">
        Account Details
      </p>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input name="email"  type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input name="password" type="password" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Member type</label>
            <div class="col-sm-9">
              <select name="user_cat_id" class="form-control" onchange="showDiv('groups-select-div', this)">
                <option value="1">Admin</option>
                <option value="2">Moderator</option>
                <option value="3">Teacher</option>
                <option value="4">Student</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6" id="groups-select-div" style="display: none">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Group</label>
            <div class="col-sm-9">
              <select name="group_id" class="form-control" id="groups-select">
                <option value="0">
                    Select a group
                  </option>
                <?php foreach ($groups as $group) :  ?>
                  <option value="<?php echo $group->group_id ?>">
                    <?php echo $group->group_label ?>
                  </option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">City</label>
            <div class="col-sm-9">
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Country</label>
            <div class="col-sm-9">
              <select class="form-control">
                <option>America</option>
                <option>Italy</option>
                <option>Russia</option>
                <option>Britain</option>
              </select>
            </div>
          </div>
        </div> -->
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
    function showDiv(divId, element) {
      document.getElementById("groups-select").value = 0;
      document.getElementById(divId).style.display = element.value == 4 ? 'block' : 'none';
    }
    // $(document).ready(function() {
    //   $("select").change(function() {
    //     $(this).find("option:selected").each(function() {
    //       var optionValue = $(this).attr("value");
    //       if (optionValue) {
    //         $(".box").not("." + optionValue).hide();
    //         $("." + optionValue).show();
    //       } else {
    //         $(".box").hide();
    //       }
    //     });
    //   }).change();
    // });
  </script>

<?php $this->endsection(); ?>