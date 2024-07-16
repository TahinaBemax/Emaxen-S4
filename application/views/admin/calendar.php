<style>
    body {
        margin: 40px 10px;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }

    /* Popup styles */
    .popup-card {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        width: 300px;
        max-width: 90%;
        z-index: 1000;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
        color: #333;
    }

    h2 {
        margin-top: 0;
        color: rgb(0, 191, 98);
    }

    label {
        display: block;
        margin-top: 10px;
        color: #333;
    }

    input[type="text"], input[type="email"], input[type="date"], select {
        width: calc(100% - 20px);
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: rgb(0, 191, 98);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: rgb(0, 155, 80);
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }
</style>

<!-- Overlay -->
<div class="overlay" id="overlay"></div>

<!-- Popup Form -->
<div id="popupCard" class="popup-card">
    <div class="popup-content">
        <span class="close-btn" id="closePopupBtn">&times;</span>
        <h2>ITU'CUSTOM</h2>
        <form id="popupForm">
            <label for="startDate">Date de début:</label>
            <input type="date" id="startDate" name="startDate" required>

            <label for="offers">Service</label>
            <select id="offers" name="client" required>
                <?php foreach ($services as $c) { ?>
                    <option value="<?= $c['idTypeService'] ?>"> <?= $c["type"] ?></option>
                <?php } ?>
            </select>

            <label for="offers">Clients:</label>
            <select id="offers" name="client" required>
                <?php foreach ($clients as $c) { ?>
                    <option value="<?= $c['idVoiture'] ?>"> <?= $c["numero"] ?></option>
                <?php } ?>
            </select>

            <button type="submit">Ajouter un rendez-vous</button>
        </form>
    </div>
</div>

    <div class="col-md-12 search-table-col" style="margin-top: 188px;padding-top: 56px;">
        <div id='calendar'></div>
    </div>

    <script src="<?= base_url('assets/dist/index.global.js') ?>"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var overlay = document.getElementById('overlay');
        var popupCard = document.getElementById('popupCard');
        var closePopupBtn = document.getElementById('closePopupBtn');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: new Date(),
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function (arg) {
                document.getElementById('startDate').value = arg.startStr;
                overlay.style.display = 'block';
                popupCard.style.display = 'flex';
                calendar.unselect();
            },
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [
                <?php foreach ($rdvs as $r){
                $dateString = $r['date_debut'];
                $date = new DateTime($dateString);
                $formattedDate = $date->format('Y-m-d');
                ?>
                {
                    title: "<?= $r['service'].' '.$r['numero'].' '.$r['nomSlot'] ?>",
                    start: "<?= $formattedDate ?>",
                    end: "<?= $r['date_fin'] ?>",
                },
                <?php } ?>
                {
                    title: "",
                    start: "",
                    end: "",
                }
            ]
        });

        calendar.render();

        closePopupBtn.addEventListener('click', function () {
            popupCard.style.display = 'none';
            overlay.style.display = 'none';
        });

        document.getElementById('popupForm').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Formulaire soumis');
            popupCard.style.display = 'none';
            overlay.style.display = 'none';
        });
    });
</script>
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