var urlPlantData = $("#tablePlantData").data("url");
var tablePlantData = null;
$(document).ready(function () {
  tablePlantData = $("#tablePlantData").DataTable({
    ajax: urlPlantData,
    dataSrc: function (data) {
      console.log(data);
      if (data.data == []) {
        return [];
      } else {
        return data.data;
      }
    },
    columns: [
      { data: "device", title: "Device" },
      { data: "grow_installation", title: "Grow Installation" },
      { data: "water", title: "Water Temperature" },
      { data: "air", title: "Air Temperature" },
      { data: "humidity", title: "Humidty" },
      { data: "tds", title: "TDS" },
      { data: "ph", title: "PH" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-plantdata" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_update"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-plantdata" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
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
