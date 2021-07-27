<?php
require_once "../services/services.php";
require_once 'database.controller.php';

class CSVSynopticController
{
    public function __construct()
    {
    }

    public function addSynoptic($csv, $station_id)
    {
        try {
            $db = new DatabaseController();
            $sql = "insert into synoptic (time,avg_wind_speed,avg_wind_direction,wind_gust,wind_status,air_temperature,relative_humidity,air_pressure,
                    dewpoint,metpak_status,net_radiation,rain_tips,rain_fall,ext_batt,moisture,modern_signal,station_id)
                    values ";
            $rowExist = [];
            $rowSuccess = [];
            for ($i = 0; $i < count($csv); $i++) {

                $time = formatDate($csv[$i]['Time']);
                $avg_wind_speed = $csv[$i]['avgwindspeed'];
                $avg_wind_direction = $csv[$i]['avgwinddirection'];
                $wind_gust = $csv[$i]['windgust'];
                $wind_status = $csv[$i]['windstatus'];
                $air_temperature = $csv[$i]['airtemperature'];
                $relative_humidity = $csv[$i]['relativehumidty'];
                $air_pressure = $csv[$i]['airpressure'];
                $dewpoint = $csv[$i]['dewpoint'];
                $metpak_status = $csv[$i]['MetPakstatus'];
                $net_radiation = $csv[$i]['netradiation'];
                $rain_tips = $csv[$i]['raintips'];
                $rain_fall = $csv[$i]['rainfall'];
                $ext_batt = $csv[$i]['ext_batt'];
                $moisture = $csv[$i]['moisture'];
                $modern_signal = $csv[$i]['ModemSignal'];

                $sql2 = "select * from synoptic where time='$time' and station_id='$station_id'";
                $result = $db->query($sql2);

                if ($result > 0) {
                    $rowExist[] = $time;
                } else {
                    $rowSuccess[] = $time;
                    $sql .= "('$time','$avg_wind_speed', '$avg_wind_direction', '$wind_gust','$wind_status', '$air_temperature', '$relative_humidity', '$air_pressure',
                        $dewpoint, '$metpak_status', '$net_radiation', '$rain_tips', '$rain_fall','$ext_batt','$moisture','$modern_signal','$station_id'),";
                }
            }

            $rest = substr($sql, 0, -1);

            $data = $db->query($rest);

            $allRow = array("success" => $rowSuccess, "fail" => $rowExist);
            if ($data) {
                CSVRes($allRow, "Add synoptic successfully", 1, addSynoptic);
            } else {
                CSVRes($allRow, "add synoptic failed!", 0, addSynoptic);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
}
