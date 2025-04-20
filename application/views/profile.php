<?= $this->session->tempdata('profile_message'); ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 text-center">
            <img src="<?= base_url('assets/img/user.svg') ?>" alt="Profile Photo" width="300px" />
            <h2>Admin</h2>
        </div>
        <div class="col-md-6">
            <form class="form-control" action="<?= base_url('profile/change_password') ?>" method="post">
                <h2>Change Password</h2>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Type New Password">
                    <label for="password">Password</label>
                    <i class="text-danger mt-2">
                        <?php echo form_error('password'); ?>
                    </i>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Type New Password Again">
                    <label for="password_confirm">Password Confirmation</label>
                    <i class="text-danger mt-2">
                        <?php echo form_error('password_confirm'); ?>
                    </i>
                </div>
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <button class="btn btn-dark" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>