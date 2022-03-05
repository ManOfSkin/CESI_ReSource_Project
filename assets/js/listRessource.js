import '../styles/listRessource.css';
import 'datatables.net-bs5';
import 'datatables.net-searchbuilder-bs5';
import 'datatables.net-buttons-bs5';
import $ from "jquery";

$(document).ready(function() {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
            "paginate": {
                "previous": "< Précédent",
                "next": "Suivant >"
            }
        },
        "searching": false,
        "order": [
            [0, "asc"]
        ],
    });
});