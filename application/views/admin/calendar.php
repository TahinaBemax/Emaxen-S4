<div class="col-md-12 search-table-col" style="margin-top: 188px;padding-top: 56px;">
    <div id='calendar'></div>
    <form id="eventForm">
        <label for="date">Date et heure du rendez-vous</label>
        <input type="datetime-local" id="date" name="date" required>
        <br>
        <label for="eventType">Event Type:</label>
        <select id="eventType" name="client" required>
            <option value="">Choisir un client</option>
            <?php foreach ($clients as $c) { ?>
                <option value="<?= $c['idClient'] ?>"> <?= $c["nom"] ?></option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Ajouter un rendez-vous</button>
    </form>
</div>


<div class="col-md-12 search-table-col" style="margin-top: 188px;padding-top: 56px;">
        <div id='calendar'></div>
    </div>

    <script src="<?= base_url('assets/dist/index.global.js') ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const debut = document.getElementById("date");
            var calendarEl = document.getElementById('calendar');

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
                select: function(arg) {
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        });
                    }
                    calendar.unselect()
                },
                eventClick: function(arg) {
                    if (confirm('Are you sure you want to delete this event?')) {
                        arg.event.remove()
                    }
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