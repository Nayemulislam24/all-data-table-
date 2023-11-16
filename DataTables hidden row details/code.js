function fnFormatDetails(oTable, nTr) {
  var aData = oTable.fnGetData(nTr);
  var sOut =
    '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
  sOut += "<tr><td><b>Fecha de nacimiento:</b></td><td>sdafasdfasd</td></tr>"; // '+aData[6]+'
  sOut += "</table>";
  return sOut;
}

$(".datatable-basic").DataTable({
  aLengthMenu: [
    [10, 25, 50, 100, -1],
    [10, 25, 50, 100, "Todos"],
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
  aaSorting: [[0, "asc"]],
  aoColumns: [
    { bSortable: true },
    { bSortable: false },
    { bSortable: false },
    { bSortable: false },
    { bSortable: false },
    { bSortable: false },
    { bVisible: false },
    { bSortable: false },
  ],
  bProcessing: true,
  serverSide: true,
  ajax: {
    url: "server_processing_cl.php",
    type: "post",
    error: function () {
      $("#employee_grid_processing").css("display", "none");
    },
  },
});

$(".datatable-basic tbody td img#mostrar").on("click", function () {
  var nTr = $(this).parents("tr")[0];
  if (oTable.fnIsOpen(nTr)) {
    this.src = "img/details_open.png";
    oTable.fnClose(nTr);
  } else {
    this.src = "img/details_close.png";
    oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), "details");
  }
});

// });
