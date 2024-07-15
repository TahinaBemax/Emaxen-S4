
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
                        <th id="trs-hd-1" class="col-lg-1">Numéro Véhicule</th>
                        <th id="trs-hd-2" class="col-lg-2">Type services</th>
                        <th id="trs-hd-3" class="col-lg-3">Prix service unitaire</th>
                        <th id="trs-hd-4" class="col-lg-2">Prix total</th>
                        <th id="trs-hd-5" class="col-lg-2">DATE DEBUT</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (is_array($devis) > 0){
                foreach ($devis as $d) { ?>
                    <tr>
                        <td><?= $d['numero'] ?></td>
                        <td><?= $d['service'] ?></td>
                        <td><?= $d['montant'] ?></td>
                        <td><?= $d['montant'] ?></td>
                        <td><?= $d['date_debut'] ?></td>
                    </tr>
                <?php } } else { echo "<tr> Vide </tr>"; } ?>
                </tbody>
            </table>
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
<script src="<?= base_url('assets/js/Table-With-Search-search-table.js ') ?>"></script>
</body>

</html>
