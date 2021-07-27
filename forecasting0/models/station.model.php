<?php

require_once "../controllers/validate.controller.php";
require_once "validate.model.php";

class StationModel
{
    public ?int $id = 0;
    public string $station_number;
    public string $station_model;
    public string $station_phonenumber;
    public string $name_lao;
    public string $name_eng;
    public string $type;
    public string $lng;
    public string $lat;
    public string $alt;
    public string $part;

    public $page = 1;
    public $limit = 10;
    public $keyword;

    public function __construct($object)
    {
        validateEmptyObject($object, "Data is empty!");

        foreach ($object as $property => $value) {
            if (property_exists('StationModel', $property)) {
                $this->$property = $value;
            }
        }
    }

    public function validateAll()
    {
        foreach ($this as $property => $value) {
            $this->validate($property);
        }
    }

    public function checkId()
    {
        $sql = "select * from station where id='$this->id'";
        validateNotAvailable($sql, "Id {$this->id} is not available");
    }

    public function validatePart()
    {
        validateEmpty($this->part, "Part is empty!");
    }

    public function validate($p)
    {
        switch ($p) {
            case 'station_number':
                validateEmpty($this->station_number, "Station is empty!");
                $sql = "select * from station where station_number = '$this->station_number' and id != '$this->id'";
                validateAlreadyExist($sql, "Station number: {$this->station_number} already exists!");
                break;
            case 'name_lao':
                validateEmpty($this->name_lao,  "Name lao is empty!");
                break;
            case 'name_eng':
                validateEmpty($this->name_eng, "Name eng is empty!");
                break;
            case 'type':
                validateEmpty($this->type, "Type is empty!");
                break;
            case 'lng':
                validateEmpty($this->lng, "Lng is empty!");
                break;
            case 'lat':
                validateEmpty($this->lat, "Lat is empty!");
                break;
            case 'alt':
                validateEmpty($this->alt, "Alt is empty!");
                break;
            case 'part':
                validateEmpty($this->part, "Part is empty!");
                break;
            case 'station_model':
                validateEmpty($this->station_model, "Station model is empty!");
                break;
            case 'station_phonenumber':
                validateEmpty($this->station_phonenumber, "Station phonenumber is empty!");
                break;
        }
    }
}
