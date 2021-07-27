<?php

require_once "../services/services.php";
require_once 'database.controller.php';
require_once 'CSVHydrology.controller.php';
require_once 'CSVSynoptic.controller.php';

class CSVComingControler
{
    public function checkStation($get)
    {
        $station = $get['station'];
        $myData = $get['data'];

        try {
            $db = new DatabaseController();
            $sql = "select * from station where station_number='$station'";
            $data = $db->query($sql);
            if ($data > 0) {

                $id = $data[0]['id'];
                $stationType = $data[0]['type'];

                if ($stationType == Climate || $stationType == Synoptic) {
                    $controller = new CSVSynopticController();
                    $controller->addSynoptic($myData, $id);
                } else {
                    $controller = new CSVHydrologyController();
                    $controller->addHydrology($myData, $id);
                }
            } else {
                CSVRes([], 'StationUnknown', 0, checkStation);
            }
        } catch (Exception $e) {
            CSVRes([], "$e->getMessage()", 0, checkStation);
        }
    }
}
