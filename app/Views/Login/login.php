<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>School Community</title>
  <!-- base:css -->
  <link rel="stylesheet" href=<?= site_url('auth/vendors/mdi/css/materialdesignicons.min.css') ?>>
  <link rel="stylesheet" href=<?= site_url('auth/vendors/css/vendor.bundle.base.css') ?>>
  <link rel="stylesheet" href=<?= site_url('auth/css/style.css') ?>>
  <link rel="stylesheet" href=<?= site_url('auth/images/favicon.png') ?>>


</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <?php if (session()->has("warning")) : ?>
                <div class="alert alert-warning" role="alert">
                  <?= session("warning") ?>
                </div>
              <?php endif; ?>
              <?php if (session()->has("error")) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= session("error") ?>
                </div>
              <?php endif; ?>

              <div class="brand-logo">
                <img src=<?= site_url("images/community.jfif") ?> alt="logo">
              </div>
              <h4>Welcome back!</h4>
              <!-- <h6 class="font-weight-light">Happy to see you again!</h6> -->
              <form class="pt-3" action=<?= site_url('Login/signin') ?> method="POST">
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="email" type="email" class="form-control form-control-lg border-left-0" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                  </div>
                </div>

                <div style="background-color: #1F3BB3;" class="my-3">
                  <input type="submit" style="background-color: #1F3BB3;" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Login">
                </div>
                <!-- <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href=<?= site_url('Login/Register') ?> class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- for errors -->

  <!-- container-scroller -->
  <!-- base:js -->
  <script src=<?= site_url('auth/vendors/js/vendor.bundle.base.js') ?>></script>
  <script src=<?= site_url('auth/js/off-canvas.js') ?>></script>
  <script src=<?= site_url('auth/js/hoverable-collapse.js') ?>></script>
  <script src=<?= site_url('auth/js/template.js') ?>></script>
  <!-- endinject -->
  <!-- inject:js -->

  <!-- endinject -->
</body>

</html>