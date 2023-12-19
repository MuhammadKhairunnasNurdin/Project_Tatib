<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$data['title']?></title>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="<?= BASEURL?> /css/dosen.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk styling */

        /** {*/
        /*    overflow: hidden;*/
        /*}*/

        .row {
                overflow-y: auto;
            }
        .profile {
            position: relative;
            display: inline-block;
            margin-right: 100px;
        }

        .profile-title {
            cursor: pointer;
            text-decoration: none;
        }

        .profile-title:hover {
            text-decoration: none;
            color: white;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #e1e1e1;
        }
    </style>
</head>
<div class="container-header-dosen">
    <div class="row-dosen">
        <div class="header-container-dosen">
            <div class="header-content-dosen">
                <a class="header-title">
                    <img src="<?= BASEURL?>/img/logo_polinema.png" alt="logo polinema" width="35px">
                    POLITEKNIK NEGERI MALANG
                </a>
            </div>
            <div class="profile">
                <a class="profile-title" onclick="toggleDropdown()">Log Out</a>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?=BASEURL?>/Login/logout">Log out</a>
                </div>
            </div>
        </div>
    </div>
</div>
