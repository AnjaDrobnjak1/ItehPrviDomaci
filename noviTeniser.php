<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "teniseri-drzave";
$connection = new mysqli($host, $user, $pass, $db);


$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$pozicija = $_POST['pozicija'];
$osvojeni_turniri = $_POST['osvojeni_turniri'];
$drzava_id = $_POST['drzava'];

$query = "insert into teniser values (NULL, '$ime', '$prezime', '$pozicija', '$osvojeni_turniri', '$drzava_id ')";

$connection->query($query);


$query2 = "select ten.id, ten.ime, ten.prezime, ten.pozicija, ten.osvojeni_turniri, drz.naziv from teniser ten join drzava drz on ten.drzava_id=drz.id";
$resultSet = $connection->query($query2);

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