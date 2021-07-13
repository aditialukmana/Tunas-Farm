var urlPlantData = $("#tablePlantData").data("url");
var tablePlantData = null;
$(document).ready(function () {
  tablePlantData = $("#tablePlantData").DataTable({
    ajax: urlPlantData,
    columns: [
      { data: "decode", title: "Device" },
      { data: "grcode", title: "Grow Installation" },
      { data: "pdwater", title: "Water Temperature" },
      { data: "pdair", title: "Air Temperature" },
      { data: "pdhumidity", title: "Humidty" },
      { data: "pdtds", title: "TDS" },
      { data: "pdph", title: "PH" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 delete-plantdata" title="Delete" data-id="' +
            items.pdid +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  $(document).on("click", ".delete-plantdata", function (e) {
    e.preventDefault();
    var del_id = $(this).data("id");
    Swal.fire({
      title: "Apakah kamu yakin?",
      text: "Data yang telah terhapus tidak bisa dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: urlPlantData + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tablePlantData.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

//   $("#add_plantdata").click(function () {
//     var dataJson = $("#create_PlantData_form").serialize();
//     $.ajax({
//       url: urlPlantData,
//       type: "POST",
//       data: dataJson,
//       dataType: "json",
//       success: function (data) {
//         notifAddSuccess();
//         tablePlantData.ajax.reload();
//         $("#modal_create").modal("hide");
//         $("#create_PlantData_form")[0].reset();
//       },
//     });
//   });

//   $.ajax({
//     url: "http://localhost/tunasdash/api/devices",
//     type: "POST",
//     dataType: "json",
//     success: function (data) {
//       $("#device").append(
//         "<option value='" +
//           data.data[i].code +
//           "'>" +
//           data.data[i].code +
//           "</option>"
//       );
//     },
//   });

//   $.ajax({
//     url: "http://localhost/tunasdash/api/growinstallations",
//     type: "POST",
//     dataType: "json",
//     success: function (data) {
//       $("#grow_installation").append(
//         "<option value='" +
//           data.data[i].code +
//           "'>" +
//           data.data[i].code +
//           "</option>"
//       );
//     },
//   });
});
