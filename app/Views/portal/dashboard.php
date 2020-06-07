<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 20px">
    <?php require app_dir().'/app/Views/common/messages.php'; ?>

    <div class="col-md-12">
        <?= user()->fullName() ?> <br><br>
        <a href="/portal/applications/create" class="btn btn-primary" style="margin-bottom: 20px">Submit Request</a>
        <a href="/portal/logout" class="btn btn-danger" style="margin-bottom: 20px">Logout</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date submitted</th>
                <th>Dates requested (vacation start - vacation end)</th>
                <th>Days requested</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($applications as $application) : ?>
                <tr>
                    <td><?= $application->id() ?></td>
                    <td><?= $application->created_at(true) ?></td>
                    <td><?= $application->start_date(true) ?> - <?= $application->end_date(true) ?></td>
                    <td><?= $application->total_days() ?></td>
                    <td><?= $application->status() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>