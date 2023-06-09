<?php include 'functions.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Projekti-probit.css">
    
    <title>Document</title>
</head>
<body>
    <header id="header">
    <nav class="container">
            <a id="logo" href="index.php">
                <img src="images/smp_logo.png" alt="SMP Project Logo" title="SMP Project Logo">
            </a>
            <ul id="navbar">
                <li>
                    <a href="Projekti-probit.php">Ballina</a>
                </li>
                <?php
                if(isset($_SESSION['antari'])){
                    echo "<li><a href='punet.php'>Punet</a></li>";
                    if($_SESSION['antari']['roli']==1){
                        echo "<li><a href='anetaret.php'>Anetaret</a></li>";
                        echo "<li><a href='projektet.php'>Projektet</a></li>";
                    }
                    echo "<li><a href='profili.php?aid={$_SESSION['antari']['antariid']}'>Profili Jone</a></li>";
                    echo "<li><a href='dalja.php'>Dalja</a></li>";
                }else{
                    echo "<li><a href='regjistrohu.php'>Regjistrohu</a></li>"; 
                }
                
                ?>
            </ul>
        </nav>
        <section id="banner">
            <img src="images/banner1.png" alt="Banner 1" title="Banner 1">
            <h1>Sistemi per menaxhimin e projekteve SMP</h1>
        </section>
       
    </header>