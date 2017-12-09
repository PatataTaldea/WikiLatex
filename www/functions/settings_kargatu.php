<?php
require '../config.php';
session_start();


if (isset($_POST['orria']) && $_POST['orria'] == "orokorra") {
    require '../'.SETTINGS_OROKORRA;
} else if (isset($_POST['orria']) && $_POST['orria'] == "artikuloak") {
    require '../'.SETTINGS_ARTIKULOAK;
} else if (isset($_POST['orria']) && $_POST['orria'] == "admin") {
    require '../'.SETTINGS_ADMIN;
}
?>