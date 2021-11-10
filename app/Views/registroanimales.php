<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo (base_url('public/styles/estilos.css')) ?>">
  <link rel="icon" href="<?= base_url('public/img/huella.png') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
  <title>ANIMALANDIA</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fondo">
      <div class="container-fluid">
        <a class="navbar-brand fuente" href="<?= site_url('/Home') ?>"><i class="fas fa-paw"></i>Animalandia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= site_url('/Home') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?= site_url('/productos/registro') ?>">Registro Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?= site_url('/animal/registro') ?>">Registro Animales</a>
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

  <section>
    <?php if (session('mensaje')) : ?>
      <div class="modal fade" id="modalrespuesta" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header fondoPrincipal">
              <h5 class="text-center">CASAHOGAR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5><?= session('mensaje') ?></h5>
            </div>
          </div>
        </div>
      </div>
    <?php endif ?>
  </section>


  <div class="container">
    <div class="row mt-5 d-flex justify-content-center ">
      <div class="col-12 col-md-5">
        <h3 class="fuente2 fw-bold text-center">Registro de animales</h3>

        <form action="<?= site_url('/productos/registro/animal') ?>" method="POST">
          <div class="mb-3 ">
            <label class="form-label ">Nombre animal</label>
            <input type="text" name="nombre" class="form-control">
          </div>
          <div class="mb-3 ">
            <label class="form-label ">Fotografia</label>
            <input type="text" name="fotografia" class="form-control">
          </div>
          <div class="mb-3 ">
            <label class="form-label ">Edad</label>
            <input type="text" name="edad" class="form-control">
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Descripcion" name="descripcion" style="height: 100px"></textarea>
              <label for="floatingTextarea">Descripción del veterinario</label>
            </div>
          </div>
          <div class="mb-3">
            <select class="form-select" name="tipo">
              <option value="1" selected>Tipo de animal</option>
              <option value="2">Perro</option>
              <option value="2">Gato</option>
              <option value="3">Caballo</option>
              <option value="4">Ave</option>
              <option value="5">Reptíl</option>
            </select>
          </div>
          <button class="btn btn-primary boton" type="submit">Registrar Animales</button>
      </div>
      <div class="col-12 col-md-5 align-self-end text-center">
        <img src="<?= base_url('public/img/animales.jpg') ?>" alt="imagen" class="img-fluid w-100">
      </div>
    </div>
  </div>
  </form>
  </div>

  </div>

  <footer class="fondoDos p-5 mt-5">

    <div class="container-fluid">

      <div class="row">
        <div class="col-12 col-md-4">
          <h3 class="fw-bold">Horario de atención:</h3>
          <p>Lunes a viernes 7:00 am - 3:00 pm / Sábado: 7:00 am - 2:30 pm / Domingos y festivos 8:00 am - 3:00 pm</p>
          <br>
          <h3 class="fw-bold">Dirección:</h3>
          <p>Belén Altavista Calle 8A # 112-82 </p>
        </div>

        <div class="col-12 col-md-4">
          <h3 class="fw-bold">Ayudas:</h3>
          <p>Glosario / Correo remoto / Monitoreo y desempeño de uso del sitio web</p>
          <br>
          <h3 class="fw-bold">Protección de datos:</h3>
          <p>Protección de datos personales en el Municipio de Medellín </p>
        </div>

        <div class="col-12 col-md-4">
          <h1 class="fw-bold fuente"><span><i class="fas fa-paw"></i></span>ANIMALANDIA</h1>
          <br>
          <i class="fab fa-facebook fa-3x"></i>
          <i class="fab fa-instagram fa-3x"></i>
          <i class="fab fa-youtube fa-3x"></i>
          <br>
          <p class="mt-4">© 2021 / NIT: 890905211-1 / Código DANE: 05001 / Código Postal: 050015</p>

        </div>
      </div>

    </div>

  </footer>

  <script type="module" src="<?= base_url('public/js/lanzarmodal.js') ?>"> </script>
  <script src="https://kit.fontawesome.com/4ce3ac59dd.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>

</html>