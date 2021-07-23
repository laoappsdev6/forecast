<?php

require_once "../controllers/synoptic.controller.php";
require_once "../models/synoptic.model.php";

try {
    Initialization();
    $m = getallheaders()['M'];

    $json = json_decode(file_get_contents('php://input'), true);
    $control = new SynopticController();

    if ($m == "addSynoptic") {
        $model = new SynopticModel($json);
        $control->addsynoptic($model);
    } else if ($m == "synopticListAll") {
        $control->synopticListAll();
    } else if ($m == "synopticListPage") {
        $data = (object) $json;
        $control->synopticListPage($data);
    } else if ($m == "synopticListPageByPart") {
        $data = (object) $json;
        $control->synopticListPageBypart($data);
    } else if ($m == "synopticListByTime") {
        $data = (object) $json;
        $control->synopticListByTime($data);
    } else if ($m == "synopticListByStation") {
        $data = (object) $json;
        $control->synopticListByStation($data);
    } else if ($m == "synopticListByTimeAndStation") {
        $data = (object) $json;
        $control->synopticListByTimeAndStation($data);
    } else if ($m == "synopticListByStationLatLng") {
        $data = (object) $json;
        $control->synopticListByStationLatLng($data);
    } else if ($m == "synopticListByTimeAndStationLatLng") {
        $data = (object) $json;
        $control->synopticListByTimeAndStationLatLng($data);
    } else if ($m == "synopticListForGraph") {
        $data = (object) $json;
        $control->SynopticListAllByTimeAndStationForGraph($data);
    } else if ($m == "synopticChilldrenOfStation") {
        $data = (object) $json;
        $control->synopticChilldrenOfStation($data);
    } else if ($m == "synopticChilldrenOfStationByPart") {
        $data = (object) $json;
        $control->synopticChilldrenOfStationByPart($data);
    } else {
        PrintJSON("", "method not found!", 0);
        die();
    }
} catch (Exception $e) {
    PrintJSON("", "$e->getMessage()", 0);
}
