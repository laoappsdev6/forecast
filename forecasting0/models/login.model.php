<?php
require_once "validate.model.php";

class LoginModel
{
    public $username;
    public $password;
    public $token;
    public function __construct($object)
    {
        validateEmptyObject($object, "Data is empty!");

        foreach ($object as $property => $value) {
            if (property_exists('LoginModel', $property)) {
                $this->$property = $value;
            }
        }
    }

    function validatelogin()
    {
        if ($this->username == "" && $this->password == "") {
            PrintJSON("", "username and password is empty", 0);
            die();
        } else if ($this->username == "") {
            PrintJSON("", "username is empty ", 0);
            die();
        } elseif ($this->password == "") {
            PrintJSON("", "password is empty ", 0);
            die();
        }
    }
}
