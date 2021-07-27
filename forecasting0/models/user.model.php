<?php

require_once "../controllers/validate.controller.php";
require_once "validate.model.php";

class UserModel
{
    public ?int $userid = 0;
    public string $username;
    public string $password;
    public string $role;
    public string $created_at;
    public string $updated_at;
    public string $isActive;

    public string $newPassword;
    public string $newRole;

    public int $station_id;

    public $page = 1;
    public $limit = 10;
    public $keyword;

    public function __construct($object, $isCheck = true)
    {
        if ($isCheck) {
            validateEmptyObject($object, "Data is empty!");
        }

        foreach ($object as $property => $value) {
            if (property_exists('UserModel', $property)) {
                $this->$property = $value;
            }
        }

        $this->created_at = dateTime();
        $this->updated_at = dateTime();
    }

    public function validateAll()
    {
        foreach ($this as $property => $value) {
            $this->validate($property);
        }
    }

    public function checkId()
    {
        $sql = "select * from users where id='$this->userid'";
        validateNotAvailable($sql, "User id {$this->userid} is not available");
    }

    public function validate($p)
    {
        switch ($p) {
            case 'username':
                validateEmpty($this->username, "Username is empty!");
                $sql = "select * from users where username='$this->username' and id !='$this->userid'";
                validateAlreadyExist($sql, "Username {$this->username} already exists!");
                break;
            case 'password':
                validateEmpty($this->password, "Password is empty!");
                break;
            case 'role':
                validateEmpty($this->role, "Role is empty!");
                break;
        }
    }

    public function validateNewPassword()
    {
        validateEmpty($this->newPassword, "New password is empty!");
    }

    public function validateNewRole()
    {
        validateEmpty($this->newRole, "New role is empty!");
    }

    public function validateStationIdCreate()
    {
        $sql = "select * from role_detail where station_id='$this->station_id' and userid='$this->userid'";
        validateAlreadyExist($sql, "station_id: {$this->station_id} for user: {$this->userid} already exists");
    }

    public function validateStationIdDelete()
    {
        $sql = "select * from role_detail where station_id='$this->station_id' and userid='$this->userid'";
        validateNotAvailable($sql, "station_id: {$this->station_id} for user: {$this->userid} not exists");
    }
}
