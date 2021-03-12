<style>
  /* @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap'); */
  @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merienda+One&family=Sacramento&display=swap');


  /* font-family: 'Great Vibes', cursive; */
  /* font-family: 'Merienda One', cursive;
font-family: 'Sacramento', cursive */
  #cir-container {
    width: 100%;
    height: 100%;
  }

  #cirtificate-container {
    background-color: #fff;
  }

  .btn-head {
    display: flex;
    justify-content: center;
    justify-items: center;
  }

  .cir {
    height: 670px !important;
    width: 100% !important;
    border: 20px dotted lightblue;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .cir-head {
    font-family: 'Merienda One', cursive;
    /* font-family: 'Great Vibes', cursive; */

    display: flex;
    justify-content: center;
    margin: auto;
    justify-items: center;
  }

  .signature {
    display: flex;
    justify-content: space-between;
    text-justify: auto;
  }

  .mt-48 {
    margin-top: -30px;
  }

  p {
    font-family: 'Merienda One', cursive;
    padding: 20px;
  }

  .left {
    /* margin: 20px 0px; */
    margin-left: 50px;
    margin-top: 4%;
  }

  .right {
    /* margin: 20px 0px; */
    margin-right: 50px;
    margin-top: 4%;
    float: right;
  }

  #cir-container::before {
    content: "";
    background-color: yellow;
    color: red;
    font-weight: bold;
  }

  @media print {
    p.bodyText {
      font-family: georgia, times, serif;
    }

    #print {
      display: none;
    }

    #cancel {
      display: none;
    }
  }

  .btn-space {
    margin: 2px;
  }

  .candidate-name {
    display: flex;
    justify-content: center;
    margin: auto;
    font-family: 'Great Vibes', cursive;
    font-size: 14px;
  }

  .course-content {
    /* font-family: 'Great Vibes', cursive; */
    font-family: 'Merienda One', cursive;

    display: flex;
    justify-content: space-evenly;
  }

  .signature {
    font-family: 'Merienda One', cursive;
    font-size: 14px;
  }

  .logo {
    display: inline-block;
    padding: 10px;
  }
</style>


<div class="container-fluid bg-light" id="cir-container">

  <div class="btn-head">
    <button onclick="window.print()" class="btn btn-info btn-space" id="print">Print</button>
    <a href="<?php echo base_url('dashboard') ?>" class="btn btn-warning btn-space" id="cancel">Cancel</a>

  </div>

  <div class=" cir container" id="cirtificate-container">

    <div class="logo">
      <img src="<?php echo base_url('assets/signature/logo.png') ?>" alt="logo" height="47">
    </div>

    <?php
    // echo '<pre>';

    // print_r($cirtificate);



    ?>


    <div class="cir-head py-5">
      <h1 class="cir-head">CERTIFICATE</h1>
    </div>
    <div class="cir-head">
      <span class="mt-48">OF ACHIVEMENT</span>
    </div>
    <div class="candidate-name">
      <H1><?php echo $cirtificate[0]['first_name'] . " " . $cirtificate[0]['last_name'] ?></H1>
    </div>
    <div class="course-content">
      <span>Reg. No: <?php echo $cirtificate[0]['roll_no'] ?></span>
      <span>Course: <?php echo $cirtificate[0]['course'] ?></span>
      <span class="">Duration: <?php echo $cirtificate[0]['course_duration'] ?></span>
    </div>
    <div>
      <hr class="divider">
      <p class="text-center">
        <?php
        echo $cirtificate[0]['certificate_text'] != '' ? $cirtificate[0]['certificate_text'] : 'For Successfully completing proper ' . $cirtificate[0]['course'] . ' training program.';
        ?>
      </p>
    </div>
    <div class="signature">
      <div class="left font-weight-bold">Director
        <div><?php echo ($cirtificate[0]['director_name'] != '') ? $cirtificate[0]['director_name'] : 'Amit Gupta' ?></div>
        <img src="<?php echo  ($cirtificate[0]['director_signature'] != '') ? base_url().$cirtificate[0]['director_signature'] : base_url('assets/signature/signature.png') ?>" alt="Director" height="50" width="160">
        <hr />
        <div>Signature</div>
      </div>
      <div class="right float-right font-weight-bold">
        Manager
        <div for="">
        <?php echo ($cirtificate[0]['manager_name'] != '') ? $cirtificate[0]['manager_name'] : 'Amit Gupta' ?></div>
        <img src="<?php echo ($cirtificate[0]['manager_signature'] != '') ? base_url().$cirtificate[0]['manager_signature'] : base_url('assets/signature/signature.png') ?>" alt="manager" height="50" width="160">
        <hr />
        <div for="">Signature</div>

      </div>
    </div>
  </div>
</div>