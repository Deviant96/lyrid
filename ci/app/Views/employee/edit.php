<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Employee</h1>
        <form action="/employees/update/<?= $employee['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?= $employee['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= $employee['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control" name="photo" accept="image/jpeg, image/jpg">
                <img src="<?= base_url('uploads/' . $employee['photo']) ?>" alt="Photo" width="100" class="mt-2">
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Update</button>
        </form>
    </div>
</body>
</html>
