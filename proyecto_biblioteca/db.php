<?php
#Inicia session y guarda en la variable $conn la conecxion con mysql para usarlo en los endpoint
session_start();
$conn = mysqli_connect(
    'localhost',
    'root', 
    '',
    'php_library',
);
