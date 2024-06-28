<?= $this->extend('layouts/base') ?>

<?= $this->section('title') ?>
Add Employee
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-image">
    <i class="fas fa-users"></i>
</div>
<div class="form-container">
    <div class="form-title">Create New Employee</div>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <form action="/employees/store" method="post" enctype="multipart/form-data">
        <h2>General Infomation</h2>
        <div class="row">
            <div class="col-8">
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label px-3">First name<span class="text-danger">
                                *</span></label>
                        <input type="text" id="fname" name="fname" placeholder="Enter your first name" value="<?= old('fname') ?>">
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label px-3">Last name<span class="text-danger">
                                *</span></label>
                        <input type="text" id="lname" name="lname" placeholder="Enter your last name" value="<?= old('lname') ?>">
                    </div>
                </div>

                <div class="form-group col-sm-12 flex-column d-flex">
                    <label class="form-control-label px-3">Position<span class="text-danger">
                            *</span></label>
                    <input type="text" id="position" name="position" placeholder="Enter position" value="<?= old('position') ?>">
                </div>
                <div class="form-group col-sm-12 flex-column d-flex">
                    <label class="form-control-label px-3">Department<span class="text-danger">
                            *</span></label>
                    <input type="text" id="department" name="department" placeholder="Enter department" value="<?= old('department') ?>">
                </div>
                <div class="form-group col-sm-12 flex-column d-flex">
                    <label class="form-control-label px-3">Salary<span class="text-danger">
                            *</span></label>
                    <input type="text" id="salary" name="salary" placeholder="Enter salary"
                        value="<?= old('salary') ?>">
                </div>
            </div>
            <div class="col-4">

                <div class="form-group">
                    <label for="photo" class="form-control-label px-3">
                        <div class="form-image-preview">
                            <div class="form-image-square" id="previewPlaceholder"><i class="fa fa-user"
                                    aria-hidden="true"></i></div>
                            <img id="imgPreview" src="#" alt="Image Preview">
                        </div>
                        Upload Photo<span class="text-danger">
                            *</span>
                    </label>
                    <input type="file" class="form-control-file w-100" id="photo" name="photo"
                        accept="image/jpeg, image/jpg" accept="image/*" onchange="showPreview(event)" value="<?= old('photo') ?>" required>
                </div>
            </div>
        </div>

        <hr>

        <h2>Contact Details</h2>
        <div class="form-group col-sm-12 flex-column d-flex">
            <label for="birthdate" class="form-control-label px-3">Date of Birth<span class="text-danger">
                    *</span></label>
            <input type="date" id="birthdate" name="birthdate" placeholder="Enter birth date" value="<?= old('birthdate') ?>">
        </div>
        <div class="row">
            <div class="form-group col-sm-6 flex-column d-flex">
                <label for="email" class="form-control-label px-3">Email<span class="text-danger">
                        *</span></label>
                <input type="text" id="email" name="email" placeholder="Enter email" value="<?= old('email') ?>">
            </div>
            <div class="form-group col-sm-6 flex-column d-flex">
                <label for="phone" class="form-control-label px-3">Phone Number<span class="text-danger">
                        *</span></label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone" value="<?= old('phone') ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 flex-column d-flex">
                <label for="address" class="form-control-label px-3">Address<span class="text-danger">
                        *</span></label>
                <textarea type="text" id="address" name="address" placeholder="Enter address"><?= old('address') ?></textarea>
            </div>
            <div class="form-group col-sm-6 flex-column d-flex">
                <label for="zipcode" class="form-control-label px-3">Zip Code<span class="text-danger">
                        *</span></label>
                <input type="text" id="zipcode" name="zipcode" placeholder="Enter zipcode" value="<?= old('zipcode') ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-3 w-100">Add</button>
    </form>
</div>
</div>

<script>
    function showPreview(event) {
        const input = event.target;
        const preview = document.getElementById('imgPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            const imagePreviewPlaceholder = document.getElementById('previewPlaceholder');
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                imagePreviewPlaceholder.style.display = "none";
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= $this->endSection() ?>