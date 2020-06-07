<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 20px">
    <?php require app_dir().'/app/Views/common/messages.php'; ?>
    <h2>Create Request</h2>
    <div class="col-md-12">
        <form action="/portal/applications/insert" method="post">
            <input type="hidden" name="csrf_name" value="<?= $csrf_name ?>">
            <input type="hidden" name="csrf_value" value="<?= $csrf_value ?>">
            <div class="form-group">
                <label for="start_date">Date from:</label>
                <input type="text" class="form-control datepicker" id="start_date" name="start_date" value="<?= session()->get('applications.create.start_date') ?>">
            </div>
            <div class="form-group">
                <label for="end_date">Date to</label>
                <input type="text" class="form-control datepicker" id="end_date" name="end_date" value="<?= session()->get('applications.create.end_date') ?>">
            </div>
            <div class="form-group">
                <label for="reason">Reason</label>
                <textarea class="form-control" id="reason" name="reason"><?= session()->get('applications.create.reason') ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/portal" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });
    });
</script>
</body>
</html>