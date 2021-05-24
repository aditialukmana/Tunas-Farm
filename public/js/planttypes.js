$(document).ready(function () {
  var urlPlantTypes = $("#tablePlantTypes").data("url");
  $.ajax({
    url: urlPlantTypes,
    type: "get",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 1;
      var tableUsers = $("#tablePlantTypes").DataTable({
        data: data,
        columns: [
          { data: null, title: "No", width: "10%" },
          { data: "code", title: "Plant ID" },
          { data: "name", title: "Name" },
          {
            data: "image",
            title: "Image",
            render: function (data) {
              var url = "http://localhost/tunasdash/public/uploads/";
              return '<img src="'+ url +''+ data +'" height="100px" width="100px">';
            },
          },
          {
            data: (items) => {
              return (
                '<a href="javascript:void(0);" class="btn btn-primary mb-2 detail-user" title="Details" data-id="' +
                items.id +
                '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:void(0);" onclick="return editUser();" class="btn btn-success mb-2" title="Edit" data-id="' +
                items.id +
                '" data-toggle="modal" data-target="#modal_update"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a> <a href="javascript:void(0);" class="btn btn-danger mb-2 delete-user" title="Delete" data-id="' +
                items.id +
                '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></a>'
              );
            },
            title: "Action",
          },
        ],
        order: [[1, "asc"]],
      });
      tableUsers
        .on("order.dt search.dt", function () {
          tableUsers
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
