<div class="container-fluid" style="padding-top: 252px;">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
            <h3 class="text-dark mb-4">Services</h3>
        </div>
    </div>
    <div class="card" id="TableSorterCard">
        <div class="card-header py-3">
            <div class="row table-topper align-items-center">
                <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                    <p class="text-primary m-0 fw-bold"><span style="color: rgb(0, 191, 98);">listes</span></p>
                </div>
                <div class="col-12 col-sm-7 col-md-6 text-end" style="margin: 0px;padding: 5px 15px;"><button class="btn btn-warning btn-sm" id="zoom_in" type="button" zoomclick="ChangeZoomLevel(-10);" style="margin: 2px;background: rgb(0,191,98);"><i class="fa fa-search-plus"></i></button><button class="btn btn-warning btn-sm" id="zoom_out" type="button" zoomclick="ChangeZoomLevel(-10);" style="margin: 2px;background: rgb(0,191,98);"><i class="fa fa-search-minus"></i></button></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table tablesorter" id="ipi-table">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center">TYpE de services</th>
                            <th class="text-center">duree</th>
                            <th class="text-center">montant</th>
                            <th class="text-center filter-false sorter-false">action</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php foreach ($services as $s) { ?>
                        <tr>
                            <td><?= $s['type'] ?></td>
                            <td><?= $s['duree'] ?></td>
                            <td><?= $s['montant'] ?></td>
                            <td class="text-center align-middle" style="max-height: 60px;height: 60px;">
                                <a class="btn btnMaterial btn-flat primary semicircle" role="button" href="#">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="http://localhost/garage/Admin/update/<?= $s['idTypeService'] ?>" class="btn btnMaterial btn-flat success semicircle" role="button">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="http://localhost/garage/Admin/delete/<?= $s['idTypeService'] ?>" class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" role="button" style="margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#delete-modal" >
                                    <i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>standard</td>
                            <td>1h</td>
                            <td>350000Ar</td>
                            <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btnMaterial btn-flat primary semicircle" role="button" href="#"><i class="far fa-eye"></i></a><a class="btn btnMaterial btn-flat success semicircle" role="button" href="#"><i class="fas fa-pen"></i></a><a class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" role="button" style="margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#delete-modal" href="#"><i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="col-md-12 search-table-col" style="margin-top: 188px;padding-top: 56px;">
        <div class="form-group pull-right col-lg-4">
            <form><input class="form-control search form-control" type="text" placeholder="Search by typing here.." style="width: 361.663px;"><span class="counter pull-right"><button class="btn btn-primary" type="button" style="margin-left: 2px;background: rgb(0,191,98);margin-top: -66px;margin-bottom: 14px;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                        </svg></button></span></form>
        </div>
        <div class="table-responsive table table-hover table-bordered results">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">Type Services</th>
                        <th id="trs-hd-2" class="col-lg-2">Duré</th>
                        <th id="trs-hd-3" class="col-lg-3">Montant</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>