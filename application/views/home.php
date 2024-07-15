 <div class="carousel slide" data-bs-ride="carousel" id="carousel-1" style="height: 600px;margin-top: 174px;">
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="<?= base_url('assets/img/votre-garage-automobile-a-reze-reparations-et-vehicules-doccasion-1024x574.png ') ?>" alt="Slide Image" style="z-index: -1;filter: brightness(34%) grayscale(100%);opacity: 0.99;">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold"><span style="color: rgb(255, 255, 255);">bonne </span><span style="color: rgb(0, 191, 98);">securite</span></h1>
                                <p class="my-3"><span style="color: rgb(255, 255, 255);">Meilleur suivi et garde de vos voitures</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="<?= base_url('assets/img/vue-dessus-homme-reparant-voiture.jpg ') ?>" alt="Slide Image" style="z-index: -1;filter: brightness(51%);">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold"><span style="color: rgb(255, 255, 255);">Reparation et </span><span style="color: rgb(0, 191, 98);">maintenance</span></h1>
                                <p class="my-3"><span style="color: rgb(255, 255, 255);">selon vos desirs</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="<?= base_url('assets/img/istockphoto.jpg ') ?>" alt="Slide Image" style="z-index: -1;filter: brightness(51%) contrast(109%) saturate(55%);">
                <div class="container d-flex flex-column justify-content-center h-100">
                    <div class="row">
                        <div class="col-md-6 col-xl-4 offset-md-2">
                            <div style="max-width: 350px;">
                                <h1 class="text-uppercase fw-bold"><span style="color: rgb(255, 255, 255);">nos employees</span><br><span style="color: rgb(0, 155, 79);">proche </span><span style="color: rgb(255, 255, 255);">et a </span><span style="color: rgb(0, 155, 79);">tout </span><span style="color: rgb(0, 155, 79);">moment</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button></div>
    </div>

    <div class="container py-4 py-xl-5">
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <section>
                    <h1 class="text-center text-capitalize">Reservez <span style="color: rgb(0, 155, 79);">Maintenant</span></h1>
                    <div class="container">
                        <form id="application-form">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col">
                                        <p><strong>Nom</strong></p><input class="form-control" type="text" required="" name="" placeholder="Ex. Randria">
                                    </div>
                                    <div class="col">
                                        <p><strong>Prenom</strong></p><input class="form-control" type="text" required="" name="" placeholder="Ex. bemax">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <p><strong>Date de reservation</strong><span class="text-danger"></span></p>
                            </div>
                            <div class="form-group mb-3">
                                <p><input class="form-control" type="date" required="" name=""><span class="text-danger">*</span><strong>Heure de reservation</strong></p><input class="form-control" name="" placeholder="7777777777" type="time">
                            </div>
                            <div class="form-group mb-3">
                                <p><strong>Choix de service</strong><span class="text-danger">*</span></p><select class="form-select" required="" name="" placeholder="Ex. Room No-361, 33/1, 3rd Floor"></select>
                            </div>
                            <div class="justify-content-center d-flex form-group mb-3">
                                <div id="submit-btn">
                                    <div class="row">
                                        <div class="col"><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="border-style: none;background: rgb(2,156,80);box-shadow: -4px 3px 11px rgb(4,90,100);">Valider</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <h3 id="fail" class="text-center text-danger d-none"><br>Form not Submitted&nbsp;<a href="contact.html">Try Again</a><br><br></h3>
                        <h3 id="success-1" class="text-center text-success d-none"><br>Form Submitted Successfully&nbsp;<a href="contact.html">Send Another Response</a><br><br></h3>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;filter: brightness(58%);" src="<?= base_url('assets/img/Black%20Flat%20Illustrative%20Garage%20Service%20Logo.png ') ?>"></div>
            </div>
        </div>
    </div>
