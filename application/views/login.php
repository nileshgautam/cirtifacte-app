<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate App</title>

  <!-- FAVICON -->
  <link rel="icon" href="<?php echo base_url('icons/favicon.ico') ?>" type="image/ico">

  <!-- FONTAWESOME CSS -->
  <!-- <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css') ?>"> -->
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/index.css') ?>">
  <!-- JQUERY -->
  <!-- <script src="<?php echo base_url('js/helper/jquery.min.js') ?>"></script> -->
  <!-- D3 JS SCRIPT -->
  <!-- <script src="<?php echo base_url('js/main.js') ?>" type="module" defer></script> -->
  <!-- Ajax library -->
  <!-- <script src="<?php echo base_url('js/MyScriptLibrary.js') ?>"></script> -->
  <!-- Notify library -->
  <!-- <script src="<?php echo base_url('js/bootstrap-notify.min.js') ?>"></script> -->
  <!-- Latest compiled and minified CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<script>
  let BASEURL='<?php echo base_url()?>';
</script>

<body style="background-color: #3a3b3c;">
  <section class="--login-page">
    
  <div class="logo-box">
      <!-- <img class="logo" src="<?php echo base_url('assets/logo/logo2.svg') ?>" alt="logo"> -->
      <h1 class="text-white">Certificate App</h1>
    </div>

    <div class="login-box">
      <form method="post" id="login-form">
        <div class="form" id="form">
        <label for="error" id="error" class="text-danger"></label>
          <div class="field email">
            <div class="icon"></div>
            <input class="input" id="email" type="email" placeholder="Email" name="email" autocomplete="off" required />
          </div>
          <div class="field password">
            <div class="icon"></div>
            <input class="input" id="password" type="password" name="password" autocomplete="off" placeholder="Password" required />
          </div>
          <small>
            <input type="checkbox" name="remember_me" id="remember_me">
            <span>Remember me</span>
          </small>
          <input type="submit" class="button" value="LOGIN">
          <div class="side-top-bottom"></div>
          <div class="side-left-right"></div>
          <small>Fill in the form</small>
        </div>
      </form>
    </div>
  </section>

  <?php if (!empty($this->session->flashdata('error'))) { ?>
    <script>
      let error = '<?php echo $this->session->flashdata('error'); ?>';
      showAlert(error, 'danger');
    </script>
  <?php } ?>
  <script src="<?php echo base_url('assets/js/verifyusers.js') ?>"></script>
</body>

</html>