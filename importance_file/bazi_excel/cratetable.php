<?php


$locations = "create table locations(id int,
city varchar(30),
lat float,
longs  float,
gmt int,
dst int,
country VARCHAR(50),
admin VARCHAR(50)
);";

$user_info = "create table user_info(id int,"
        . "name varchar(50),"
        . "birthdate datetime,"
        . "gender char(1),"
        . "born_type char(1),"
        . "living_type char(1),"
        . "is_dst boolean,"
        . "location_id int);";

$conn = new PDO("mysql:host=localhost;dbname=bazi;charset=utf8","root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $conn->query($locations);
$query = $conn->query($user_info);


echo $user_info;