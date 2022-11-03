<!doctype html>
<html lang="es">

<head>
  <title>Agenda</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="./node_modules/fullcalendar/main.css">
  <script src="./node_modules/fullcalendar/main.js"></script>
  <!-- <script src='./node_modules/fullcalendar/locales/es.js'></script> -->
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>

  <main class="container">
    <div id='calendar' class="col-md-8 offset-md-2"></div>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="saveEvent" tabindex="-1" data-bs-backdrop="static"  data-bs-keyboard="false" role="dialog" aria-labelledby="modalRegister" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalRegister">Registrar evento</h5>
          </div>
          <div class="modal-body">
            <span class="badge rounded-pill text-bg-primary" id="dateEvent"></span>
            <input type="hidden" name="dateEventInput" id="dateEventInput" class="form-control" placeholder="Nombre del evento" aria-describedby="name" required>
            <form id="formEvent">
              <div class="mb-3">
                <label for="nameEvent" class="form-label">Evento</label>
                <input type="text" name="nameEvent" id="nameEvent" class="form-control" placeholder="Nombre del evento" aria-describedby="name" required>
              </div>
              <div class="my-3">
                <label for="urlEvent" class="form-label">URL</label>
                <input type="url" name="urlEvent" id="urlEvent" class="form-control" placeholder="Nombre del evento" aria-describedby="url">
              </div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closeModal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

  </main>

  <footer>
    <!-- place footer here -->
  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script src="./main.js"></script>


</body>

</html>