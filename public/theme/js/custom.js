// Initalize

// $(function() {
//   $('.dropify').dropify();
//   var drEvent = $('#dropify-event').dropify();
//   drEvent.on('dropify.beforeClear', function(event, element) {
//     return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
//   });
//   drEvent.on('dropify.afterClear', function(event, element) {
//     alert('File deleted');
//   });
// });

// // Initialization
// $('.select2').select2();

// $('.dropify').dropify();
// var drEvent = $('#dropify-event').dropify();
// drEvent.on('dropify.beforeClear', function(event, element) {
//   return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
// });
// drEvent.on('dropify.afterClear', function(event, element) {
//   alert('File deleted');
// });

// Specific Use
var savePrivilege = function(){
  $.ajax({
    url: base_url()+'/backend/save_privilege',
    type: 'POST',
    dataType: 'json',
    data: $('#formPrivilegeSet').serialize()
  })
  .done(function(data) {
    swal("Success", "Privilege was Set !!", "success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

$(document).ready(function() {
  $('#positionCode').change(function(e) {
    renderPrivilegeCheck();
  });
});

function renderPrivilegeCheck(){
  let positionCode = $('#positionCode').val();
  $.ajax({
    url: base_url()+'/backend/get_privilege_session',
    type: 'POST',
    dataType: 'JSON',
    data: {positionCode: positionCode}
  })
  .done(function(data) {
    $('.check-input').prop('checked', false);
    if (data.length > 0) {
      jQuery.map(data, function(module, index ){
        $( "#"+module ).prop( "checked", true );
        console.log(module);
      });
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

// Common control
function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = ",") {
  try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 0 : decimalCount;
    const negativeSign = amount < 0 ? "-" : "";
    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
    let j = (i.length > 3) ? i.length % 3 : 0;
    return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
  } catch (e) {
    console.log(e)
  }
}

$(".delete_btn").click(function(e){
  e.preventDefault();
  var url = $(this).attr("id_url");
  console.log(url)
  $("#delete_footer").attr("href", url);
});

$(document).on('click', "#forgot-password-link", function(e) {
  e.preventDefault();
  $("#signin-section").hide()
  $("#forgot-password-section").show()
});

$("#signin-link").click(function(e){
  e.preventDefault();
  $("#signin-section").show()
  $("#forgot-password-section").hide()
});

// -----------------------------
// Edit control
// -----------------------------
$(document).on('click', ".edit_position", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    $("#code_ref").val(data.data.code);
    $("#code_edit").val(data.data.code);
    $("#code_edit").prop('readonly', data.readonly_id);
    $("#name_edit").val(data.data.name);
  });
});

$(document).on('click', ".edit_user", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    console.log(data)
    $("#id").val(data.data.id);
    $("#customerCode_edit").val(data.data.customerCode).change();

    $("#username_edit").val(data.data.username);
    $("#name_edit").val(data.data.name);
    $("#email_edit").val(data.data.email);
    $("#position_edit").val(data.data.position).change();
    $("#active_edit").val(data.data.active).change();
  });
});

$(document).on('click', ".edit_customer", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    console.log(data)
    $("#custCode_edit").val(data.data.custCode);
    $("#headCustCode_edit").val(data.data.headCustCode);
    $("#name_edit").val(data.data.name);
    $("#address_edit").val(data.data.address);
    $("#city_edit").val(data.data.city);
    $("#postalCode_edit").val(data.data.postalCode);
    $("#phone_edit").val(data.data.phone);
    $("#fax_edit").val(data.data.fax);
    $("#npwp_edit").val(data.data.npwp);
  });
});

$(document).on('click', ".edit_packsize", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    $("#id").val(data.data.id);
    $("#name_edit").val(data.data.name);
  });
});

$(document).on('click', ".edit_packaging", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    $("#id").val(data.data.id);
    $("#name_edit").val(data.data.name);
  });
});

