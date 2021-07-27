<?php
require_once "../services/services.php";
require_once 'database.controller.php';
require_once 'databasePDO.controller.php';

class UserController
{
    public function __construct()
    {
    }

    public function addUser($u)
    {
        try {
            $db = new DatabaseController();
            $sql = "insert into users (username,password,role,created_at,updated_at,isActive) values ('$u->username','$u->password','$u->role','$u->created_at','$u->updated_at','$u->isActive')";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "Add user successfully", 1);
            } else {
                PrintJSON("", "add user failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function updateUser($u)
    {
        try {
            $db = new DatabaseController();
            $sql = "update users set username='$u->username',password='$u->password',role='$u->role',isActive='$u->isActive',updated_at='$u->updated_at' where id='$u->userid'";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "update user successfully", 1);
            } else {
                PrintJSON("", "update user failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function deleteUser($u)
    {
        try {
            $db = new DatabaseController();
            $sql = "delete from users where id='$u->userid'";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "User id: {$u->userid} delete successfully", 1);
            } else {
                PrintJSON("", "delete user failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function changePassword($u)
    {
        try {
            $db = new DatabaseController();
            $sql = "update users set password='$u->newPassword' where id='$u->userid'";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "Change password successfully", 1);
            } else {
                PrintJSON("", "Change password failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
    public function setNewRole($u)
    {
        try {
            $db = new DatabaseController();
            $sql = "update users set role='$u->newRole' where id='$u->userid'";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "set New Role successfully", 1);
            } else {
                PrintJSON("", "set New Role failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function setDisableAndEnableUser($u)
    {
        try {
            $db = new DatabaseController();
            $sql = "update users set isActive='$u->isActive' where id='$u->userid'";
            $data = $db->query($sql);
            if ($data) {
                if ($u->isActive) {
                    PrintJSON(["proceed" => "start"], "User was updated", 1);
                } else {
                    PrintJSON(["proceed" => "stop"], "User was updated", 1);
                }
            } else {
                PrintJSON("", "User update failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function getUser($u)
    {
        try {
            $db = new DatabaseController();
            $sql = "select * from users where id='$u->userid'";
            $data = $db->query($sql);
            $id = $data[0]['id'];

            $sql2 = "select s.* from station as s
                    INNER JOIN role_detail as r ON s.station_id = r.station_id
                    where r.userid='$id' ";
            $data2 = $db->query($sql2);

            $data[0]['role_detail'] = $data2;

            PrintJSON($data, "Data list one of user", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function userListAll()
    {
        try {
            $db = new DatabaseController();
            $sql = "select * from users";
            $data = $db->query($sql);
            PrintJSON($data, "Data list all of user", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function userListPage($get)
    {
        try {

            $db = new DatabaseController();

            $offset = (($get->page - 1) * $get->limit);

            $sql = "select * from users ";

            if (isset($get->keyword) && $get->keyword != "") {
                $sql .= " where
                        username like '%$get->keyword%' or
                        role like '%$get->keyword%'
                          ";
            }

            $sql_page = " order by id desc limit $get->limit offset $offset";
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
            PrintJSON($json, "Data list page of user", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function createRole($get)
    {
        try {

            $db = new DatabaseController();

            $sql = "insert into role_detail (userid,station_id,created_at,updated_at)
                        values ('$get->userid','$get->station_id','$get->created_at','$get->updated_at')";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "Create Role successfully", 1);
            } else {
                PrintJSON("", "Create Role failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function deleteRole($get)
    {
        try {

            $db = new DatabaseController();

            $sql = "delete from role_detail where station_id='$get->station_id' and userid='$get->userid'";
            $data = $db->query($sql);
            if ($data) {
                PrintJSON("", "Delete Role successfully", 1);
            } else {
                PrintJSON("", "Delete Role failed!", 0);
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function getRoleDetail($id = 0)
    {
        try {
            $db = new DatabaseController();
            $userid = $id == 0 ? $_SESSION['userid'] : $id;

            $sql = "select s.* from station as s
                    INNER JOIN role_detail as r ON s.id = r.station_id
                    where r.userid='$userid' ";
            $data = $db->query($sql);

            if ($data > 0) {
                $detail = "";
                for ($i = 0; $i < count($data); $i++) {
                    $station = $data[$i]['id'];
                    if ($i == count($data) - 1) {
                        $detail .= "$station";
                    } else {
                        $detail .= "$station,";
                    }
                }
                return $detail;
            } else {
                PrintJSON("", "Sorry, You do not have access to the station!", 0);
                die();
            }
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }

    public function countUserByRole($get)
    {
        try {
            $db = new DatabaseController();

            $sql = "select count(*) as user from users where role='$get->role'";
            $data = $db->query($sql);

            PrintJSON($data, "Count users by role", 1);
        } catch (Exception $e) {
            PrintJSON("", "$e->getMessage()", 0);
        }
    }
}
