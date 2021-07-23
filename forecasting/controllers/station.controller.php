<?php
require_once "../services/services.php";
require_once 'database.controller.php';
require_once 'user.controller.php';


class StationController
{
    public function __construct()
    {
    }

    public function addStation($get)
    {
        try {
            $db = new DatabaseController();
            $sql = "insert into station (station_number,station_model,station_phonenumber,name_lao,name_eng,type,lng,lat,alt,part)
                     values ('$get->station_number','$get->station_model','$get->station_phonenumber','$get->name_lao','$get->name_eng','$get->type','$get->lng','$get->lat','$get->alt','$get->part')";
            // echo $sql;
            // die();
            $data = $db->query($sql);
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
    public function updateStation($get)
    {
        try {
            $db = new DatabaseController();
            $sql = "update station set station_number='$get->station_number', station_model='$get->station_model', station_phonenumber='$get->station_phonenumber',
                     name_lao='$get->name_lao', name_eng='$get->name_eng',
                    type='$get->type', lng='$get->lng', lat='$get->lat', alt='$get->alt',part='$get->part' where id='$get->id'";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "update station successfully", 1);
            } else {
                PrintJSON("", "update station failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function setNewPart($get)
    {
        try {
            $db = new DatabaseController();

            $sql = "update station set part='$get->part' where id='$get->id'";
            $data = $db->query($sql);

            if ($data) {
                PrintJSON("", "set part station successfully", 1);
            } else {
                PrintJSON("", "set part station failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function deleteStation($get)
    {
        try {
            $db = new DatabaseController();
            $sql = "delete from station where id='$get->id'";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "Station id: {$get->id} delete successfully", 1);
            } else {
                PrintJSON("", "delete station failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function getStation($get)
    {
        try {
            $db = new DatabaseController();
            $sql = "select * from station where id='$get->id'";
            $data = $db->query($sql);

            PrintJSON($data, "Data list one of station", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function stationListAll()
    {
        try {
            $db = new DatabaseController();
            $sql = "select * from station order by id desc";
            $data = $db->query($sql);
            PrintJSON($data, "Data list all of station", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function stationListPage($get)
    {
        try {
            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select * from station ";
            if (isset($get->keyword) && $get->keyword != "") {
                $sql .= "where
                        station_number like '%$get->keyword%' or
                        name_lao like '%$get->keyword%' or
                        name_eng like '%$get->keyword%'
                          ";
            }
            $sql_page = " order by id desc limit $get->limit offset $offset";
            // echo $sql.$sql_page;die();
            $doquery = $db->query($sql);
            if ($doquery > 0) {
                $count = sizeof($doquery);
                if ($count > 0) {
                    $data = $db->query($sql . $sql_page);
                    $list1 = json_encode($data);
                }
            } else {
                $list1 = json_encode([]);
                $count = 0;
            }

            $number_count = $count;
            $total_page = ceil($number_count / $get->limit);
            $list3 = json_encode($total_page);
            $json = "{  \"Data\":$list1,
                        \"Page\":$get->page,
                        \"Pagetotal\":$list3,
                        \"Datatotal\":$number_count
                    }";
            PrintJSON($json, "Data list page of station", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function stationListPageByUser($get)
    {


        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);
            $sql = "select * from users where id = '$get->userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $db = new DatabaseController();
                    $sql = "select * from station ";
                    if (isset($get->keyword) && $get->keyword != "") {
                        $sql .= "where
                        station_number like '%$get->keyword%' or
                        name_lao like '%$get->keyword%' or
                        name_eng like '%$get->keyword%'
                          ";
                    }
                    $sql_page = " order by id desc limit $get->limit offset $offset";
                    // echo $sql.$sql_page;die();
                    $doquery = $db->query($sql);
                    if ($doquery > 0) {
                        $count = sizeof($doquery);
                        if ($count > 0) {
                            $data = $db->query($sql . $sql_page);
                            $list1 = json_encode($data);
                        }
                    } else {
                        $list1 = json_encode([]);
                        $count = 0;
                    }

                    $number_count = $count;
                    $total_page = ceil($number_count / $get->limit);
                    $list3 = json_encode($total_page);
                    $json = "{  \"Data\":$list1,
                        \"Page\":$get->page,
                        \"Pagetotal\":$list3,
                        \"Datatotal\":$number_count
                    }";
                    PrintJSON($json, "Data list page by User of station", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($get->userid);

                    $db = new DatabaseController();
                    $sql = "select * from station where id IN ($detail)";
                    if (isset($get->keyword) && $get->keyword != "") {
                        $sql .= "and (
                        station_number like '%$get->keyword%' or
                        name_lao like '%$get->keyword%' or
                        name_eng like '%$get->keyword%' )
                          ";
                    }
                    $sql_page = " order by id desc limit $get->limit offset $offset";
                    // echo $sql.$sql_page;die();
                    $doquery = $db->query($sql);
                    if ($doquery > 0) {
                        $count = sizeof($doquery);
                        if ($count > 0) {
                            $data = $db->query($sql . $sql_page);
                            $list1 = json_encode($data);
                        }
                    } else {
                        $list1 = json_encode([]);
                        $count = 0;
                    }

                    $number_count = $count;
                    $total_page = ceil($number_count / $get->limit);
                    $list3 = json_encode($total_page);
                    $json = "{  \"Data\":$list1,
                        \"Page\":$get->page,
                        \"Pagetotal\":$list3,
                        \"Datatotal\":$number_count
                    }";
                    PrintJSON($json, "Data list page by User of station", 1);
                }
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function stationListAllByUser($get)
    {


        try {

            $db = new DatabaseController();

            $sql = "select * from users where id = '$get->userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $db = new DatabaseController();
                    $sql = "select * from station order by id desc ";
                    $data = $db->query($sql);
                    PrintJSON($data, "Data list all of station", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($get->userid);

                    $db = new DatabaseController();
                    $sql = "select * from station where id IN ($detail) order by id desc";
                    $data = $db->query($sql);

                    PrintJSON($data, "Data list by user of station", 1);
                }
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function stationListPageByPart($get)
    {
        try {

            $db = new DatabaseController();


            $offset = (($get->page - 1) * $get->limit);

            $sql = "select * from station where part='$get->part' ";
            if (isset($get->keyword) && $get->keyword != "") {
                $sql .= "and (
                        station_number like '%$get->keyword%' or
                        name_lao like '%$get->keyword%' or
                        name_eng like '%$get->keyword%' )
                          ";
            }
            $sql_page = " order by id desc limit $get->limit offset $offset";
            // echo $sql.$sql_page;die();
            $doquery = $db->query($sql);
            if ($doquery > 0) {
                $count = sizeof($doquery);
                if ($count > 0) {
                    $data = $db->query($sql . $sql_page);
                    $list1 = json_encode($data);
                }
            } else {
                $list1 = json_encode([]);
                $count = 0;
            }

            $number_count = $count;
            $total_page = ceil($number_count / $get->limit);
            $list3 = json_encode($total_page);
            $json = "{  \"Data\":$list1,
                        \"Page\":$get->page,
                        \"Pagetotal\":$list3,
                        \"Datatotal\":$number_count
                    }";
            PrintJSON($json, "Data list page by User of station", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }


    public function stationSynopticListAllByUser($get)
    {


        try {

            $db = new DatabaseController();

            $sql = "select * from users where id = '$get->userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $db = new DatabaseController();
                    $sql = "select * from station where type IN ('SYNOPTIC', 'CLIMATE') order by id desc ";
                    $data = $db->query($sql);
                    PrintJSON($data, "Data list all of station", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($get->userid);

                    $db = new DatabaseController();
                    $sql = "select * from station where type IN ('SYNOPTIC', 'CLIMATE') and id IN ($detail) order by id desc";
                    $data = $db->query($sql);

                    PrintJSON($data, "Data list by user of station", 1);
                }
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function stationHydrologyListAllByUser($get)
    {


        try {

            $db = new DatabaseController();

            $sql = "select * from users where id = '$get->userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $db = new DatabaseController();
                    $sql = "select * from station where type IN ('Hydrology', 'Rain Gauge') order by id desc ";
                    $data = $db->query($sql);
                    PrintJSON($data, "Data list all of station", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($get->userid);

                    $db = new DatabaseController();
                    $sql = "select * from station where type IN ('Hydrology', 'Rain Gauge') and id IN ($detail) order by id desc";
                    $data = $db->query($sql);

                    PrintJSON($data, "Data list by user of station", 1);
                }
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
}
