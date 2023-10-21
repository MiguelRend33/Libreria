<?php
    #Se encarga de recibir los datos mediante el metodo $_GET que nos devuelve la propiedad de nuestra base de datos 
    #y acceder a cada columna de nuestra base de datos si considen las Id y nos haga la consulta#
    include("db.php");
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query ="SELECT * FROM library WHERE id= $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
           $row = mysqli_fetch_array($result);
           $titulo= $row['titulo'];
           $autor= $row['autor'];
           $año_de_publicacion= $row['año_de_publicación'];
           $genero_literario= $row['genero_literario'];
        }
    }
    #Actualizar: Para actualizar la información, nos traemos la activación del boton 'Actauliazar mediante el metodo $_POST
    # nuesta endpoit a utilizar aquí sería $_GET para verificar que las id coinciden, nos traemos la info con $_Post
    # creamos la consulta subiendo los nuevos datos a la base en donde las id deben coincidir. Entregamos un mensaje para ve que esta pasando.
    if(isset($_POST['Actualizar'])){
        $id=$_GET['id'];
        $titulo = $_POST['titulo'];
        $autor= $_POST['autor'];
        $año_de_publicacion = $_POST['año_de_publicación'];
        $genero_literario=$_POST['genero_literario'];
        /*echo $titulo;
        echo $autor;
        echo $año_de_publicacion;
        echo $genero_literario;*/
        $query= "UPDATE library set titulo = '$titulo', autor = '$autor', año_de_publicación = '$año_de_publicacion', genero_literario = '$genero_literario' WHERE id = $id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Tarea actualizada';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");

    }
?>
<?php include("includes/header.php") ?>
<!--Se encarga de recibir mediante la interfas de html y activar el evento de Actualizar-->
<div class="row">
    <div class="col-md4 mx-auto">
        <div class="card card-body">
            <form action="edit_book.php?id=<?php echo $id;?>" method="POST">
                <div class="form-groud">
                    <input type="text" name="titulo" value="<?php echo $titulo?>" class="form-control" placeholder="Actualiza el titulo">
                </div>
                <div class="form-group">
                    <textarea name="autor" rows="2" class="form-control" placeholder="Actualizar Autor"><?php echo $autor; ?></textarea>
                </div>
                <div class="form-group">
                    <textarea name="año de publicación" rows="2" class="form-control" placeholder="Actualizar año de publicación"><?php echo $año_de_publicacion; ?></textarea>
                </div>
                <div class="form-group">
                    <textarea name="genero literario" rows="2" class="form-control" placeholder="Actualizar genero"><?php echo $genero_literario; ?></textarea>
                </div>
                <button class="btn btn-success" name="Actualizar">
                    Actualizar
                </button>
            </form>
        </div>
    </div>

</div>
<?php include("includes/footer.php") ?>