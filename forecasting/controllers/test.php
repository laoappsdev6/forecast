<?php
require_once "../services/services.php";
require_once 'database.controller.php';
require_once 'user.controller.php';


class StationController
{
    public function __construct()
    {
        try {
            $db = new DatabaseController();
            $sql = "select * from user";
            // echo $sql;
            // die();
            $data = $db->query($sql);
            echo $sql;
            if ($data) {
                PrintJSON("", "Add station successfully", 1);
            } else {
                PrintJSON("", "add station failed!", 0);
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            PrintJSON("", "$error", 0);
        }
    }
}
new StationController();
