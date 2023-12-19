<?php
$mysqli = mysqli_connect('localhost:33306', 'root', 'root', 'php_profiling');
$conn = mysqli_connect('localhost:33306', 'root', 'root', 'php_profiling');
$name = "Barangay Gabi Website";

if (!$conn || !$mysqli) {
    echo "Connection failed!";
}