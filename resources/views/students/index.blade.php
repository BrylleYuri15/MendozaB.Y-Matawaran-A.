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
        <h1>Students</h1>
        <a href="{{ route('students.create') }}" class="btn btn-success"> Add New Student </a>
        <br><br>
        
        <?php if (session('success')): ?>
            <div class="alert alert-success"><?= htmlspecialchars(session('success')) ?></div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= htmlspecialchars($student->name) ?></td>
                        <td><?= htmlspecialchars($student->email) ?></td>
                        <td><?= htmlspecialchars($student->age) ?></td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info"> View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info"> Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
