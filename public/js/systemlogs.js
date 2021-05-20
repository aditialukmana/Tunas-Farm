$(document).ready(function () {
    var urlSystemLogs = $("#tableSystemLogs").data("url");
    $.ajax({
      url: urlSystemLogs,
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        var i = 1;
        var tableSystemLogs = $("#tableSystemLogs").DataTable({
          data: data,
          columns: [
            { data: null, title: "No" },
            { data: "timestamp", title: "Timestamp" },
            { data: "user", title: "User" },
            { data: "controller", title: "Controller" },
            { data: "message", title: "Message" },
          ],
          order: [[1, "asc"]],
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
      },
    });
  });