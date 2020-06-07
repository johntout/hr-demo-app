<html>
<head>
    <title>Application Request - <?= $application->status() ?></title>
</head>
<body>
    D​ear employee, your supervisor has <strong><?= strtolower($application->status()) ?></strong> your application submitted on <strong><?= $application->created_at(true) ?></strong>.
</body>
</html>