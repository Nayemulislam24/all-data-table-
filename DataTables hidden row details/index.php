<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables hidden row details</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <table class="table datatable-basic table-striped table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width: 20%; text-align: left;">Nombre</th>
                    <th style="width: 12%; text-align: left;">DNI</th>
                    <th style="width: 15%; text-align: left;">Ciudad</th>
                    <th style="width: 18%; text-align: left;">Dirección</th>
                    <th style="width: 10%; text-align: left;">Teléfono</th>
                    <th style="width: 14%; text-align: left;">Nº de afiliado</th>
                    <th></th>
                    <th class="text-center" style="width: 10%; text-align: center; border-right: 1px solid #bbb;">Acción</th>
                </tr>
            </thead>
        </table>
    </div>
</body>

</html>

<script>
    // function fnFormatDetails(oTable, nTr) {
    //     var aData = oTable.fnGetData(nTr);
    //     var sOut =
    //         '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    //     sOut += "<tr><td><b>Fecha de nacimiento:</b></td><td>sdafasdfasd</td></tr>"; // '+aData[6]+'
    //     sOut += "</table>";
    //     return sOut;
    // }

    $(".datatable-basic").DataTable({
        aLengthMenu: [
            [10, 25, 50, 100],
        ],
        oLanguage: {
            sLengthMenu: "Mostrar _MENU_",
            sSearch: "Buscar:",
            sInfo: "Mostrando _START_ a _END_ de _TOTAL_ clientes",
            sZeroRecords: "No hay clientes coincidentes encontrados",
            sInfoFiltered: "(filtrado entre _MAX_ clientes)",
            sInfoEmpty: "Mostrando 0 a 0 de 0 clientes",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Ultimo",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
        },
        aaSorting: [
            [0, "asc"]
        ],
        aoColumns: [{
                bSortable: true
            },
        ],
        bProcessing: true,
        serverSide: true,
        ajax: {
            url: "action.php",
            type: "post",
            success: function(result) {
                alert(result);
                console.log(result);
                $("#employee_grid_processing").css("display", "none");
                
            },
        },
    });

    // $(".datatable-basic tbody td img#mostrar").on("click", function() {
    //     var nTr = $(this).parents("tr")[0];
    //     if (oTable.fnIsOpen(nTr)) {
    //         this.src = "img/details_open.png";
    //         oTable.fnClose(nTr);
    //     } else {
    //         this.src = "img/details_close.png";
    //         oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), "details");
    //     }
    // });

    // });
</script>