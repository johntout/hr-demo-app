<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 20px">
    <?php require app_dir().'/app/Views/common/messages.php'; ?>

    <div class="col-md-12">
        <?= user()->fullName() ?> <br><br>
        <a href="/panel/users/create" class="btn btn-primary" style="margin-bottom: 20px">Create User</a>
        <a href="/panel/logout" class="btn btn-danger" style="margin-bottom: 20px">Logout</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) : ?>
                <tr>
                    <td><a href="/panel/users/edit/<?= $user->id() ?>">Edit</a></td>
                    <td><?= $user->id() ?></td>
                    <td><?= $user->name() ?></td>
                    <td><?= $user->last_name() ?></td>
                    <td><?= $user->email() ?></td>
                    <td><?= $user->role() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>