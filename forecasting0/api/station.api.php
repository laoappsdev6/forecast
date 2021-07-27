<?php

require_once "../controllers/station.controller.php";
require_once "../models/station.model.php";

try {
    Initialization();
    $m = getallheaders()['M'];

    $json = json_decode(file_get_contents('php://input'), true);
    $control = new StationController();

    if ($m == "addStation") {
        $model = new StationModel($json);
        $model->validateall();
        $control->addStation($model);
    } else if ($m == "updateStation") {
        $model = new StationModel($json);
        $model->checkId();
        $model->validateall();
        $control->updateStation($model);
    } else if ($m == "setNewPart") {
        $model = new StationModel($json);
        $model->checkId();
        $model->validatePart();
        $control->setNewPart($model);
    } else if ($m == "deleteStation") {
        $model = new StationModel($json);
        $model->checkId();
        $control->deleteStation($model);
    } else if ($m == "stationListPage") {
        $model = new StationModel($json);
        $control->stationListPage($model);
    } else if ($m == "stationListAll") {
        $control->stationListALL();
    } else if ($m == "getStation") {
        $model = new StationModel($json);
        $control->getStation($model);
    } else if ($m == "stationListAllByUser") {
        $model = (object) $json;
        $control->stationListAllByUser($model);
    } else if ($m == "stationListPageByUser") {
        $model = (object) $json;
        $control->stationListPageByUser($model);
    } else if ($m == "stationListPageByPart") {
        $model = (object) $json;
        $control->stationListPageByPart($model);
    } else if ($m == "stationSynopticListAllByUser") {
        $model = (object) $json;
        $control->stationSynopticListAllbyUser($model);
    } else if ($m == "stationHydrologyListAllByUser") {
        $model = (object) $json;
        $control->stationHydrologyListAllbyUser($model);
    } else {
        PrintJSON("", "method not found!", 0);
        die();
    }
} catch (Exception $e) {
    PrintJSON("", "$e->getMessage()", 0);
}
