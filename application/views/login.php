<?= $this->session->tempdata('login_message'); ?>
<div class="vh-100 vw-100 d-flex justify-content-center align-items-center">
    <div class="card col-md-4">
        <div class="card-body">
            <center>
                <img src="<?= base_url('assets/img/logo.svg') ?>" alt="logo rujak" width="100px" />
                <p>Please login first</p>
            </center>
            <form action="<?= base_url('auth') ?>" method="post" class="row">
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" placeholder="type username here..." required>
                    <label for="username" class="form-label ms-2">Username</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="type password here" required>
                    <label for="password" class="form-label ms-2">Password</label>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark mb-3">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>