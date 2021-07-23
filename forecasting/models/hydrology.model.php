<?php

require_once "../controllers/validate.controller.php";
require_once "validate.model.php";

class HydrologyModel
{
    public ?int $id;
    public string $time;
    public string $rain_tips;
    public string $rain_fall;
    public string $water_fall;
    public string $water_temperature;
    public string $ext_batt;
    public string $moisture;
    public string $modern_signal;
    public string $station_id;

    public function __construct($object)
    {
        foreach ($object as $property => $value) {
            if (property_exists('HydrologyModel', $property)) {
                $this->$property = $value;
            }
        }
    }
}
