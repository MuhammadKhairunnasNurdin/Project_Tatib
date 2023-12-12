<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['title']?></title>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="<?=BASEURL?>/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <style>
        *{
            overflow: hidden;
        }

        header {
            width: 100%;
            height: fit-content;
            padding: 1rem;
            background-color: #0D366B;
        }

        nav{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title{
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        span.profile{
            color: white;
            transition: 0.7s ease-in-out;
            padding: 0.5rem 1rem;
        }

        span.profile:hover {
            color: black;
            background-color: #0468e5;
            border-radius: 2rem;
        }
    </style>
</head>
<header>
    <nav>
        <a class="header-title">
            <img src="<?= BASEURL?>/img/logo_polinema.png" alt="logo polinema" width="35px">
            POLITEKNIK NEGERI MALANG
        </a>
        <span class="profile" type="button" data-bs-toggle="dropdown">
                            <?=$data['title']?>
        </span>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=BASEURL?>/Authorization/logout">Log Out</a></li>
        </ul>
    </nav>
</header>