<?php
    $server = "localhost:3307";
    $user ="root";
    $password = "";
    $database ="dbbukutamu";

    $koneksi = mysqli_connect($server, $user, $password, $database);
    if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
    }