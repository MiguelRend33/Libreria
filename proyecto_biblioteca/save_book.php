<?php
include("db.php");
# para guardar los tatos dentre de la base de datos  usamos una validacion si se esta usando la accion save_libro
if (isset($_POST['save_libro'])){
    $title=$_POST['title'];
    $autor=$_POST['autor'];
    $año_publicacion=$_POST['año_de_publicación'];
    $genero_literario=$_POST['genero_literario'];

    
    #Guardamos en variables y creamos una consulta para hacer un INSERT en la base de datos y los valores de sus scolumnas
    # hicimos una variable $result para conectar con  mysql conectar y enviar nuestra consultap
    $query = "INSERT INTO library(titulo, autor, año_de_publicación, genero_literario) VALUES ('$title', '$autor','$año_publicacion','$genero_literario')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message'] = 'Libro guardada';
    $_SESSION['message_type']= 'succes';

    header("Location: index.php");

}else {
    echo "Fallo";
}

?>