$(document).on('click', ".edit_category", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    $("#id").val(data.data.id);
    $("#name_edit").val(data.data.name);
    $("#parentId_edit").val(data.data.parentId).change();
  });
});

$(document).on('click', ".edit_news", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    console.log(data)
    $("#id").val(data.data.id);
    $("#title_edit").val(data.data.title);
    $("#author_edit").val(data.data.author);
    $("#publish_edit").val(data.data.publish).change();
    tinymce.get('content_edit').setContent(data.data.content);
  });
});

$(document).on('click', ".view_news", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    $("#news-title").html(data.data.title);
    $("#news-content").html(data.data.content);
  });
});

$(document).on('click', ".edit_special_offer", function(e) {
  e.preventDefault();
  var url = $(this).data('url')
  $.getJSON(url, function (data) {
    console.log(data)
    $("#id").val(data.data.id);
    $("#title_edit").val(data.data.title);
    $("#publish_edit").val(data.data.publish).change();
    tinymce.get('content_edit').setContent(data.data.content);
  });
});

function renderPrivilegeCheck(){
  let positionCode = $('#positionCode').val();
  $.ajax({
    url: base_url()+'/backend/get_privilege_session',
    type: 'POST',
    dataType: 'JSON',
    data: {positionCode: positionCode}
  })
  .done(function(data) {
    $('.check-input').prop('checked', false);
    if (data.length > 0) {
      jQuery.map(data, function(module, index ){
        $( "#"+module ).prop( "checked", true );
        console.log(module);
      });
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

function generateLabel(status){
  // console.log('asd : '+status);
  if (status.toUpperCase() == 'PENDING') {
    return '<span class="badge badge-info">OPEN</span>';
  }else if (status.toUpperCase() == 'ACCEPTED') {
    return '<span class="badge badge-success">ACCEPTED</span>';
  }else if (status.toUpperCase() == 'REJECTED') {
    return '<span class="badge badge-danger">REJECTED</span>';
  }

  return '<span class="badge badge-primary">'+status+'</span>';
}

function dataPO(){
  var url = $('#tablePO').data('url');
  console.log(url);
  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'JSON'
  })
  .done(function(d) {
    // console.log(d.data);
    if (d.data.length > 0) {
      if (typeof(tablePO) !== 'undefined') {
        console.log(tablePO);
        // tablePO.rows().remove().draw();
        // tablePO.rows.add(d.data).draw();
      }
    }

    console.log("success");
  })
  .fail(function() {
    console.log("error");
  });

  // $('#tablePO').dataTable( {
  //   ajax: {
  //     url : url,
  //     type: "GET"
  //   },
  //   columns: [
  //     { "data":  'action'},
  //     { "data": "poNo" },
  //     { "data": (items)=> { return generateLabel(items.status) } },
  //     { "data": "poDate" },
  //     { "data": "custCodeFinal" },
  //     { "data": "custAddressFinal" },
  //     { "data": (items)=> { return '<a href="'+base_url()+'/admin/po_detail/'+items.poMasterId+'/view">'+items.details+'</a>'}},
  //     { "data": "remarks" },
  //     ]
  // });
}

// dataPODetail =
//   $('#tablePODetail').DataTable( {
//     responsive: true,
//     columns: [
//       {data: 'code', name: 'code',  title : 'Code'},
//       {data: 'name', name: 'name',  title : 'Name'},
//       {data: 'packSize', name: 'packSize',  title : 'Pack Size'},
//       {data: 'packaging', name: 'packaging',  title : 'Packaging'},
//       {data: 'qty', name: 'qty',  title : 'Qty'}
//     ],
//   });

function getDataPODetail(data){

  $.ajax({
    url: data.url,
    type: 'POST',
    dataType: 'JSON',
    data: data
  })
  .done(function(data) {
    if (data.data.length > 0) {
      tablePODetail.rows().remove().draw();
      tablePODetail.rows.add(data.data).draw();
      $('#tablePODetail_wrapper').show();
      $('#byPDF').hide();
    } else {
      tablePODetail.rows().remove().draw();
      $('#byPDF').html('<table style="width: 100%"><tr><td style="text-align: center;">Order By PDF</td></tr></table>');
      $('#byPDF').show();
      $('#tablePODetail_wrapper').hide();
    }
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  });
}

function dataPODetailPage(){
  var url         = base_url()+'/backend/data_po_detail/1';
  var id          = $('#tablePODetailPage').data('id');
  var access      = window.location.pathname;
  access          = access.split('/');
  access          = access[access.length-1];

  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'JSON',
    data: { id : id , access : access}
  })
  .done(function(data) {
    if (data.data.length > 0) {
      tablePODetailPage.rows().remove().draw();
      tablePODetailPage.rows.add(data.data).draw();
    }
    let str='';
    jQuery.each(data.files, function(index, val){
      var link = (val.dir.substr(0,1) != '/' && val.dir.substr(1,1) == '/') ? val.dir.substr(1,val.dir.length) : val.dir;

      str+='<li><a href="'+base_url()+link+'">'+val.file+'</a></li>';
    });

    $('#list-supported-file').html(str);

    let dist='';
    jQuery.each(data.files_dist, function(index, val){
      var link = (val.dir.substr(0,1) != '/' && val.dir.substr(1,1) == '/') ? val.dir.substr(1,val.dir.length) : val.dir;

      dist+='<li><a href="'+base_url()+link+'">'+val.file+'</a></li>';
    });
    $('#list-supported-file-dist').html(dist);
    console.log("success");
    // console.log(data);
  })
  .fail(function() {
    console.log("error");
  });
}

