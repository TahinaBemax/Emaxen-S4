<a href="http://localhost/garage/Admin/deleteAll">Réinitialiser la base de donnée</a>

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
                    <a class="btn btn-primary" href="http://localhost/garage/Admin/nouveauService/">Nouveau Service</a>
                </div>
                <div class="col-12 col-sm-7 col-md-6 text-end" style="margin: 0px;padding: 5px 15px;">
                    <button class="btn btn-warning btn-sm" id="zoom_in" type="button" zoomclick="ChangeZoomLevel(-10);"
                            style="margin: 2px;background: rgb(0,191,98);"><i class="fa fa-search-plus"></i></button>
                    <button class="btn btn-warning btn-sm" id="zoom_out" type="button" zoomclick="ChangeZoomLevel(-10);"
                            style="margin: 2px;background: rgb(0,191,98);"><i class="fa fa-search-minus"></i></button>
                </div>
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
                        <?php
                        if (is_array($services) > 0){
                            foreach ($services as $s) { ?>
                                <tr>
                                    <td><?= $s['type'] ?></td>
                                    <td><?= $s['duree'] ?></td>
                                    <td><?= $s['montant'] ?></td>
                                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;">
    <!--                                    <a class="btn btnMaterial btn-flat primary semicircle" role="button" href="#">
                                            <i class="far fa-eye"></i>
                                        </a>-->
                                        <a href="http://localhost/garage/Admin/getServiceToUpdate/<?= $s['idTypeService'] ?>"
                                           class="btn btnMaterial btn-flat success semicircle" role="button">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="http://localhost/garage/Admin/delete/<?= $s['idTypeService'] ?>"
                                            <i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } } else { echo "Vide"; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/Fixed-navbar-starting-with-transparency-script.js ') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---1-Index-Table-with-Search--Sort-Filters.js ') ?>"></script>
<script src="<?= base_url('assets/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---Material-UI-Actions.js ') ?>"></script>
</body>

</html>