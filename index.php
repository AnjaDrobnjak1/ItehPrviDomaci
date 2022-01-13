<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>ITEH zadatak</title>
</head>

<body>
    <form id="forma-novi-teniser">

        <h2 class="mb-3">Novi teniser</h2>

        <div class="mb-3">
            <label class="form-label">Ime </label>
            <input type="text" class="form-control" id="ime">
        </div>
        <div class="mb-3">
            <label class="form-label">Prezime </label>
            <input type="text" class="form-control" id="prezime">
        </div>
        <div class="mb-3">
            <label class="form-label">Pozicija </label>
            <input type="number" class="form-control" id="pozicija">
        </div>
        <div class="mb-3">
            <label class="form-label">Osvojeni turniri </label>
            <input type="number" class="form-control" id="osvojeni_turniri">
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Drzava: </label>
            <select class="form-select" id="drzava">

                <?php
                $query = "select * from drzava";
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "teniseri-drzave";
                $connection = new mysqli($host, $user, $pass, $db);
                $resultSet = $connection->query($query);

                while ($drzava = mysqli_fetch_array($resultSet)) :
                ?>
                    <option value="<?php echo $drzava['id']; ?>"><?php echo $drzava['naziv']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="button" class="btn btn-success" id="sacuvaj_tenisera_dugme">Sačuvaj</button>
    </form>


    <div class="container">

        <table class="table table-bordered" id="tabela-teniseri">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Pozicija</th>
                    <th>Osvojeni turniri</th>
                    <th>Država</th>
                    <th>Izmena i Brisanje</th>
                </tr>
            </thead>

            <tbody id="tabela-teniseri-tbody">

                <?php

                $query = "select ten.id, ten.ime, ten.prezime, ten.pozicija, ten.osvojeni_turniri, drz.naziv from teniser ten join drzava drz on ten.drzava_id=drz.id";
                $host = "localhost";
                $user = "root";
                $pass = "";
                $baza = "teniseri-drzave";
                $connection = new mysqli($host, $user, $pass, $baza);
                $resultSet = $connection->query($query);

                while ($teniser = mysqli_fetch_array($resultSet)) :
                ?>
                    <tr>
                        <td><?php echo $teniser['id']; ?></td>
                        <td><?php echo $teniser['ime'];  ?></td>
                        <td><?php echo $teniser['prezime'];  ?></td>
                        <td><?php echo $teniser['pozicija'];  ?></td>
                        <td><?php echo $teniser['osvojeni_turniri']; ?></td>
                        <td><?php echo $teniser['naziv']; ?></td>
                        <td>
                            <button type="button" class="btn btn-info">Izmena</button>
                            <button type="button" class="btn btn-danger">Obriši</button>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="skripta.js"></script>

</body>

</html>