<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>dashboard</title>
    <link href="<?= base_url('assets/img/apple-touch-icon.png" rel="apple-touch-icon') ?>">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet') ?>">
    <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet') ?>">
    <link href="<?= base_url('assets/vendor/quill/quill.snow.css" rel="stylesheet') ?>">
    <link href="<?= base_url('assets/vendor/quill/quill.bubble.css" rel="stylesheet') ?>">
    <link href="<?= base_url('assets/vendor/remixicon/remixicon.css" rel="stylesheet') ?>">
    <link href="<?= base_url('assets/vendor/simple-datatables/style.css" rel="stylesheet') ?>">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link href="<?= base_url('assets/css/style.css" rel="stylesheet') ?>">

    <style>
        .overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
        }

        .form-container select.form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>

<body style="background: var(--bs-secondary-bg);">
<nav class="navbar navbar-expand-md fixed-top navbar-transparency navbar-light" style="background: #ffffff;">
    <div class="container"><img src="<?= base_url('assets/img/ITU_2_-removebg-preview.png') ?>" width="158" height="157" style="filter: brightness(81%);">
        <div><a class="navbar-brand" href="#"><strong>ITU'<span style="color: rgb(0, 191, 98);">CUSTOM</span></strong></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav justify-content-evenly ms-auto w-100 d-flex flex-row g-3">
                <li class="nav-item">
                    <a href="http://localhost/garage/Admin/">Home</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/garage/Admin/service">Service</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/garage/Admin/devis">Devis</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/garage/Admin/calendar">Rendez-vous</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/garage/Admin/import">Importé</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/garage/Deconnexion/">Log Out</a>
                </li>
                <li class="nav-item">
                    <strong><a href="http://localhost/garage/Admin/deleteAll">Réinitialiser les données</a></strong>
                </li>

            </ul>
        </div>
    </div>
</nav>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <div class="col-xxl-4 col-md-6" style="margin-top: 150px; margin-left: 50px;width:1390px;">
        
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Montant chiffres d'affaire</h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cash"></i>
                </div>
               
              <div class="ps-3">
                <h2>145</h2>
                <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

              </div>
            </div>
          </div>

        </div>
      </div>

    <div class="col-12" style="margin-top: 30px;margin-left:50px;margin-right:50px; width:1390px;">
        <div class="card">

         

          <div class="card-body">
            <h5 class="card-title">Tableau de bord</h5>
            

            <!-- Line Chart -->
            <div id="reportsChart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#reportsChart"), {
                  series: [{
                    name: 'Montant payés',
                    data: [31,20, 40, 28, 51, 42, 82, 56],
                  }, {
                    name: 'Montant non payés',
                    data: [11,25, 32, 45, 32, 34, 52, 41]
                 
                  }],
                  chart: {
                    height: 450 ,
                    type: 'area',
                    toolbar: {
                      show: false
                    },
                  },
                  markers: {
                    size: 4
                  },
                  colors: ['#4154f1', '#2eca6a', '#ff771d'],
                  fill: {
                    type: "gradient",
                    gradient: {
                      shadeIntensity: 1,
                      opacityFrom: 0.3,
                      opacityTo: 0.4,
                      stops: [0, 90, 100]
                    }
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    curve: 'smooth',
                    width: 2
                  },
                  xaxis: {
                    type: 'number',
                    categories: ["100 000", "300 000", "300 000", "400 000", "100 000", "100 000", "100 000", "100 000"]
                  },
                  tooltip: {
                    x: {
                      format: 'dd/MM/yy HH:mm'
                    },
                  }
                }).render();
              });
            </script>
            <!-- End Line Chart -->

          </div>

        </div>
      </div>

      <div class="card" style="margin-top: 30px; width: 1390px; margin-left :50px; margin-right:50px;">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Legère</th>
                <th scope="col">4x4</th>
                <th scope="col">Position</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">#</th>
                <td><a href="">200.000 AR</a></td>
                <td><a href="">300.000 AR</a></td>
                <td><a href="">800.000 AR</a></td>
               </tr>
            </tbody>
          </table>
        </div>
      </div>

      <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/chart.js/chart.umd.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/echarts/echarts.min.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/quill/quill.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js') ?>"></script>
      <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
      <script src="<?= base_url('assets/js/main.js') ?>"></script>

      <div class="overlay" id="formOverlay">
        <div class="form-container">
          <form>
            <div class="mb-3">
                <label for="typeMateriel" class="form-label">Voulez-vous vraiment supprimer ?</label>
              </div>
            <button type="submit" class="btn btn-primary">Supprimer</button>
            <button type="button" class="btn btn-secondary" onclick="hideForm()">Annuler</button>
          </form>
        </div>
      </div>
    
      <script>
        // Fonction pour afficher le formulaire d'insertion
        function showForm() {
          document.getElementById('formOverlay').style.display = 'flex';
        }
    
        // Fonction pour masquer le formulaire d'insertion
        function hideForm() {
          document.getElementById('formOverlay').style.display = 'none';
        }
      </script>
</body>

</html>