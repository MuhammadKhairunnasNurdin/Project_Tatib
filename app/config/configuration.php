<?php
const BASEURL = "http://localhost/Project_Tatib/public";
const MARIADB_CONFIG = [
    "host"=> "localhost",
    "user"=> "root",
    "password"=> "",
    "database"=> "project_uas"
];
const MARIADB_DSN = "mysql:host=" . MARIADB_CONFIG["host"] . ";dbname=" . MARIADB_CONFIG["database"];

const SQLSERVER_CONFIG = [
    "host"=> "(local)",
    "user"=> "lukman28",
    "password"=> "2809",
    "database"=> "project_uas"
];
const SQLSERVER_DSN = "sqlsrv:Server=" . SQLSERVER_CONFIG["host"] . ";Database=" . SQLSERVER_CONFIG["database"];