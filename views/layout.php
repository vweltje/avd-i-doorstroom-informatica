<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ticketify<?= isset($pageTitle) && !empty($pageTitle) ? " | {$pageTitle}" : "" ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/assets/img/favicon.png" type="image/png">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="/assets/js/main.js"></script>
    </head>
    <body>
        <?= $this->loadView('components/pageHeading', ['heading' => 'Ticketify']) ?>
        <main>
            <?= $this->loadView($view, $data) ?>
        </main>
    </body>
</html>