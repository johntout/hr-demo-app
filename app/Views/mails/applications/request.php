<html>
<head>
    <title>Application Request</title>
</head>
<body>
Dear supervisor,<br><br>

Employee <strong><?= $application->user()->fullName() ?></strong> requested for some time off,
starting on <strong><?= $application->start_date(true) ?></strong> and ending on <strong><?= $application->end_date(true) ?></strong>,
stating the reason: <br>
<?= $application->reason() ?> <br><br>

Click on one of the below links to approve or reject the application:
<a href="<?= env('DOMAIN') ?>/panel/approvals/approve/<?= $application->id() ?>">Approve Request</a> -  <a href="<?= env('DOMAIN') ?>/panel/approvals/reject/<?= $application->id() ?>">Reject Request</a>​
</body>
</html>