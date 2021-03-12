<style>
  @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
  #cir-container {
    width: 100%;
    height: 100%;
  }
  .cir {
    height: 670px !important;
    width: 100% !important;
    border: 20px solid lightblue;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .cir-head {
    font-family: 'Lobster', cursive;
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
    margin-top: -48px;
  }

  p {
    padding: 20px;
  }

  .left {
    /* margin: 20px 0px; */
    margin-left: 50px;
    margin-top: 10%;
  }

  .right {
    /* margin: 20px 0px; */
    margin-right: 50px;
    margin-top: 10%;
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
    #cancel{
      display: none;
    }
  }
  .btn-space{
    margin: 2px;
  }
</style>


<div class="container-fluid bg-light" id="cir-container">

  <div class="cir-head ">
    <button onclick="window.print()" class="btn btn-info btn-space" id="print">Print</button>
    <a href="<?php echo base_url('dashboard')?>" class="btn btn-warning btn-space" id="cancel" >Cancel</a>

  </div>

  <div class=" cir container bg-white" id="container">
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,96L30,106.7C60,117,120,139,180,149.3C240,160,300,160,360,133.3C420,107,480,53,540,37.3C600,21,660,43,720,53.3C780,64,840,64,900,90.7C960,117,1020,171,1080,165.3C1140,160,1200,96,1260,101.3C1320,107,1380,181,1410,218.7L1440,256L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg> -->
    <div class="cir-head py-5">
      <h1 class="cir-head">CERTIFICATE</h1>
    </div>
    <div class="cir-head">

      <span class="mt-48">OF ACHIVEMENT</span>
    </div>
    <div class="candidate-name cir-head">
      <H1><?php echo $cirtificate[0]['first_name'] . " " . $cirtificate[0]['last_name'] ?></H1>
    </div>
    <div>
      <p>
        <hr class="divider">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum numquam, soluta expedita quis illum dicta! Doloribus placeat, architecto inventore distinctio aspernatur a iure eveniet quae odit libero reprehenderit explicabo molestiae!Fugiat aliquid architecto repellendus aliquam earum consequatur reprehenderit ipsa ab reiciendis ullam, obcaecati voluptates omnis molestiae eum aspernatur veritatis odio non. Tempore id sequi quos ullam. Fugit, dignissimos asperiores. Sint?
      </p>
    </div>
    <div class="signature">
      <div class="left font-weight-bold">Director
        <hr />
      </div>
      <div class="right float-right font-weight-bold">Manager
        <hr />
      </div>
    </div>
  </div>
</div>