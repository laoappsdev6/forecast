<?php
require_once "../services/services.php";
require_once 'database.controller.php';
require_once "user.controller.php";

class HydrologyController
{
    public function __construct()
    {
    }

    public function addHydrology($get)
    {
        try {
            $db = new DatabaseController();
            $sql = "insert into hydrology (time,rain_tips,rain_fall,water_fall,water_temperature,ext_batt,moisture,modern_signal,station_id)
                     values ('$get->time','$get->rain_tips','$get->rain_fall','$get->water_fall','$get->water_temperature','$get->ext_batt',
                     '$get->moisture','$get->modern_signal','$get->station_id')";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "Add hydrology successfully", 1);
            } else {
                PrintJSON("", "add hydrology failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyListAll()
    {
        try {
            $db = new DatabaseController();

            $userid = $_SESSION['userid'];

            $sql = "select * from users where id = '$userid' and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {

                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                        INNER JOIN station as s ON h.station_id = s.id order by h.id desc";
                    $data = $db->query($sql);
                    PrintJSON($data, "Data list all of hydrology", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where h.station_id IN ($detail) order by h.id desc";
                    $data = $db->query($sql);

                    PrintJSON($data, "Data list all of hydrology", 1);
                }
            } else {
                PrintJSON("", "You have no authorize!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyListPage($get)
    {
        try {
            $userid = $_SESSION['userid'];

            $offset = (($get->page - 1) * $get->limit);

            $db = new DatabaseController();

            $sql = "select * from users where id = '$userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {

                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                    INNER JOIN station as s ON h.station_id = s.id ";

                    if (isset($get->keyword) && $get->keyword != "") {
                        $sql .= " where (
                        s.station_number like '%$get->keyword%' or
                        s.name_lao like '%$get->keyword%' or
                        s.name_eng like '%$get->keyword%'
                        )";
                    }
                    $sql_page = "order by h.id desc limit $get->limit offset $offset";
                    // echo $sql . $sql_page;
                    // die();
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
                    PrintJSON($json, "Data list page of hydrology", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where h.station_id IN ($detail)";

                    if (isset($get->keyword) && $get->keyword != "") {
                        $sql .= "and (
                        s.station_number like '%$get->keyword%' or
                        s.name_lao like '%$get->keyword%' or
                        s.name_eng like '%$get->keyword%'
                        )";
                    }
                    $sql_page = "order by h.id desc limit $get->limit offset $offset";
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
                    PrintJSON($json, "Data list page of hydrology", 1);
                }
            } else {
                PrintJSON("", "User id: {$get->userid} is not available!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyListByTime($get)
    {
        try {
            $userid = $_SESSION['userid'];

            $offset = (($get->page - 1) * $get->limit);

            $db = new DatabaseController();

            $sql = "select * from users where id = '$userid' and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {

                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where  time between '$get->startTime' and '$get->endTime' ";

                    if (isset($get->keyword) && $get->keyword != "") {
                        $sql .= " and (
                        s.station_number like '%$get->keyword%' or
                        s.name_lao like '%$get->keyword%' or
                        s.name_eng like '%$get->keyword%'
                        )";
                    }
                    $sql_page = "order by h.id desc limit $get->limit offset $offset";
                    // echo $sql . $sql_page;
                    // die();
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
                    PrintJSON($json, "Data list page by time of hydrology", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                            INNER JOIN station as s ON h.station_id = s.id
                            where h.station_id IN ($detail) and ( time between '$get->startTime' and '$get->endTime' )";

                    if (isset($get->keyword) && $get->keyword != "") {
                        $sql .= "and (
                        s.station_number like '%$get->keyword%' or
                        s.name_lao like '%$get->keyword%' or
                        s.name_eng like '%$get->keyword%'
                        )";
                    }
                    $sql_page = "order by h.id desc limit $get->limit offset $offset";
                    // echo $sql . $sql_page;
                    // die();
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
                    PrintJSON($json, "Data list page by time of hydrology", 1);
                }
            } else {
                PrintJSON("", "User id: {$userid} is not available!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyListByStation($get)
    {
        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where h.station_id='$get->station_id' ";

            $sql_page = " order by h.id desc limit $get->limit offset $offset";
            // echo $sql . $sql_page;
            // die();
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
            PrintJSON($json, "Data list page by station of hydrology", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyListByTimeAndStation($get)
    {
        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from hydrology as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where h.station_id='$get->station_id' and (time between '$get->startTime' and '$get->endTime')";

            $sql_page = "order by h.id desc limit $get->limit offset $offset";
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
            PrintJSON($json, "Data list page by time and station of hydrology", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyChilldrenOfStation($get)
    {
        try {
            $userid = $_SESSION['userid'];

            $db = new DatabaseController();

            $sql = "select * from users where id = '$userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $sq1 = "select * from station where type IN ('Hydrology', 'Rain Gauge')";
                    $data1 = $db->query($sq1);

                    if ($data1) {
                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from hydrology where station_id='$stationId' order by time desc  limit 1";
                            $data2 = $db->query($sql2);

                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['water_fall'] = $data2[0]['water_fall'];
                                $data1[$i]['water_temperature'] = $data2[0]['water_temperature'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $stationId;
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
                                $data1[$i]['water_fall'] = '0';
                                $data1[$i]['water_temperature'] = '0';
                                $data1[$i]['ext_batt'] = '0';
                                $data1[$i]['moisture'] = '0';
                                $data1[$i]['modern_signal'] = '0';
                                $data1[$i]['station_id'] = $stationId;
                            }
                        }

                        PrintJSON($data1, "Data Chill of Satation", 1);
                    } else {
                        PrintJSON([], "Sorry, have no Station", 0);
                    }
                } else {
                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sq1 = "select * from station where id IN ($detail) and type IN ('Hydrology', 'Rain Gauge')";
                    $data1 = $db->query($sq1);

                    if ($data1) {

                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from hydrology where station_id='$stationId' order by time desc  limit 1";
                            $data2 = $db->query($sql2);


                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['water_fall'] = $data2[0]['water_fall'];
                                $data1[$i]['water_temperature'] = $data2[0]['water_temperature'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $stationId;
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
                                $data1[$i]['water_fall'] = '0';
                                $data1[$i]['water_temperature'] = '0';
                                $data1[$i]['ext_batt'] = '0';
                                $data1[$i]['moisture'] = '0';
                                $data1[$i]['modern_signal'] = '0';
                                $data1[$i]['station_id'] = $stationId;
                            }
                        }

                        PrintJSON($data1, "Data Chill of Satation", 1);
                    } else {
                        PrintJSON([], "Sorry, have no Station", 0);
                    }
                }
            } else {
                PrintJSON("", "User id: {$userid} is not available!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyChilldrenOfStationByPart($get)
    {
        try {
            $userid = $_SESSION['userid'];

            $db = new DatabaseController();

            $sql = "select * from users where id = '$userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $sq1 = "select * from station where part='$get->part' and type IN ('Hydrology', 'Rain Gauge')";
                    $data1 = $db->query($sq1);

                    if ($data1) {

                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from hydrology where station_id='$stationId' order by time desc  limit 1";
                            $data2 = $db->query($sql2);

                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['water_fall'] = $data2[0]['water_fall'];
                                $data1[$i]['water_temperature'] = $data2[0]['water_temperature'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $data2[0]['station_id'];
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
                                $data1[$i]['water_fall'] = '0';
                                $data1[$i]['water_temperature'] = '0';
                                $data1[$i]['ext_batt'] = '0';
                                $data1[$i]['moisture'] = '0';
                                $data1[$i]['modern_signal'] = '0';
                                $data1[$i]['station_id'] = '0';
                            }
                        }

                        PrintJSON($data1, "Data Chill of Satation", 1);
                    } else {
                        PrintJSON([], "Sorry, have no Station", 0);
                    }
                } else {
                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sq1 = "select * from station where id IN ($detail) and part='$get->part' and type IN ('Hydrology', 'Rain Gauge')";
                    $data1 = $db->query($sq1);

                    if ($data1) {

                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from hydrology where station_id='$stationId' order by time desc  limit 1";
                            $data2 = $db->query($sql2);

                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['water_fall'] = $data2[0]['water_fall'];
                                $data1[$i]['water_temperature'] = $data2[0]['water_temperature'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $data2[0]['station_id'];
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
                                $data1[$i]['water_fall'] = '0';
                                $data1[$i]['water_temperature'] = '0';
                                $data1[$i]['ext_batt'] = '0';
                                $data1[$i]['moisture'] = '0';
                                $data1[$i]['modern_signal'] = '0';
                                $data1[$i]['station_id'] = '0';
                            }
                        }

                        PrintJSON($data1, "Data Chill of Satation", 1);
                    } else {
                        PrintJSON([], "Sorry, have no Station", 0);
                    }
                }
            } else {
                PrintJSON("", "User id: {$userid} is not available!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function hydrologyAllByTimeAndStationForGraph($get)
    {
        try {
            $column = "";
            $myColumn = count($get->myColumn) > 0 ? $get->myColumn : [];

            for ($i = 0; $i < count($myColumn); $i++) {

                $name = $myColumn[$i];

                if ($i == count($myColumn) - 1) {
                    $column .= $name;
                } else {
                    $column .=  $name . ',';
                }
            }

            $db = new DatabaseController();

            $sql = "select time,{$column} from hydrology where station_id='$get->station_id' and (time between '$get->startTime' and '$get->endTime') order by time asc";

            $data = $db->query($sql);

            $json = array("key" => $get->myColumn, "value" => $data);
            $json = json_encode($json);
            if ($data) {
                PrintJSON($json, "Data for graph", 1);
            } else {
                PrintJSON([], "Sorry, have no data", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
}
