<?php
header('Content-Type: application/json');
require_once('inc.php');

$id = isset($_GET['id']) ? $_GET['id'] : "";

echo json_encode($cos->Sterge_din_cos($id));



