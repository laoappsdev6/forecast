<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

try {
    // Initialization();
    $m = getallheaders()['M'];

    $json = json_decode(file_get_contents('php://input'), true);
    $control = new UserController();

    if ($m == "addUser") {
        $model = new UserModel($json);
        $model->validateall();
        $control->addUser($model);
    } else if ($m == "updateUser") {
        $model = new UserModel($json);
        $model->checkId();
        $model->validateall();
        $control->updateUser($model);
    } else if ($m == "deleteUser") {
        $model = new UserModel($json);
        $model->checkId();
        $control->deleteUser($model);
    } else if ($m == "changePassword") {
        $model = new UserModel($json);
        $model->checkId();
        $model->validateNewPassword();
        $control->changePassword($model);
    } else if ($m == "setNewRole") {
        $model = new UserModel($json);
        $model->checkId();
        $model->validateNewRole();
        $control->setNewRole($model);
    } else if ($m == "setDisableAndEnableUser") {
        $model = new UserModel($json);
        $model->checkId();
        $control->setDisableAndEnableUser($model);
    } else if ($m == "userListPage") {
        $model = new UserModel($json);
        $control->userListPage($model);
    } else if ($m == "userListAll") {
        $control->userListALL();
    } else if ($m == "getUser") {
        $model = new UserModel($json);
        $control->getUser($model);
    } else if ($m == "createRole") {
        $model = new UserModel($json);
        $model->validateStationIdCreate();
        $control->createRole($model);
    } else if ($m == "deleteRole") {
        $model = new UserModel($json);
        $model->validateStationIdDelete();
        $control->deleteRole($model);
    } else if ($m == "countUserByRole") {
        $data = (object) $json;
        $control->countUserByRole($data);
    } else {
        PrintJSON("", "method not found!", 0);
        die();
    }
} catch (Exception $e) {
    PrintJSON("", "$e->getMessage()", 0);
}
