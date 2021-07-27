<?php
require_once "../controllers/CSVComing.controller.php";
require_once "../models/CSV.model.php";

try {
    $json = json_decode(file_get_contents('php://input'), true);

    if (!$json['data']) {
        CSVRes([], "Data is empty", 0, dataComing);
        die();
    }

    $controller = new CSVComingControler();
    $controller->checkStation($json);
} catch (Exception $e) {
    CSVRes([], "$e->getMessage()", 0, dataComing);
}
