<?php
require_once "../services/services.php";
require_once 'database.controller.php';

class CSVHydrologyController
{
    public function __construct()
    {
    }

    public function addHydrology($csv, $station_id)
    {
        try {
            $db = new DatabaseController();
            $sql = "insert into hydrology (time,rain_tips,rain_fall,water_fall,water_temperature,ext_batt,moisture,modern_signal,station_id)
                    values";
            $rowExist = [];
            $rowSuccess = [];
            for ($i = 0; $i < count($csv); $i++) {

                $time = formatDate($csv[$i]['Time']);
                $rain_tips = isset($csv[$i]['raintips']) ? $csv[$i]['raintips'] : '';
                $rain_fall = isset($csv[$i]['rainfall']) ? $csv[$i]['rainfall'] : '';
                $water_fall = isset($csv[$i]['waterlevel']) ? $csv[$i]['waterlevel'] : '';
                $water_temperature = isset($csv[$i]['watertemperature']) ? $csv[$i]['watertemperature'] : '';
                $ext_batt = isset($csv[$i]['ext_batt']) ? $csv[$i]['ext_batt'] : '';
                $moisture = isset($csv[$i]['moisture']) ? $csv[$i]['moisture'] : '';
                $modern_signal = isset($csv[$i]['ModemSignal']) ? $csv[$i]['ModemSignal'] : '';

                $sql2 = "select * from hydrology where time='$time' and station_id='$station_id'";
                $result = $db->query($sql2);

                if ($result > 0) {
                    $rowExist[] = $time;
                } else {
                    $rowSuccess[] = $time;

                    $sql .= "('$time','$rain_tips','$rain_fall','$water_fall','$water_temperature','$ext_batt',
                                '$moisture','$modern_signal','$station_id'),";
                }
            }
            $rest = substr($sql, 0, -1);

            $data = $db->query($rest);

            $allRow = array("success" => $rowSuccess, "fail" => $rowExist);

            if ($data) {
                CSVRes($allRow, "Add hydrology successfully", 1, addHydrology);
            } else {
                CSVRes($allRow, "add hydrology failed!", 0, addHydrology);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
}
