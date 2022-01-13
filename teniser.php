<?php

class Teniser
{

    public $id;
    public $ime;
    public $prezime;
    public $pozicija;
    public $osvojeni_turniri;
    public $drzava_id;


    public function azurirajTenisera($id, $ime, $prezime, $pozicija, $osvojeni_turniri, $drzava_id)
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $baza = "teniseri-drzave";
        $connection = new mysqli($host, $user, $pass, $baza);

        $query = "update teniser set ime='" . $ime . "', prezime='" . $prezime . "',
        pozicija='" . $pozicija . "', osvojeni_turniri='" . $osvojeni_turniri . "', drzava_id='" . $drzava_id . "' where id=" . $id;

        return $connection->query($query);
    }
}