$('body').delegate('#tablePO tbody').on('click', '.po_btn', function(e){
  e.preventDefault();
  var data = $(this).data();
  console.log(data);

  if(data.type == 'upload'){
    $('[name=poMasterId]').val(data.id);
    $('#formUpload').attr('action', data.url);
    $('.upload-modal').modal('show');
    return 0;
  }

  $('[name=poMasterId]').val(data.id);
  $('[name=action]').val(data.type);

  if (data.type == 'accept') {
    $('.btn-confirm').text('CONFIRM ACCEPT').addClass('btn-success').removeClass('btn-danger').removeClass('btn-warning');
    $("form#formConfirm textarea").prop('required', false);
  } else if (data.type == 'reject') {
    $('.btn-confirm').text('CONFIRM REJECT').addClass('btn-danger').removeClass('btn-success').removeClass('btn-warning');
    $("form#formConfirm textarea").prop('required', true);
  } else if (data.type == 'cancel') {
    $('.btn-confirm').text('CONFIRM CANCEL').addClass('btn-warning').removeClass('btn-success').removeClass('btn-danger');
    $("form#formConfirm textarea").prop('required', true);
  }

  if(data.type != 'update') {
    getDataPODetail(data);

    $('.po-detail-modal').modal('show');
  } else {
    window.location = data.url;
  }

});

$('body').delegate('.po-detail-modal').on('click', '.po_confirm_btn', function(e){
  let datas = $('#formConfirm').serialize();
  let act = $('#formConfirm input[name="action"]').val();
  let notes = $('#formConfirm textarea[name="remarks"]').val();

  if(act != 'accept' && notes == '') {
    // console.log(notes);
    swal("Error", "Please input Notes !!", "error");
    return false;
  }

  $.ajax({
    url: base_url()+'/backend/confirm_action',
    type: 'POST',
    dataType: 'JSON',
    data: datas
  })
  .done(function(data) {
    if (data.status) {
      tablePO.ajax.reload();
      // let url = base_url()+'/backend/get_list_po';
      // tablePO.ajax.url().load();
      // dataPO();
      $('.po-detail-modal').modal('hide');
      swal("Success", data.action+' PO was Success !!!', "success");
    }
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  });
});

