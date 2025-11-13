<?php require_once("./settings.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?></title>

    <style>
        body {
            background-color:
                <?= $settings["background"] ?>
            ;
            font-family:
                <?= $settings["font"] ?>
            ;
            font-size:
                <?= $settings["fontSize"] ?>
            ;
        }
    </style>
</head>

<body>
    <?php if ($settings["WebSiteEnabled"]): ?>

        <?php //include_once("./nav.php") ?>
        <?php require_once("./nav.php") ?>

        <?php if (!isset($_GET["sekcija"])) {
            header("Location:?sekcija=1", true);
        }
        ?>

        <?php if ($_GET["sekcija"] == 1): ?>
            <h1>Sekcijas 1 saturs</h1>
            <p>Sekcijas 1 saturs</p>
        <?php elseif ($_GET["sekcija"] == 2): ?>
            <h1>Sekcijas 2 saturs</h1>
                <?php include("posts.php")?>
            <p>Sekcijas 2 saturs</p>
        <?php else: ?>
            <h1>Lapa nav atrasta</h1>
        <?php endif; ?>

        <footer>
            <?php include_once("./form.php")?>
        </footer>
        <script>

        </script>
    <?php else: ?>
        <h1>Mājaslapa ir slēgta</h1>
    <?php endif; ?>

</body>

</html>