<?php
require_once "../services/services.php";
require_once 'database.controller.php';
require_once "user.controller.php";

class SynopticController
{
    public function __construct()
    {
    }

    public function addSynoptic($get)
    {
        try {
            $db = new DatabaseController();
            $sql = "insert into synoptic (time,avg_wind_speed,avg_wind_direction,wind_gust,air_temperature,relative_humidity,air_pressure,
                    dewpoint,metpak_status,net_radiation,rain_tips,rain_fall,ext_batt,moisture,modern_signal,station_id)
                    values ('$get->time','$get->avg_wind_speed', '$get->avg_wind_direction', '$get->wind_gust', '$get->air_temperature', '$get->relative_humidity', '$get->air_pressure',
                    $get->dewpoint, '$get->metpak_status', '$get->net_radiation', '$get->rain_tips', '$get->rain_fall','$get->ext_batt','$get->moisture','$get->modern_signal','$get->station_id')";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "Add synoptic successfully", 1);
            } else {
                PrintJSON("", "add synoptic failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function synopticListAll()
    {
        try {
            $db = new DatabaseController();

            $userid = $_SESSION['userid'];

            $sql = "select * from users where id = '$userid' and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {
                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                        INNER JOIN station as s ON h.station_id = s.id order by h.id desc";
                    $data = $db->query($sql);
                    PrintJSON($data, "Data list all of synoptic", 1);
                } else {
                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where h.station_id IN ($detail) order by h.id desc";
                    $data = $db->query($sql);

                    PrintJSON($data, "Data list all of synoptic", 1);
                }
            } else {
                PrintJSON("", "You have no authorize!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function synopticListPage($get)
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
                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id where h.id IN (select max(id) from synoptic group by station_id)  ";

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

                            if ($data > 0) {

                                for ($i = 0; $i < count($data); $i++) {
                                    $dateTime = strtotime($data[$i]['time']);
                                    $date = date('Y-m-d', $dateTime);

                                    $sqlMax = "select max(air_temperature) as max_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMax = $db->query($sqlMax);
                                    $data[$i]['max_air_temperature'] = $dataMax[0]['max_air_temperature'];


                                    $sqlMin = "select min(air_temperature) as min_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMin = $db->query($sqlMin);
                                    $data[$i]['min_air_temperature'] = $dataMin[0]['min_air_temperature'];


                                    // $sqlDetail = "select * from synoptic where date(time) = '$date' order by id desc";
                                    // $dataDetail = $db->query($sqlDetail);
                                    // $data[$i]['children'] = $dataDetail;
                                }
                            }

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
                    PrintJSON($json, "Data list page of synoptic", 1);
                } else {
                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where h.station_id IN ($detail) and h.id IN (select max(id) from synoptic group by station_id) ";

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
                            if ($data > 0) {

                                for ($i = 0; $i < count($data); $i++) {
                                    $dateTime = strtotime($data[$i]['time']);
                                    $date = date('Y-m-d', $dateTime);

                                    $sqlMax = "select max(air_temperature) as max_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMax = $db->query($sqlMax);
                                    $data[$i]['max_air_temperature'] = $dataMax[0]['max_air_temperature'];


                                    $sqlMin = "select min(air_temperature) as min_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMin = $db->query($sqlMin);
                                    $data[$i]['min_air_temperature'] = $dataMin[0]['min_air_temperature'];


                                    // $sqlDetail = "select * from synoptic where date(time) = '$date' order by id desc";
                                    // $dataDetail = $db->query($sqlDetail);
                                    // $data[$i]['children'] = $dataDetail;
                                }
                            }
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
                    PrintJSON($json, "Data list page of synoptic", 1);
                }
            } else {
                PrintJSON("", "User id: {$userid} is not available!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function synopticListPageByPart($get)
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
                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id where h.id IN (select max(id) from synoptic group by station_id 
                    HAVING station_id IN (select id from station where part='$get->part'))  ";

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

                            if ($data > 0) {

                                for ($i = 0; $i < count($data); $i++) {
                                    $dateTime = strtotime($data[$i]['time']);
                                    $date = date('Y-m-d', $dateTime);

                                    $sqlMax = "select max(air_temperature) as max_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMax = $db->query($sqlMax);
                                    $data[$i]['max_air_temperature'] = $dataMax[0]['max_air_temperature'];


                                    $sqlMin = "select min(air_temperature) as min_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMin = $db->query($sqlMin);
                                    $data[$i]['min_air_temperature'] = $dataMin[0]['min_air_temperature'];


                                    // $sqlDetail = "select * from synoptic where date(time) = '$date' order by id desc";
                                    // $dataDetail = $db->query($sqlDetail);
                                    // $data[$i]['children'] = $dataDetail;
                                }
                            }

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
                    PrintJSON($json, "Data list page of synoptic", 1);
                } else {
                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where h.station_id IN ($detail) and h.id IN (select max(id) from synoptic group by station_id 
                    HAVING station_id IN (select id from station where part='$get->part'))";

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
                            if ($data > 0) {

                                for ($i = 0; $i < count($data); $i++) {
                                    $dateTime = strtotime($data[$i]['time']);
                                    $date = date('Y-m-d', $dateTime);

                                    $sqlMax = "select max(air_temperature) as max_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMax = $db->query($sqlMax);
                                    $data[$i]['max_air_temperature'] = $dataMax[0]['max_air_temperature'];


                                    $sqlMin = "select min(air_temperature) as min_air_temperature from synoptic where date(time) = '$date' ";
                                    $dataMin = $db->query($sqlMin);
                                    $data[$i]['min_air_temperature'] = $dataMin[0]['min_air_temperature'];


                                    // $sqlDetail = "select * from synoptic where date(time) = '$date' order by id desc";
                                    // $dataDetail = $db->query($sqlDetail);
                                    // $data[$i]['children'] = $dataDetail;
                                }
                            }
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
                    PrintJSON($json, "Data list page of synoptic", 1);
                }
            } else {
                PrintJSON("", "User id: {$userid} is not available!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function synopticListByTime($get)
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

                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
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
                    PrintJSON($json, "Data list page by time of synoptic", 1);
                } else {

                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
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
                    PrintJSON($json, "Data list page by time of synoptic", 1);
                }
            } else {
                PrintJSON("", "User id: {$get->userid} is not available!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function synopticListByStation($get)
    {
        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
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

                    if ($data > 0) {

                        for ($i = 0; $i < count($data); $i++) {
                            $dateTime = strtotime($data[$i]['time']);
                            $date = date('Y-m-d', $dateTime);

                            $sqlMax = "select max(air_temperature) as max_air_temperature from synoptic where date(time) = '$date' ";
                            $dataMax = $db->query($sqlMax);
                            $data[$i]['max_air_temperature'] = $dataMax[0]['max_air_temperature'];


                            $sqlMin = "select min(air_temperature) as min_air_temperature from synoptic where date(time) = '$date' ";
                            $dataMin = $db->query($sqlMin);
                            $data[$i]['min_air_temperature'] = $dataMin[0]['min_air_temperature'];


                            // $sqlDetail = "select * from synoptic where date(time) = '$date' order by id desc";
                            // $dataDetail = $db->query($sqlDetail);
                            // $data[$i]['children'] = $dataDetail;
                        }
                    }
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
            PrintJSON($json, "Data list page by station of synoptic", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function synopticListByStationLatLng($get)
    {
        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id where h.id IN (select max(id) from synoptic group by date(time)) 
                   and  lat='$get->lat' and lng='$get->lng' ";

            $sql_page = " order by h.id desc limit $get->limit offset $offset";
            // echo $sql . $sql_page; 
            // die();
            $doquery = $db->query($sql);
            if ($doquery > 0) {
                $count = sizeof($doquery);
                if ($count > 0) {
                    $data = $db->query($sql . $sql_page);

                    if ($data > 0) {

                        for ($i = 0; $i < count($data); $i++) {
                            $dateTime = strtotime($data[$i]['time']);
                            $date = date('Y-m-d', $dateTime);

                            $sqlMax = "select max(air_temperature) as max_air_temperature from synoptic where date(time) = '$date' ";
                            $dataMax = $db->query($sqlMax);
                            $data[$i]['max_air_temperature'] = $dataMax[0]['max_air_temperature'];


                            $sqlMin = "select min(air_temperature) as min_air_temperature from synoptic where date(time) = '$date' ";
                            $dataMin = $db->query($sqlMin);
                            $data[$i]['min_air_temperature'] = $dataMin[0]['min_air_temperature'];


                            // $sqlDetail = "select * from synoptic where date(time) = '$date' order by id desc";
                            // $dataDetail = $db->query($sqlDetail);
                            // $data[$i]['children'] = $dataDetail;
                        }
                    }
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
            PrintJSON($json, "Data list page by station Lat Lng of synoptic", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function synopticListByTimeAndStation($get)
    {
        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
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
            PrintJSON($json, "Data list page by time and station of synoptic", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function synopticListByTimeAndStationLatLng($get)
    {
        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select h.*,s.id as sid,s.station_number,name_lao,name_eng,type,lat,lng,alt from synoptic as h
                    INNER JOIN station as s ON h.station_id = s.id
                    where lat='$get->lat' and lng='$get->lng' and (time between '$get->startTime' and '$get->endTime')";

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
            PrintJSON($json, "Data list page by time and station of synoptic", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function SynopticListAllByTimeAndStationForGraph($get)
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

            $sql = "select time,{$column} from synoptic where station_id='$get->station_id' and (time between '$get->startTime' and '$get->endTime') order by time asc";

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


    public function synopticChilldrenOfStationByPart($get)
    {
        try {
            $userid = $_SESSION['userid'];

            $db = new DatabaseController();

            $sql = "select * from users where id = '$userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $sq1 = "select * from station where part='$get->part' and type IN ('SYNOPTIC', 'CLIMATE') ";
                    $data1 = $db->query($sq1);

                    if ($data1) {


                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from synoptic where station_id='$stationId' order by time desc  limit 1";
                            $data2 = $db->query($sql2);

                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['avg_wind_speed'] = $data2[0]['avg_wind_speed'];
                                $data1[$i]['avg_wind_direction'] = $data2[0]['avg_wind_direction'];
                                $data1[$i]['wind_gust'] = $data2[0]['wind_gust'];
                                $data1[$i]['wind_status'] = $data2[0]['wind_status'];
                                $data1[$i]['air_temperature'] = $data2[0]['air_temperature'];
                                $data1[$i]['relative_humidity'] = $data2[0]['relative_humidity'];
                                $data1[$i]['air_pressure'] = $data2[0]['air_pressure'];
                                $data1[$i]['dewpoint'] = $data2[0]['dewpoint'];
                                $data1[$i]['metpak_status'] = $data2[0]['metpak_status'];
                                $data1[$i]['net_radiation'] = $data2[0]['net_radiation'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $data2[0]['station_id'];
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['avg_wind_speed'] = '0';
                                $data1[$i]['avg_wind_direction'] = '0';
                                $data1[$i]['wind_gust'] = '0';
                                $data1[$i]['wind_status'] = '0';
                                $data1[$i]['air_temperature'] = '0';
                                $data1[$i]['relative_humidity'] = '0';
                                $data1[$i]['air_pressure'] = '0';
                                $data1[$i]['dewpoint'] = '0';
                                $data1[$i]['metpak_status'] = '0';
                                $data1[$i]['net_radiation'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
                                $data1[$i]['ext_batt'] = '0';
                                $data1[$i]['moisture'] = '0';
                                $data1[$i]['modern_signal'] = '0';
                            }
                        }

                        PrintJSON($data1, "Data Chill of Satation", 1);
                    } else {
                        PrintJSON([], "Sorry, have no Station", 0);
                    }
                } else {
                    $user = new Usercontroller();
                    $detail = $user->getRoleDetail($userid);


                    $sq1 = "select * from station where id IN ($detail) and part='$get->part' and type IN ('SYNOPTIC', 'CLIMATE')";
                    $data1 = $db->query($sq1);

                    if ($data1) {

                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from synoptic where station_id='$stationId' order by time desc  limit 1";
                            $data2 = $db->query($sql2);

                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['avg_wind_speed'] = $data2[0]['avg_wind_speed'];
                                $data1[$i]['avg_wind_direction'] = $data2[0]['avg_wind_direction'];
                                $data1[$i]['wind_gust'] = $data2[0]['wind_gust'];
                                $data1[$i]['wind_status'] = $data2[0]['wind_status'];
                                $data1[$i]['air_temperature'] = $data2[0]['air_temperature'];
                                $data1[$i]['relative_humidity'] = $data2[0]['relative_humidity'];
                                $data1[$i]['air_pressure'] = $data2[0]['air_pressure'];
                                $data1[$i]['dewpoint'] = $data2[0]['dewpoint'];
                                $data1[$i]['metpak_status'] = $data2[0]['metpak_status'];
                                $data1[$i]['net_radiation'] = $data2[0]['net_radiation'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $data2[0]['station_id'];
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['avg_wind_speed'] = '0';
                                $data1[$i]['avg_wind_direction'] = '0';
                                $data1[$i]['wind_gust'] = '0';
                                $data1[$i]['wind_status'] = '0';
                                $data1[$i]['air_temperature'] = '0';
                                $data1[$i]['relative_humidity'] = '0';
                                $data1[$i]['air_pressure'] = '0';
                                $data1[$i]['dewpoint'] = '0';
                                $data1[$i]['metpak_status'] = '0';
                                $data1[$i]['net_radiation'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
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

    public function synopticChilldrenOfStation($get)
    {
        try {
            $userid = $_SESSION['userid'];

            $db = new DatabaseController();

            $sql = "select * from users where id = '$userid'  and isActive = 1";
            $data = $db->query($sql);

            if ($data > 0) {
                $role = $data[0]['role'];

                if ($role == 'admin') {

                    $sq1 = "select * from station where type IN ('SYNOPTIC', 'CLIMATE')";
                    $data1 = $db->query($sq1);

                    if ($data1) {

                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from synoptic where station_id='$stationId' order by time desc  limit 1 ";
                            $data2 = $db->query($sql2);

                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['avg_wind_speed'] = $data2[0]['avg_wind_speed'];
                                $data1[$i]['avg_wind_direction'] = $data2[0]['avg_wind_direction'];
                                $data1[$i]['wind_gust'] = $data2[0]['wind_gust'];
                                $data1[$i]['wind_status'] = $data2[0]['wind_status'];
                                $data1[$i]['air_temperature'] = $data2[0]['air_temperature'];
                                $data1[$i]['relative_humidity'] = $data2[0]['relative_humidity'];
                                $data1[$i]['air_pressure'] = $data2[0]['air_pressure'];
                                $data1[$i]['dewpoint'] = $data2[0]['dewpoint'];
                                $data1[$i]['metpak_status'] = $data2[0]['metpak_status'];
                                $data1[$i]['net_radiation'] = $data2[0]['net_radiation'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $stationId;
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['avg_wind_speed'] = '0';
                                $data1[$i]['avg_wind_direction'] = '0';
                                $data1[$i]['wind_gust'] = '0';
                                $data1[$i]['wind_status'] = '0';
                                $data1[$i]['air_temperature'] = '0';
                                $data1[$i]['relative_humidity'] = '0';
                                $data1[$i]['air_pressure'] = '0';
                                $data1[$i]['dewpoint'] = '0';
                                $data1[$i]['metpak_status'] = '0';
                                $data1[$i]['net_radiation'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
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


                    $sq1 = "select * from station where id IN ($detail) and  type IN ('SYNOPTIC', 'CLIMATE')";
                    $data1 = $db->query($sq1);


                    if ($data1) {


                        for ($i = 0; $i < count($data1); $i++) {
                            $stationId = $data1[$i]['id'];
                            $sql2 = "select * from synoptic where station_id='$stationId' order by time desc  limit 1";
                            $data2 = $db->query($sql2);

                            if ($data2) {
                                $data1[$i]['time'] = $data2[0]['time'];
                                $data1[$i]['avg_wind_speed'] = $data2[0]['avg_wind_speed'];
                                $data1[$i]['avg_wind_direction'] = $data2[0]['avg_wind_direction'];
                                $data1[$i]['wind_gust'] = $data2[0]['wind_gust'];
                                $data1[$i]['wind_status'] = $data2[0]['wind_status'];
                                $data1[$i]['air_temperature'] = $data2[0]['air_temperature'];
                                $data1[$i]['relative_humidity'] = $data2[0]['relative_humidity'];
                                $data1[$i]['air_pressure'] = $data2[0]['air_pressure'];
                                $data1[$i]['dewpoint'] = $data2[0]['dewpoint'];
                                $data1[$i]['metpak_status'] = $data2[0]['metpak_status'];
                                $data1[$i]['net_radiation'] = $data2[0]['net_radiation'];
                                $data1[$i]['rain_tips'] = $data2[0]['rain_tips'];
                                $data1[$i]['rain_fall'] = $data2[0]['rain_fall'];
                                $data1[$i]['ext_batt'] = $data2[0]['ext_batt'];
                                $data1[$i]['moisture'] = $data2[0]['moisture'];
                                $data1[$i]['modern_signal'] = $data2[0]['modern_signal'];
                                $data1[$i]['station_id'] = $stationId;
                            } else {
                                $data1[$i]['time'] = '0';
                                $data1[$i]['avg_wind_speed'] = '0';
                                $data1[$i]['avg_wind_direction'] = '0';
                                $data1[$i]['wind_gust'] = '0';
                                $data1[$i]['wind_status'] = '0';
                                $data1[$i]['air_temperature'] = '0';
                                $data1[$i]['relative_humidity'] = '0';
                                $data1[$i]['air_pressure'] = '0';
                                $data1[$i]['dewpoint'] = '0';
                                $data1[$i]['metpak_status'] = '0';
                                $data1[$i]['net_radiation'] = '0';
                                $data1[$i]['rain_tips'] = '0';
                                $data1[$i]['rain_fall'] = '0';
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
}
