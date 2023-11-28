<?php
const BASEURL = "http://localhost/Project_Tatib/public";
const MARIADB_CONFIG = [
    "host"=> "localhost",
    "user"=> "root",
    "password"=> "",
    "database"=> "Project_Uas"
];
const MARIADB_DSN = "mysql:host=" . MARIADB_CONFIG["host"] . ";dbname=" . MARIADB_CONFIG["database"];

const SQLSERVER_CONFIG = [
    "host"=> "(local)",
    "user"=> "shadow",
    "password"=> "kegelapankeseimbangan666",
    "database"=> "Project_Uas"
];
const SQLSERVER_DSN = "sqlsrv:Server=" . SQLSERVER_CONFIG["host"] . ";Database=" . SQLSERVER_CONFIG["database"];