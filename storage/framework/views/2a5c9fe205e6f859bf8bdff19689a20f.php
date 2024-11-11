<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Students</title>
</head>

<body>
    <div class="container mt-4">
        <h1><?= htmlspecialchars($student->name) ?></h1>

        <p><strong>Email:</strong> <?= htmlspecialchars($student->email) ?></p>
        <p><strong>Age:</strong> <?= htmlspecialchars($student->age) ?></p>

        <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-warning">Edit</a>
        <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" style="display:inline;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-secondary">Back to list</a>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel_activity\resources\views/students/show.blade.php ENDPATH**/ ?>