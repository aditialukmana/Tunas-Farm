var urlSystemLogs = $("#tableSystemLogs").data("url");
var tableSystemLogs = null;
var i = 1;
$(document).ready(function () {
  tableSystemLogs = $("#tableSystemLogs").DataTable({
    ajax: urlSystemLogs,
    columns: [
      { data: null, title: "No" },
      { data: "timestamp", title: "Timestamp" },
      { data: "user", title: "User" },
      { data: "controller", title: "Controller" },
      { data: "message", title: "Message" },
    ],
    order: [[1, "desc"]],
  });
  tableSystemLogs
    .on("order.dt search.dt", function () {
      tableSystemLogs
        .column(0, { search: "applied", order: "applied" })
        .nodes()
        .each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
    })
    .draw();
});
