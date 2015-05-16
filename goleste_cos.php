<?php
header('Content-Type: application/json');
require_once('inc.php');

echo json_encode($cos->Goleste_Cos());

header('Location: ' . $_SERVER['HTTP_REFERER']);

