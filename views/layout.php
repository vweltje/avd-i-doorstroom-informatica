<html lang="en">
    <head>
        <title>Ticketify<?= isset($pageTitle) && !empty($pageTitle) ? " | {$pageTitle}" : "" ?></title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <?= $this->loadView('components/pageHeading', ['heading' => 'Ticketify']) ?>
        <main>
            <?= $this->loadView($view, $data) ?>
        </main>
    </body>
</html>