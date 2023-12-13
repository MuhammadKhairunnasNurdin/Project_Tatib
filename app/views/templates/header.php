<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--	<meta name="Kinata" content="Tatib">-->
    <title><?= $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL;?>/css/<?=$data['style']?>.css">
<!--    <link rel="stylesheet" href="--><?//=BASEURL?><!--/css/firstPage.css">-->
    <style>
        /**{*/
        /*    overflow: hidden;*/
        /*}*/

        .header-title{
            font-weight:bold;
            color: white;
            text-align: center;
            text-decoration: none;
        }
        .header-title:hover{
            text-decoration: none;
            cursor: pointer;
            color:white;
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