function updatePO(){
  $('.help-block').text('').removeClass('text-red');
  let type = $('.po_update_btn').data('type');
  let inputs = (type == 'normal') ? tablePODetailPage.$('input').serializeArray() : $('form#iCustom').serializeArray();
  console.log(inputs);
  $.ajax({
    url: base_url()+'/backend/update_po/'+type,
    type: 'POST',
    dataType: 'JSON',
    data: inputs
  })
  .done(function(data) {

    if (data.status) {
      window.location = base_url()+'/admin/po/accepted';
    }else{
      for (var i = 0; i < data.errorName.length; i++) {
        $('[name="'+data.errorName[i]+'"]').next().text(data.errorMessage[i]).addClass('text-red');
      }

      swal("Error", "Some input is not valid !!", "error");
    }
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}

$('body').delegate('.po-detail-page').on('click', '.po_update_btn', function(e){
  let type = $(this).data('type');
  let items = (type == 'normal') ? tablePODetailPage.$('input').serializeArray() : Array('custom');

  if (items.length < 1) {
    swal("Stop", "Detail info is empty !!!", "error");
    return 0;
  }

  swal({
    title: "Update PO?",
    type: "warning",
    html: true,
    showCancelButton: true,
    confirmButtonColor: "#dc3545",
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    closeOnConfirm: false,
    closeOnCancel: false
  }, function (isConfirm) {
    if (isConfirm) {
      updatePO();
    } else {
      swal("Cancelled", "PO Update not Processed", "error");
    }
  });
});

$(document).on('click', ".edit_product", function(e) {
  e.preventDefault();
  var url = $(this).data('url')

  $.getJSON(url, function (data) {
    $('#edit_product_form')[0].reset();
    $("#id").val(data.data.id);
    $("#code_edit").val(data.data.code);
    $("#name_edit").val(data.data.name);
    $("#packsize_edit").val(data.data.packSize);
    $("#description_edit").val(data.data.description);
    $('#category_edit').val(JSON.parse(data.data.categoryId)).trigger('change');
    // $('#category_edit').val(JSON.parse(data.data.categoryId)).change();
    $('#subcategory_edit').val(JSON.parse(data.data.subcategoryId)).trigger('change');
    // $('#subcategory_edit').val(JSON.parse(data.data.subcategoryId)).change();
    $('#packaging_edit').val(JSON.parse(data.data.packaging)).trigger('change');
    // $('#packaging_edit').val(JSON.parse(data.data.packaging)).change();
    // $('#packaging_edit').trigger('input').trigger('change');
    // $('#packaging_edit').trigger('toggle', {});
    // $('#category_edit').select2({
    //   multiple: true,
    //   tags: true,
    //   dropdownParent: $('#modal_edit')
    // });
    // $('#subcategory_edit').select2({
    //   multiple: true,
    //   tags: true,
    //   dropdownParent: $('#modal_edit')
    // });
    // $('#packaging_edit').select2({
    //   multiple: true,
    //   tags: true,
    //   dropdownParent: $('#modal_edit')
    // });
    // $('#category_edit').val(JSON.parse(data.data.categoryId));
    // $('#subcategory_edit').val(JSON.parse(data.data.subcategoryId));
    // $('#packaging_edit').val(JSON.parse(data.data.packaging));
  });
});

$(document).on('keyup', '.setting', function(e){
  let n   = $(this).attr('name');
  $('.setting-btn[data-name="'+n+'"]').show();
});

$(document).on('click', '.setting-btn', function(e){
  let url = $('#setting_form').attr('action');
  let n   = $(this).data('name');
  let v   = $('#'+n).val();
  let l   = $('label[for="'+n+'"]').html()

  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'JSON',
    data: {name: n, value: v}
  })
  .done(function(data) {
    if (data.status) {
      swal("Success", l+' has changed !!!', "success");
    } else {
      swal("Error", ' Error!!!', "danger");
    }
    $('.setting-btn[data-name="'+n+'"]').hide();
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  });
});

