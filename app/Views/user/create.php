<?= $this->extend('layouts/base') ?>

<?= $this->section('title') ?>
Add User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-image">
    <i class="fas fa-users"></i>
</div>
<div class="form-container">
    <div class="form-title">Create New User</div>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <form action="/user/store" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label px-3">Username<span class="text-danger">
                                *</span></label>
                        <input type="text" id="username" name="username" placeholder="Enter username" value="<?= old('username') ?>">
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label px-3">Email<span class="text-danger">
                                *</span></label>
                        <input type="text" id="email" name="email" placeholder="Enter email" value="<?= old('email') ?>">
                    </div>
                </div>

                <div class="form-group col-sm-12 flex-column d-flex">
                    <label class="form-control-label px-3">Password<span class="text-danger">
                            *</span></label>
                    <input type="password" id="password" name="password" placeholder="Enter password"
                        value="<?= old('password') ?>">
                </div>

                <div class="form-group col-sm-12 flex-column d-flex">
                    <label class="form-control-label px-3">Password Confirmation<span class="text-danger">
                            *</span></label>
                    <input type="password" id="passconf" name="passconf" placeholder="Enter confirmation password"
                        value="<?= old('passconf') ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-3 w-100">Add</button>
    </form>
</div>
</div>
<?= $this->endSection() ?>