<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANIMALANDIA</title>
    <link rel="stylesheet" href="<?php echo (base_url('public/styles/estilos.css')) ?>">
    <link rel="icon" href="<?= base_url('public/img/huella.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fondo">
            <div class="container-fluid">
                <a class="navbar-brand fuente" href="#"><i class="fas fa-paw"></i>Animalandia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('/Home') ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Inventario
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= site_url('/productos/listado') ?>" class="btn btn-primary"> Productos</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('/animal/listado') ?>" class="btn btn-primary"> Animales</a></li>
                                <li>
                                </li>
                            </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-5">
            <h3 class="fuente2 fw-bold text-center">INVENTARIO ANIMALES</h3>
            <div class="row row cols-1 row-cols-md-5 g-4">
                <?php foreach ($animales as $animal) : ?>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <img src="<?= $animal["fotografia"] ?>" class="card-img-top" alt="foto">
                            <div class="card-body">
                                <h5 class="card-title"><?= $animal["nombre"] ?></h5>
                                <p class="card-text"><?= $animal["edad"] ?></p>
                                <p class="card-text"><?= $animal["descripcion"] ?></p>
                                <hr>
                                <a data-bs-toggle="modal" data-bs-target="#confirmacion<?= $animal["id"] ?>" href="#" class="btn btn-primary fondoPrincipal"><i class="far fa-trash-alt"></i></a>
                                <a data-bs-toggle="modal" data-bs-target="#editar<?= $animal["id"] ?>" href="#" class="btn btn-primary boton"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                        <section>
                            <div class="modal fade" id="confirmacion<?= $animal["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondoPrincipal text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Casa Hogar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de elimiar este Animal?</p>
                                            <p><?= $animal["id"] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary boton" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="<?= site_url('/animales/eliminar/' . $animal["id"]) ?>" class="btn btn-danger fondoPrincipal">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <section>
                                <div class="modal fade" id="editar<?= $animal["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header fondoPrincipal text-white">
                                                <h5 class="modal-title" id="exampleModalLabel">Casa Hogar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3 align-self-center">
                                                        <img src="<?= $animal["fotografia"] ?>" alt="foto" class="img-fliud w-100">
                                                    </div>
                                                    <div class="col-9">
                                                        <form action="<?= site_url('/animal/editar/' . $animal["id"]) ?>" method="POST">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nombre</label>
                                                                <input type="text" class="form-control" name="nombre" value="<?= $animal["nombre"] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Edad</label>
                                                                <input type="text" class="form-control" name="edad" value="<?= $animal["edad"] ?>">
                                                            </div>
                                                            <hr>
                                                            <button type="submit" class="btn btn-primary fondoPrincipal">Editar</button>
                                                            <button type="button" class="btn btn-secondary boton" data-bs-dismiss="modal">Cerrar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </main>




    <script src="https://kit.fontawesome.com/4ce3ac59dd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>

</html>