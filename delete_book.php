<?php
/* para este endpoint se utiliza el $_Get para traer el id, luego se crea una consulta para borrar de la base de datos library
verificando que las id correspondan, luego con la variable $result utilizamos la conn con nuestra variable de consulta
con el fin de enviar el comando al DELETE a nuestra base por ultimo en la condicional si la consulta falla matarla
para que no hayan problemas, luego con $_SESSION mostramos los mensajes de lo que esta pasando*/
    include("db.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query ="DELETE FROM library WHERE id = $id";
        $result= mysqli_query ($conn, $query); 
        if(!$result){
            die("Query Failed");
        }
        $_SESSION['message']='Tarea eliminada correctamente';
        $_SESSION['message_type']='danger';

        header("Location: index.php");
    }

?>