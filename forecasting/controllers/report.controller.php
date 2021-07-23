<?php
require_once "../services/services.php";
require_once 'database.controller.php';
require_once "user.controller.php";

class ReportController
{
    public function __construct()
    {
    }

    public function reportSynopticByAnyStationAndTime($get)
    {
        try {

            $db = new DatabaseController();

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where s.id IN($get->station_id) and (time between '$get->startTime' and '$get->endTime') 
                    order by h.id desc ";
            $data = $db->query($sql);

            if ($data > 0) {
                PrintJSON($data, "Report list by any station and time of synoptic", 1);
            } else {
                PrintJSON("", "Sorry, have no data of synoptic", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }


    public function reportHydrologyByAnyStationAndTime($get)
    {
        try {

            $db = new DatabaseController();

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where s.id IN($get->station_id) and (time between '$get->startTime' and '$get->endTime') 
                    order by h.id desc ";
            $data = $db->query($sql);

            if ($data > 0) {
                PrintJSON($data, "Report list by any station and time of hydrology", 1);
            } else {
                PrintJSON("", "Sorry, have no data of hydrology", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function countStationSynoptic($get)
    {
        try {

            $db = new DatabaseController();

            $sql = "select count(*) as total from station where type IN ('CLIMATE','SYNOPTIC')";
            $data = $db->query($sql);

            if ($data > 0) {
                PrintJSON($data, "Total station synoptic", 1);
            } else {
                PrintJSON("", "Sorry, have no data of station", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function countStationHydrology($get)
    {
        try {

            $db = new DatabaseController();

            $sql = "select count(*) as total from station where type IN ('Hydrology','Rain Gauge')";
            $data = $db->query($sql);

            if ($data > 0) {
                PrintJSON($data, "Total station Hydrology", 1);
            } else {
                PrintJSON("", "Sorry, have no data of station", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
}
