<?= $this->extend('layouts/base') ?>

<?= $this->section('title') ?>
User List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mt-5" style="overflow: scroll">
    <h1>User List</h1>
    <?php if (session()->has('message')): ?>
        <div class="alert alert-success">
            <?= session('message') ?>
        </div>
    <?php endif; ?>

    <a href="/users/create" class="btn btn-primary mb-3">Add User</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td>
                            <a href="/users/edit/<?= esc($user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/users/delete/<?= esc($user['id']) ?>" method="post" class="d-inline">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="13" class="text-center">No users Found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
