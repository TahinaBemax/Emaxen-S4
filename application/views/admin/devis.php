<div class="container search-table-col" style="margin-top: 188px;padding-top: 56px;">
    <div class="form-group pull-right col-12 mb-3">
        <form method="post" class="d-flex flex-row" action="http://localhost/garage/Admin/devisByDatePaiement">
            <input class="form-control search form-control" name="date" type="date"
                   placeholder="Search by date paiement..."
                   style="width: 361.663px;">
            <button class="btn btn-primary" type="submit" style="background: rgb(0,191,98);">
                filtrer
            </button>
        </form>
    </div>
    <div class="table-responsive table table-hover table-bordered results">
        <table class="table table-hover table-bordered">
            <thead class="bill-header cs">
            <tr class="text-center">
                <th id="trs-hd-1" class="col-lg-2">Numéro Véhicule</th>
                <th id="trs-hd-2" class="col-lg-2">Type services</th>
                <th id="trs-hd-3" class="col-lg-3">Prix service unitaire</th>
                <th id="trs-hd-4" class="col-lg-2">Prix total</th>
                <th id="trs-hd-5" class="col-lg-2">DATE DEBUT</th>
            </tr>
            </thead>
            <tbody>
            <?php if (is_array($devis)) {
                foreach ($devis as $d) { ?>
                    <tr>
                        <td><?= $d['numero'] ?></td>
                        <td><?= $d['type'] ?></td>
                        <td><?= $d['montant'] ?></td>
                        <td><?= $d['montant'] ?></td>
                        <td><?= $d['date_debut'] ?></td>
                    </tr>
                <?php }
            } else {
                echo "<tr> Vide </tr>";
            } ?>
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
