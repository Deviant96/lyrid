<?= $this->extend('layouts/base') ?>

<?= $this->section('title') ?>
Employee List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5" style="overflow: scroll">
    <h1>Employee List</h1>
    <?php if (session()->has('message')): ?>
        <div class="alert alert-success">
            <?= session('message') ?>
        </div>
    <?php endif; ?>

    <a href="/employees/create" class="btn btn-primary mb-3">Add Employee</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birthdate</th>
                <th>Address</th>
                <th>Zip Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($employees) && is_array($employees)): ?>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?= esc($employee['id']) ?></td>
                        <td>
                            <?php if ($employee['photo']): ?>
                                <img src="<?= base_url('uploads/' . $employee['photo']) ?>" alt="Employee Photo" width="50" height="50">
                            <?php else: ?>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($employee['fname']) ?></td>
                        <td><?= esc($employee['lname']) ?></td>
                        <td><?= esc($employee['position']) ?></td>
                        <td><?= esc($employee['department']) ?></td>
                        <td><?= esc($employee['salary']) ?></td>
                        <td><?= esc($employee['email']) ?></td>
                        <td><?= esc($employee['phone']) ?></td>
                        <td><?= esc($employee['birthdate']) ?></td>
                        <td><?= esc($employee['address']) ?></td>
                        <td><?= esc($employee['zipcode']) ?></td>
                        <td>
                            <a href="/employees/edit/<?= esc($employee['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/employees/delete/<?= esc($employee['id']) ?>" method="post" class="d-inline">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="13" class="text-center">No Employees Found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
