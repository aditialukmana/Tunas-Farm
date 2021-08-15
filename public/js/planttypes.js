var urlPlantTypes = $("#tablePlantTypes").data("url");
var tablePlantTypes = null;
var url = "http://localhost/tunasdash/public/uploads/";
$(document).ready(function () {
  tablePlantTypes = $("#tablePlantTypes").DataTable({
    ajax: urlPlantTypes,
    columns: [
      { data: "code", title: "Plant ID" },
      { data: "name", title: "Name" },
      {
        data: "image",
        title: "Image",
        render: function (data) {
          return (
            '<img src="' +
            url +
            data +
            '" height="100px" width="100px" class="img-thumbnail">'
          );
        },
      },
      { data: "est_harvest_time", title: "Est Harvest Time" },
      { data: "est_weight", title: "Est Weight" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-plant" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_update_plant"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-plant" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Actions ",
      },
    ],
    order: [[1, "desc"]],
  });

  $("#add_plant").click(function () {
    var formData = new FormData($("#create_PlantType_form")[0]);
    $.ajax({
      url: urlPlantTypes,
      type: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        $("#modal_create_plant").modal("hide");
        $("#create_PlantType_form")[0].reset();
        tablePlantTypes.ajax.reload();
      },
    });
  });



  $(document).on("click", ".edit-plant", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlPlantTypes + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").val(data.data.id);
        $("#name_edit").val(data.data.name);
        $("#harvest_edit").val(data.data.est_harvest_time);
        $("#weight_edit").val(data.data.est_weight);
      },
    });
  });

  $("#edit_plant").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = {
      name: $("#name_edit").val(),
      est_harvest_time: $("#harvest_edit").val(),
      est_weight: $("#weight_edit").val(),
    };
    $.ajax({
      url: urlPlantTypes + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_update_plant").modal("hide");
        $("#update_PlantType_form")[0].reset();
        tablePlantTypes.ajax.reload();
      },
    });
  });

  // var anak = {
  //   anak1: "Seorang anak bernama rudy umurnya 5 tahun, suka bermain sepak bola",
  //   anak2: "Seorang anak bernama lisa umurnya 3 tahun, suka bermain boneka",
  // };

  // console.log(anak);

  $(document).on("click", ".delete-plant", function (e) {
    e.preventDefault();
    var del_id = $(this).data("id");
    Swal.fire({
      title: "Apakah kamu yakin?",
      text: "Data yang telah terhapus tidak bisa dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: urlPlantTypes + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tablePlantTypes.ajax.reload();
          },
        });
      }
    });
  });
});
