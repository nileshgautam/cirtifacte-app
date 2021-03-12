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
                        <label for="inputUserName">First Name <span class="text-danger">*</span></label>
                        <input id="first-ame" type="text" name="first-name" placeholder="Enter first name" autocomplete="off" class="form-control" value="<?php echo (isset($user)) ? $user[0]['first_name'] : "" ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last-name">Last Name
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="last-name" type="text" name="last-name" placeholder="Enter last name" autocomplete="off" class="form-control" value="<?php echo (isset($user)) ? $user[0]['last_name'] : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobile-no">Gender
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <div class="gender">
                


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="radio" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="radio" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="gender" type="radio" id="other" value="other">
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="dob" type="date" name="dob" placeholder="Enter " autocomplete="off" class="form-control date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-email">Email address
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="input-user-email" type="email" name="email" placeholder="Enter email" autocomplete="off" class="form-control" value="<?php echo (isset($user)) ? $user[0]['email'] : "" ?>">
                        <small id="user-error-email" class="">We'll never share your email with anyone else.</small>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="mobile-no">Mobile No.
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="input-user-mobile" type="number" name="mobile-no" placeholder="Enter mobile no." autocomplete="off" class="form-control" value="<?php echo (isset($user)) ? $user[0]['phone'] : "" ?>">
                        <small id="user-error-mobile">We'll never share your mobile with anyone else.</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">Address
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <textarea name="address" id="" cols="60" rows="3" class='form-control' placeholder="Address..."><?php echo (isset($user)) ? $user[0]['address'] : "" ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="join-date">Join Date
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="join-date" type="date" name="join-date" placeholder="Join date" autocomplete="off" class="form-control date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="roll-no">Roll/Reg. No.
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="roll-no" type="text" name="roll-no" placeholder="Enter Roll/Reg no." autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="course">Course
                            <span class="text-danger">*</span></label>
                        <input id="course" type="text" name="course" placeholder="Enter course" autocomplete="off" class="form-control" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="duration">Duration<span class="text-danger">*</span></label>
                        <input id="duration" type="text" name="duration" placeholder="Enter duration" autocomplete="off" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="course-text">Certificate text
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <textarea name="course-text" id="course-text" cols="60" rows="3" class='form-control' placeholder="course text"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="director">Director Name
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="director" type="text" name="director" placeholder="Enter director name" autocomplete="off" class="form-control date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="director-signature">Signature
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="director-signature" type="file" name="director-signature" placeholder="." autocomplete="off" class="form-control upload-flile" accept="image/*">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="manger">Manger Name
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="manger-name" type="text" name="manger-name" placeholder="Enter manager name" autocomplete="off" class="form-control">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="manger-signature">Signature
                            <!-- <span class="text-danger">*</span> -->
                        </label>
                        <input id="manger-signature" type="file" name="manger-signature" placeholder="Enter duration" autocomplete="off" class="form-control upload-flile" accept="image/*">
                    </div>

                </div>
                <div class="btn-submit py-2">
                    <input type="hidden" id="manager-sing" name="manager-sing" value="">
                    <input type="hidden" id="director-sign" name="director-sign" value="">
                    <input type="hidden" id="user-id" name="id" value="">
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