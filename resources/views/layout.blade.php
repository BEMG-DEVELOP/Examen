<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Link css de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!--Link para los datatables-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
    <!-- Fin Link para los datatables-->
</head>
<body style="background-color:Gray;">
  <!--Menu de navegacion entre los modulos-->
    <nav>
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-start bg-dark"  id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: white">Administración</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('Alumnos') }}">Alumnos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('materias') }}">Materia</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('inscribir') }}">Inscripciones</a>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
    </nav>
    <!--Seccion donde va todo el contenido -->
    <section style="margin-top: 70px">
        @yield('Contenido')
    </section>
    <footer class=" fixed-bottom bg-dark ">
      <center><a href="https://beacons.ai/bemg_develop"><p style="color: white;" >@copy bemg_develop</p></a></center>
    </footer>
    <!--Script con una funcion para utilizar la libreria de datatables-->
    <script>
        $(document).ready(function () {
        $('#grid').DataTable();
    });
    </script>
    <!--Link boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>
</html>