//document ready
$(document).ready(function() {
	$('#positionCode').change(function(e) {
    renderPrivilegeCheck();
  });

  setTimeout(function(){
    tablePO = $('#tablePO').DataTable( {
      ajax: $('#tablePO').data('url'),
        // responsive: true,
        columns: [
          { "data":  'action',  title : 'Action'},
          { "data": "poNo" ,  title : 'PO Number'},
          { "data": (items)=> { return generateLabel(items.status) },  title : 'Status' },
          { "data": "poDate" ,  title : 'Order Date'},
          { "data": "soldToCustCode",  title : 'Sold To' },
          { "data": "custCodeFinal" ,  title : 'Ship To'},
          { "data": "custAddressFinal" ,  title : 'Ship Address'},
          { "data": (items)=> { return '<a href="'+base_url()+'/admin/po_detail/'+items.poMasterId+'/view">'+items.details+'</a>'},  title : 'Order Detail'},
          { "data": 'filehtml',  title : 'Supporting File'}
        ],
        order: [[ 3, "desc" ]]
      });

      tablePODetail = $('#tablePODetail').DataTable( {
        responsive: true,
        columns: [
          {data: 'code', name: 'code',  title : 'Code'},
          {data: 'name', name: 'name',  title : 'Name'},
          {data: 'packSize', name: 'packSize',  title : 'Pack Size'},
          {data: 'packaging', name: 'packaging',  title : 'Packaging'},
          {data: 'qty', name: 'qty',  title : 'Qty'}
        ],
      });

      tablePODetailPage = $('#tablePODetailPage').DataTable( {
        // responsive: true,
        retrieve: true,
        columns: [
          {data: 'code', name: 'code'}, //,  title : 'Code'
          {data: 'name', name: 'name'},//,  title : 'Name'
          {data: 'packSizeName', name: 'packSizeName'},//,  title : 'Pack Size'
          {data: 'packaging', name: 'packaging'},//,  title : 'Packaging'
          {data: 'qty', name: 'qty'},//,  title : 'Qty'
          {data: 'remarks', name: 'remarks'},
          {data: 'orderDate', name: 'orderDate'},//,  title : 'Order Date'
          {data: (items)=> {
            let exp = '';
            if (items.access == 'update') {
              exp = '<input type="hidden" name="poMasterId" value="'+items.poMasterId+'"><input type="date" class="form-control datepicker" value="'+items.expDate+'" name="expDate['+items.poDetailID+']" placeholder="EXP date"/><span class="help-block"></span>';
            }else{
              exp = items.expDate;
            }
            return exp;
          }, name: 'expDate'}, //,  title : 'Expire Date'
          {data: (items)=> {
            let stock = '';
            if (items.access == 'update') {
              stock = '<input type="number" class="form-control datepicker" value="'+items.stock+'" name="stock['+items.poDetailID+']" placeholder="EXP date"/><span class="help-block"></span>';
            }else{
              stock = items.stock;
            }
            return stock;
          }, name: 'stock'}, //,  title : 'Product Availability'
          {data: (items)=> {
            let delTime = '';
            if (items.access == 'update') {
              delTime = '<input type="date" class="form-control datepicker" value="'+items.delTime+'" name="delTime['+items.poDetailID+']" placeholder="EXP date"/><span class="help-block"></span>';
            }else{
              delTime = items.delTime;
            }
            return delTime;
          }, name: 'delTime'}, //,  title : 'Delivery Time'
          {data: (items)=> {
            let sysmexRemarks = '';
            if (items.access == 'update') {
              sysmexRemarks = '<input type="text" class="form-control" value="'+items.sysmexRemarks+'" name="sysmexRemarks['+items.poDetailID+']" placeholder="Remarks"/><span class="help-block"></span>';
            }else{
              sysmexRemarks = items.sysmexRemarks;
            }
            return sysmexRemarks;
          }, name: 'sysmexRemarks'}, //,  title : 'Sysmex Remarks'
        ],
      } );

  }, 700);

  setTimeout(function(){
    var type        = window.location.pathname;
    type            = type.split('/');
    type            = type[type.length-3];

    // var pageDataPO = [
    //   base_url()+'/admin',
    //   base_url()+'/admin/order_list',
    //   base_url()+'/admin/po/accepted'
    // ];

    var urlDataPODetail = [
      'po_detail',
    ];

    // console.log(pageDataPO,window.location.href,pageDataPO.includes(window.location.href));
    // if(pageDataPO.includes(window.location.href)) {
    //   dataPO();
    // }

    if(urlDataPODetail.includes(type)) {
      dataPODetailPage();
    }

  }, 1000);
});

