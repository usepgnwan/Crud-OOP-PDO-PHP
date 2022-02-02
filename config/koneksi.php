<?php
try {
    $dbhost = "localhost";
    $dbuser    = "root";
    $dbpas  = "";
    $dbnama = "db_gistex";
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbnama . ';charset=utf8', $dbuser, $dbpas);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, False);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "sepertinya ada yang error deh";
    die();
}
