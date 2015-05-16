<?php
header('Content-Type: application/json');
require_once('inc.php');

$cos->Salveaza_Cookie(TRUE);

$produse_cos = array();
// get the product id and name
$id = isset($_GET['id']) ? $_GET['id'] : "";
$nume = isset($_GET['nume']) ? $_GET['nume'] : "";
$pret = isset($_GET['pret']) ? $_GET['pret'] : "";

$cos->Adauga_in_cos($id, $nume, $pret);

$return = array("total" => $cos->Calculeaza_Cost_Total());
echo json_encode($return);