$(document).on('click', ".view_special_offer", function(e) {
  e.preventDefault();
  var url = $(this).data('url');
  $.getJSON(url, function (data) {
    $("#special_offer-title").html(data.data.title);
    $("#special_offer-content").html(data.data.content);
  });
});

$(document).on('click', ".edit_faq", function(e) {
  e.preventDefault();
  var url = $(this).data('url');
  $.getJSON(url, function (data) {
    console.log(data)
    $("#id").val(data.data.id);
    $("#question_edit").val(data.data.question);
    $("#answer_edit").val(data.data.answer);
    $("#publish_edit").val(data.data.publish).change();
  });
});

$(document).on('click', ".read-msg", function(e) {
  e.preventDefault();
  var url = base_url()+'/backend/contact_us_read';
  var id = $(this).data('id');
  var status = $(this).data('status');

  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'JSON',
    data: {id: id, status: status}
  })
  .done(function(data) {
    if (data.status) {
      swal("Success", 'Message has changed !!!', "success");
    } else {
      swal("Error", ' Error!!!', "danger");
    }
    location.reload();
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  });
});

var Profile = function(){
  var HandleChangePassword = function(){
		$('.parsley-error').removeClass('parsley-error');
		$('#formChangePassword span').text('');
    $.ajax({
    	url: base_url()+'/backend/update_password',
    	type: 'POST',
    	dataType: 'json',
    	data: $('#formChangePassword').serialize()
    })
    .done(function(data) {
    	// console.log("success");
			if (data.status) {

				// toastr['success']('Update Password Success !!', '' , {
				// 	positionClass: 'toast-bottom-right'
        // });
        swal("Success", "Update Password Success !!", "success");

        $("input[name='passwordOld']").val('');
        $("input[name='passwordNew']").val('');
        $("input[name='passwordRe']").val('');

			}else{
				for (var i = 0; i <= data.nameError.length; i++) {
					$('[name="'+data.nameError[i]+'"]').next().text(data.messageError[i]).addClass('text-danger');
					$('[name="'+data.nameError[i]+'"]').addClass('parsley-error');
				}
			}
    })
    .fail(function() {
			swal("Error!", "Update Failed !!!", "error");
    })
    .always(function() {
    	console.log("complete");
    });

  }

	var HandleUpdateProfile = function(){
		// $('.parsley-error').removeClass('parsley-error');
		// $('#formChangePassword span').text('');
    $.ajax({
    	url: base_url()+'/backend/update_profile',
    	type: 'POST',
    	dataType: 'json',
    	data: $('#formProfile').serialize()
    })
    .done(function(data) {
    	// console.log("success");
			if (data.status) {

				// toastr['success']('Update Profile Success !!', '' , {
				// 	positionClass: 'toast-bottom-right'
        // });
        swal("Success", "Update Profile Success !!", "success");

			}else{
				for (var i = 0; i <= data.nameError.length; i++) {
					$('[name="'+data.nameError[i]+'"]').next().text(data.messageError[i]).addClass('text-danger');
					$('[name="'+data.nameError[i]+'"]').addClass('parsley-error');
				}
			}
    })
    .fail(function() {
    	// console.log("error");
			swal("Error!", "Update Failed !!!", "error");
    })
    .always(function() {
    	console.log("complete");
    });
	}

  return {
    changePassword: function(){
      HandleChangePassword();
    },
		updateProfile: function(){
			HandleUpdateProfile();
		}
  }
}();
