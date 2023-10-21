<?php include("db.php")?>
<?php include("./includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- Se utiliza $_SESSION para mostrar un mensaje para que el usuario pueda ver que que esta sucediendo--->
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?=$_SESSION['message']?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); }?>

            <div class="card card-body">
                <!-- Se utiliza el metodo POST para insertar nuestros recursos en la base de datos por medio de una Id especifica que se asigna
                automaticamente--->
                <form action="save_book.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Libro" autofocus>
                    </div>
                    <div class="form-group">
                    <textarea name="autor" rows="2" class="form-control" placeholder="Autor"></textarea>
                    </div>
                    <div class="form-group">
                    <textarea name="año_de_publicación" rows="2" class="date" placeholder="yyyy-mm-dd"></textarea>
                    </div>
                    <div class="form-group">
                    <textarea name="genero_literario" rows="2" class="form-control" placeholder="Genero literario"></textarea>
                    </div>



                <input type="submit" class="btn btn-success btn-block" name="save_libro" value="Guardar libro">
            </form>
            </div>
        </div>    
    
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>titulo</th>
                        <th>autor</th>
                        <th>año de publicacion</th>
                        <th>genero literario</th>
                        <th>Acciones</th>
                        <tbody>
                            <!--consulta de base de datos: creamos una consulta con query para visualizar nuestra base en una tabla  -->
                            <?php
                                $query = "SELECT * FROM library";
                                $result_libarary = mysqli_query( $conn, $query);
                                while($row = mysqli_fetch_array($result_libarary)){?>
                                    <tr>
                                        <td><?php echo $row['titulo'] ?></td>
                                        <td><?php echo $row['autor'] ?></td>
                                        <td><?php echo $row['año_de_publicación'] ?></td>
                                        <td><?php echo $row['genero_literario'] ?></td>
                                        <td>
                                            <a href="edit_book.php?id=<?php echo $row['id']?>"class="btn btn-secondary">
                                            <!--FON AWEASONE V&-->
                                            <i class="fa-solid fa-pencil"></i>
                                            <a href="delete_book.php?id=<?php echo $row['id']?>" class ="btn btn-danger">
                                            <!--FON AWEASONE V&-->
                                            <i class="fa-solid fa-trash"></i>
                                        </td>
                                    </tr>
                            <?php }                         ?>
                        </tbody>

                    </tr>
                </thead>
            </table>
            
        </div>
    </div>
</div>

<?php include("./includes/footer.php")?>