<?php

require_once "../controllers/report.controller.php";

try {
    Initialization();
    $m = getallheaders()['M'];

    $json = json_decode(file_get_contents('php://input'), true);
    $data = (object) $json;
    $control = new ReportController();

    if ($m == "reportSynopticByAnyStationAndTime") {
        $control->reportSynopticByAnyStationAndTime($data);
    } else if ($m == "reportHydrologyByAnyStationAndTime") {
        $control->reportHydrologyByAnyStationAndTime($data);
    } else if ($m == "countStationHydrology") {
        $control->countStationHydrology($data);
    } else if ($m == "countStationSynoptic") {
        $control->countStationSynoptic($data);
    } else {
        PrintJSON("", "method not found!", 0);
        die();
    }
} catch (Exception $e) {
    PrintJSON("", "$e->getMessage()", 0);
}
