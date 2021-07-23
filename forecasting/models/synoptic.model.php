<?php

require_once "../controllers/validate.controller.php";
require_once "validate.model.php";

class SynopticModel
{
    public ?int $id;
    public string $time;
    public string $avg_wind_speed;
    public string $avg_wind_direction;
    public string $wind_gust;
    public string $wind_status;
    public string $air_temperature;
    public string $relative_humidity;
    public string $air_pressure;
    public string $dewpoint;
    public string $metpak_status;
    public string $net_radiation;
    public string $rain_tips;
    public string $rain_fall;
    public string $ext_batt;
    public string $moisture;
    public string $modern_signal;
    public string $station_id;

    public function __construct($object)
    {
        foreach ($object as $property => $value) {
            if (property_exists('SynopticModel', $property)) {
                $this->$property = $value;
            }
        }
    }
}
