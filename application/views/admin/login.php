<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Log in - Brand</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/Footer-Basic-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/untitled-2.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/untitled.css') ?>">
</head>

<body>
<nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="height: 112.4px;">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><img
                    src="<?= base_url('assets/img/ITU_2_-removebg-preview.png') ?>" width="108"
                    height="108"><span>ITU'<span style="color: rgb(0, 191, 98);">Custom</span></span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto"></ul>
        </div>
    </div>
</nav>
<section class="py-4 py-md-5 my-5">
    <div class="container py-md-5">
        <div class="row">
            <div class="col-md-6 col-lg-5 text-center"><img class="d-flex m-auto"
                                                            src="<?= base_url('assets/img/Black%20Flat%20Illustrative%20Garage%20Service%20Logo.png') ?>"
                                                            width="403" height="568"
                                                            style="border-radius: 0px;padding: 0px;border-style: none;box-shadow: -8px 5px 10px var(--bs-dark-border-subtle);height: 481px;padding-top: 1px;padding-bottom: 0px;margin-left: 5px;margin-right: 9px;padding-right: 4px;margin-top: 0px;width: 422px;">
            </div>
            <div class="col-md-5 col-xl-4 text-center text-md-start"
                 style="padding-top: 17px;border-style: none;margin-left: 21px;">
                <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"
                                                         style="margin-right: 14px;padding-right: 0px;"><span
                                style="font-weight: normal !important;">Login</span></span></h2>

                <!-- FORM -->
                <form id="loginForm" data-bs-theme="light">
                    <div class="mb-3">
                        <label for="">Login</label> <br>
                        <input class="form-control" type="text" name="login" placeholder="Numero matricule" value="admin"
                               style="backdrop-filter: opacity(1);-webkit-backdrop-filter: opacity(1);border-radius: 0px;border-style: none;margin: 0px;padding: 8px 20.8px;box-shadow: -4px 4px 20px rgb(229,229,236);padding-top: 10px;">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label> <br>
                        <input class="form-control" type="password" name="password" placeholder="Numero matricule" value="admin"
                               style="backdrop-filter: opacity(1);-webkit-backdrop-filter: opacity(1);border-radius: 0px;border-style: none;margin: 0px;padding: 8px 20.8px;box-shadow: -4px 4px 20px rgb(229,229,236);padding-top: 10px;">
                    </div>
                    <div class="mb-3 alert alert-box"></div>
                    <button class="btn btn-primary d-flex m-auto" data-bss-hover-animate="pulse" type="submit"
                            style="background: rgb(104,206,102);margin-right: 153px;margin-left: 116px;box-shadow: 0px 0px, -3px 2px 7px var(--bs-primary-border-subtle);border-style: none;margin-bottom: 37px;border-radius: 0px;margin-top: 0px;">
                        Connexion
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>


<footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                         viewBox="0 0 16 16" class="bi bi-facebook">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                    </svg>
                </li>
                <li class="list-inline-item me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                         viewBox="0 0 16 16" class="bi bi-twitter">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15"></path>
                    </svg>
                </li>
                <li class="list-inline-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                         viewBox="0 0 16 16" class="bi bi-instagram">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"></path>
                    </svg>
                </li>
            </ul>
            <p class="mb-0">Copyright © 2024 Tahina - Kanto - Itokiana</p>
        </div>
    </footer>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bs-init.js') ?>"></script>
<script src="<?= base_url('assets/js/startup-modern.js') ?>"></script>
<script src="<?= base_url('assets/js/login-admin-controller.js') ?>"></script>
</body>

</html>