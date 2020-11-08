<html lang="en">
    <head>
        <title>Ticketify<?= isset($pageTitle) && !empty($pageTitle) ? " | {$pageTitle}" : "" ?></title>
        <link rel="stylesheet" href="/assets/css/style.css">
        <script type="text/javascript" src="/assets/js/main.js"></script>
    </head>
    <body>
        <?= $this->loadView('components/pageHeading', ['heading' => 'Ticketify']) ?>
        <main>
            <?= $this->loadView($view, $data) ?>
        </main>
    </body>
</html>