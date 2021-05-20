$(document).ready(function () {
    var urlPlantData = $("#tablePlantData").data("url");
    $.ajax({
      url: urlPlantData,
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        var i = 1;
        var tablePlantData = $("#tablePlantData").DataTable({
          data: data,
          columns: [
            { data: null, title: "No", width: "10%" },
            { data: "device", title: "Device" },
            { data: "water", title: "Water Temperature" },
            { data: "air", title: "Air Temperature" },
            { data: "humidity", title: "Humidity" },
            { data: "tds", title: "TDS" },
            { data: "ph", title: "PH" },
            { data: "waterstatus", title: "Water Tank Status" },
            {
              data: (items) => {
                return (
                 '<a href="javascript:void(0);" class="btn btn-success mb-2" title="Edit" data-id="' +
                  items.id +
                  '" data-toggle="modal" data-target="#modal_update"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a> <a href="javascript:void(0);" class="btn btn-danger mb-2 delete-customer" title="Delete" data-id="' +
                  items.id +
                  '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></a>'
                );
              },
              title: "Action",
            },
          ],
          order: [[1, "asc"]],
        });
        tablePlantData
          .on("order.dt search.dt", function () {
            tablePlantData
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