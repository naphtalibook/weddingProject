<?php
require_once 'session_start.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        
            <nav>
             
               <ul>
                    <li><a href="api.php?action=login">Log in</a></li>
                    <li><a href="api.php?action=newcouple">New Wedding</a></li>
                    <?php  if(isset($_SESSION["coupleId"])){ ?>
                    <li><a href="api.php?action=group">group</a></li>
                    <li><a href="api.php?action=tables">set tables</a></li>
                    <li><a href="api.php?action=addgests">add gests</a></li>
                    <li><a href="api.php?action=allgests">all gests</a></li> <?php
                } ?>
                </ul>
                <div id="logo">
                    <h1>this is a logo</h1>
                </div>
                <p id="logoutName"> <?php
                if(isset($_SESSION["coupleId"])){ ?>
                    <b> <?=$_SESSION['coupleName']?> </b>
                    <a href="api.php?action=logout">Logout</a> <?php
                } ?>
                </p>
            </nav>
            <div id="main">

              