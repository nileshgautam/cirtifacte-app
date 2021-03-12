<div class="container-fluid py-2">
  <div class="card">
    <div class="card-header">
      <span>Certificate List</span>
      <a class="float-right btn btn-success" href="<?php echo base_url('new') ?>">New</a>
    </div>
    <div class="card-body">
      <table id="certificate-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Roll No.</th>
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
          <tr>
            <td>221404</td>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <!-- <td>$320,800</td> -->
            <td>new</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#certificate-table').DataTable();

    document.getElementById('')
    $.post(BASEURL + "ControlPanel/loadCertificate", function(data) {
      // Display the returned data in browser
      let res = JSON.parse(data)
      console.log(res);
      let html='';
      res.map(item => {
        console.log(item.role_no);
        html+=`
        <tr>
            <td>${item.roll_no}</td>
            <td>${item.first_name +' '+ item.last_name}</td>
            <td>${item.email}</td>
            <td>${item.contact_no}</td>
            <td>${item.course}</td>
            <td>${item.course_duration}</td>
            <td><a class="btn btn-link" href="${BASEURL+'ControlPanel/getcirtificate/'+btoa(item.id)}">View certificates</a></td>
          </tr>`;
      });
      document.getElementById('cirtificate-body').innerHTML=html;
      // $("#result").html(data);
    });

  });
</script>