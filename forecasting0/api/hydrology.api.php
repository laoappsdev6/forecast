<?php

require_once "../controllers/hydrology.controller.php";
require_once "../models/hydrology.model.php";

try {
    Initialization();
    $m = getallheaders()['M'];

    $json = json_decode(file_get_contents('php://input'), true);
    $control = new HydrologyController();

    if ($m == "addHydrology") {
        $model = new HydrologyModel($json);
        $control->addHydrology($model);
    } else if ($m == "hydrologyListAll") {
        $data = (object) $json;
        $control->hydrologyListAll($data);
    } else if ($m == "hydrologyListPage") {
        $data = (object) $json;
        $control->hydrologyListPage($data);
    } else if ($m == "hydrologyListByTime") {
        $data = (object) $json;
        $control->hydrologyListByTime($data);
    } else if ($m == "hydrologyListByStation") {
        $data = (object) $json;
        $control->hydrologyListByStation($data);
    } else if ($m == "hydrologyListByTimeAndStation") {
        $data = (object) $json;
        $control->hydrologyListByTimeAndStation($data);
    } else if ($m == "hydrologyChilldrenOfStation") {
        $data = (object) $json;
        $control->hydrologyChilldrenOfStation($data);
    } else if ($m == "hydrologyChilldrenOfStationByPart") {
        $data = (object) $json;
        $control->hydrologyChilldrenOfStationByPart($data);
    } else if ($m == "hydrologyListForGraph") {
        $data = (object) $json;
        $control->hydrologyAllByTimeAndStationForGraph($data);
    } else {
        PrintJSON("", "method not found!", 0);
        die();
    }
} catch (Exception $e) {
    PrintJSON("", "$e->getMessage()", 0);
}
