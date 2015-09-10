<?php
$con = new Install();

$con->__setTable('users');
$arr_row = array(
    'id'            => 'integer auto_increment',
    'first_name'    =>'VARCHAR(50)',
    'last_name'     =>'VARCHAR(50)',
    'email'         =>'VARCHAR(50) NOT NULL UNIQUE',
    'password'      =>'VARCHAR(50)',
    'phone'         =>'VARCHAR(50)',
    'country'       =>'VARCHAR(50)',
    'post_code'     =>'VARCHAR(50)',
    'town'          =>'VARCHAR(50)',    
    'street'        =>'VARCHAR(50)',
    'active'        =>'VARCHAR(50)',
    'pref'          =>'VARCHAR(50)',
    'create_data'   =>'DATETIME NOT NULL',
    'update_data'   =>'DATETIME NOT NULL',
    'facebook_id'   =>'INT',
    'facebook_link' =>'VARCHAR(100)'
    );
$arr_val = array();
$return = $con->createTableAndRows($arr_row, $arr_val);

unset($con);

header("Location: index.php?feedback=install");