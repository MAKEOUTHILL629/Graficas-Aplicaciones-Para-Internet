<?php
include 'logica/Edition.php';
include 'logica/EditionTopic.php';
include 'logica/Topic.php';



?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
            rel="stylesheet">
    <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script
            src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script charset="utf-8">
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>

    <title>Parcial</title>
</head>
<body>
<?php

    include "presentacion/estadisticas.php";

?>
<div class="container">
    <div class="row mt-3">
        <div class="row">
            <div class="col text-center text-muted">
                Felipe &copy; <?php echo date("Y") ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
