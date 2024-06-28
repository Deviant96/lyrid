<?= $this->extend('layouts/base') ?>

<?= $this->section('title') ?>
User List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="p-4">
    <h1>Welcome to Dashboard</h1>
    <a href="/users" class="btn btn-primary">Manage Users</a>
    <a href="/employees" class="btn btn-primary">Manage Employees</a>
    <a href="/logout" class="btn btn-secondary">Logout</a>
</div>

<?= $this->endSection() ?>