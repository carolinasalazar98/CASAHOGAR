<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo (base_url('public/styles/estilos.css')) ?>">
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

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-5">
            <div class="row row cols-1 row-cols-md-5 g-4">
                <?php foreach ($productos as $producto) : ?>
                    <div class="col">
                        <div class="card h-100 p-3">
                            <img src="<?= $producto["foto"] ?>" class="card-img-top" alt="foto">
                            <div class="card-body">
                                <h5 class="card-title"><?= $producto["producto"] ?></h5>
                                <p class="card-text"><?= $producto["precio"] ?></p>
                                <a data-bs-toggle="modal" data-bs-target="#confirmacion<?= $producto["id"] ?>" href="#" class="btn btn-primary"><i class="far fa-trash-alt"></i></a>
                                <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></i></a>
                            </div>
                        </div>
                        <section>
                            <div class="modal fade" id="confirmacion<?= $producto["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header fondoPrincipal text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Casa Hogar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de elimiar este producto</p>
                                            <p><?= $producto["id"] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="<?= site_url('/productos/eliminar/'.$producto["id"])?>" class="btn btn-danger">Eliminar</a>
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