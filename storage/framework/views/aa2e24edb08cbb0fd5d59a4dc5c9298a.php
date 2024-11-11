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
        <h1>Add New Student</h1>

        <form action="<?php echo e(route('students.store')); ?>" method="POST">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" required min="1">
            </div>

            <button type="submit" class="btn btn-primary"> Add Student</button>
            <a href="<?php echo e(route('students.index')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel_activity\resources\views/students/create.blade.php ENDPATH**/ ?>