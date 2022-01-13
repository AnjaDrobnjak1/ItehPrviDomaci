<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Izmena Tenisera</title>
</head>

<body>
    <?php
    $query = "select * from teniser where id=" . $_GET['id'];
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "teniseri-drzave";
    $connection = new mysqli($host, $user, $pass, $db);
    $resultSet = $connection->query($query);

    $teniser = mysqli_fetch_array($resultSet)

    ?>


    <form method="post" id="forma-izmena-teniser">

        <h2 class="mb-3">Izmena tenisera</h2>

        <input type="hidden" class="form-control" name="id" value="<?php echo $teniser['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Ime </label>
            <input type="text" class="form-control" name="ime" value="<?php echo $teniser['ime']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Prezime </label>
            <input type="text" class="form-control" name="prezime" value="<?php echo $teniser['prezime']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Pozicija </label>
            <input type="number" class="form-control" name="pozicija" value="<?php echo $teniser['pozicija']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Osvojeni turniri </label>
            <input type="number" class="form-control" name="osvojeni_turniri" value="<?php echo $teniser['osvojeni_turniri']; ?>">
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Drzava: </label>
            <select class="form-select" name="drzava_id" value="<?php echo $teniser['drzava_id']; ?>">

                <?php

                $query2 = "select * from drzava";
                $resultSet1 = $connection->query($query2);

                while ($drzava = mysqli_fetch_array($resultSet1)) :
                ?>
                    <option value="<?php echo $drzava['id']; ?>"><?php echo $drzava['naziv']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success" name="izmeni_tenisera_dugme">Sačuvaj</button>
    </form>


    <?php
    require 'teniser.php';

    if (isset($_POST['izmeni_tenisera_dugme'])) {
        $teniser1 = new Teniser();
        if ($teniser1->azurirajTenisera($_POST['id'], $_POST['ime'], $_POST['prezime'], $_POST['pozicija'], $_POST['osvojeni_turniri'], $_POST['drzava_id'])) {
            header('Location: index.php');
        } else {
            echo 'Greska!';
        }
    }

    ?>







</body>

</html>