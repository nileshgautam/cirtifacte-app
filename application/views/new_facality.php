<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .btn-submit {
        display: flex;
        justify-content: center;
        justify-items: center;
        margin: auto;
    }

    .btn-space {
        margin: 2px;
    }

    .gender {
        display: flex;
        justify-content: space-evenly;
        margin: auto;
    }
</style>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="container dashboard-content py-2">
    <div class="card">
        <div class="card-header">
            <?php echo (isset($user)) ? 'Edit Student' : ' New Student' ?>
            <div class="float-right" id="msg"></div>
        </div>
        <div class="card-body">
            <form id="student-form" method="post">
                <div class="row container">
                    <div class="form-group col-md-6">
                        <label for="director">Name
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="director" type="text" name="director" placeholder="Enter director name" autocomplete="off" class="form-control date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="director-signature">Signature
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="director-signature" type="file" name="director-signature" placeholder="." autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="manger"> Selet Designation
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                   <select name="" id="">
                   
                   </select>

                    </div>
               

                </div>
                <div class="btn-submit py-2">
                    <input type="hidden" id="user-id" name="id" value="<?php echo (isset($user) ? $user[0]['user_id'] : '') ?>">
                    <button type="submit" class="btn btn-space  btn-xs btn-success">Generate</button>
                    <a href="<?php echo base_url('dashboard') ?>" class="btn btn-space btn-warning btn-xs " id="">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- ============================================================== -->
<script src="<?php echo base_url('assets/js/student.js') ?>"></script>