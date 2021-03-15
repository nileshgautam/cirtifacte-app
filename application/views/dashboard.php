<div class="container-fluid py-2">
  <div class="card">
    <div class="card-header">
      <span>Certificate List</span>
      <a class="float-right btn btn-success" href="<?php echo base_url('ControlPanel/new_student') ?>">New</a>
    </div>
    <div class="card-body table-responsive">
      <table id="certificate-table" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Roll/Reg. No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No.</th>
            <th>Course</th>
            <th>Duration</th>
            <!-- <th>Gread</th> -->
            <th>Action</th>

          </tr>
        </thead>
        <tbody id="cirtificate-body">
          <?php
          // echo '<pre>';
          // print_r($candidate);
          if (!empty($candidate)) {
            foreach ($candidate as $item) { ?>
              <tr>
                <td><?php echo $item['roll_no']?></td>
                <td><?php echo $item['first_name']. " ".$item['last_name']?></td>
                <td><?php echo $item['email'] ?></td>
                <td><?php echo $item['contact_no']?></td>
                <td><?php echo $item['course']?></td>
                <td><?php echo $item['course_duration']?></td>
                <td><a class="btn btn-link" href="<?php echo base_url('ControlPanel/getcirtificate/').base64_encode($item['id'])?>"> View certificates </a></td>
              </tr>
          <?php }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



