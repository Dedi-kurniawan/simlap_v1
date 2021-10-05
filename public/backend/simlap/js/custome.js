function notifToast(action, title, message) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    switch (action) {
        case 'add':
            toastr.success(message, title);
            break;
        case 'addClose':
            toastr.success(message, title);
            break;
        case 'edit':
            toastr.info(message, title);
            break;
        case 'delete':
            toastr.error(message, title);
            break;
        case 'error':
            toastr.warning(message, title);
            break;
        default:
            break;
    }
}

$("#form_validate").validate({
    // errorElement: 'div',
    ignore: ".ignore",
    errorPlacement: function (error, element) {
    error.addClass("invalid-feedback");
        if(element.hasClass('selectForm') && element.next('.select2-container').length) {
            error.insertAfter(element.next('.select2-container'));
        } 
        else if(element.hasClass('selectform') && element.next('.select2-container').length) {
            error.insertAfter(element.next('.select2-container'));
        }
        else if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        }
        // else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
        //     error.insertAfter(element.parent().parent());
        // }
        // else if (element.prop('type') === 'radio') {
        //     error.insertAfter(element.parent());
        // }
        else if (element.attr("id") == "description") {
            error.insertAfter(".ck-editor");
        }
        else {
            error.insertAfter(element);
        }
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
    }
});

$.validator.messages.required = function (param, input) {
    return 'kolom ' + input.id.replaceAll("_", " ") + ' di larang kosong';
}

jQuery.extend(jQuery.validator.messages, {
    email: "Silakan masukkan format email yang benar.",
	url: "Silakan masukkan format URL yang benar.",
	date: "Silakan masukkan format tanggal yang benar.",
	dateISO: "Silakan masukkan format tanggal(ISO) yang benar.",
	number: "Silakan masukkan angka yang benar.",
	digits: "Harap masukan angka saja.",
	creditcard: "Harap masukkan format kartu kredit yang benar.",
	equalTo: "Harap masukkan nilai yg sama dengan sebelumnya.",
	maxlength: $.validator.format( "Input dibatasi hanya {0} karakter." ),
	minlength: $.validator.format( "Input tidak kurang dari {0} karakter." ),
	rangelength: $.validator.format( "Panjang karakter yg diizinkan antara {0} dan {1} karakter." ),
	range: $.validator.format( "Harap masukkan nilai antara {0} dan {1}." ),
	max: $.validator.format( "Harap masukkan nilai lebih kecil atau sama dengan {0}." ),
	min: $.validator.format( "Harap masukkan nilai lebih besar atau sama dengan {0}." )
});

$('#formModal').on('hidden.bs.modal', function () {
    $('#formModal form')[0].reset();
    $(".selectform").val("").trigger("change");
    $("#form_validate").valid();
    $('input').removeClass("is-valid").removeClass("is-invalid");
    $('.selectform').removeClass("is-valid").removeClass("is-invalid");
    $('.radio-inline').removeClass("is-valid").removeClass("is-invalid");
});

function startLoading() {
    $('#submitData').addClass("spinner spinner-left");
}

function finishLoading() {
    $('#submitData').removeClass("spinner spinner-left");
}

$('.selectform').select2({
    width: "100%",
    language: {
        noResults: function() {
          return 'Data tidak di temukan';
        },
      },
      escapeMarkup: function(markup) {
        return markup;
      },
}).on("change", function () {
    $(this).valid(); 
});

$(".select2_filter").select2({
    width: "100%",
    language: {
        noResults: function() {
          return 'Data tidak di temukan';
        },
      },
      escapeMarkup: function(markup) {
        return markup;
      },
});

var arrows = {
    leftArrow: '<i class="la la-angle-right"></i>',
    rightArrow: '<i class="la la-angle-left"></i>'
}

$('.date_picker').datepicker({
    orientation: "top left",
    todayHighlight: true,
    templates: arrows,
    format: 'yyyy-mm-dd', 
});

$(document).key('alt+n', function () {
    createData();
});

$(document).key('alt+w', function () {
    $("#editData").click();
});

$(document).key('alt+q', function () {
    $("#deleteData").click();
});

$(document).key('alt+r', function () {
    $("#showData").click();
});

if($('#modal-key').length){
    $(window).on('load', function () {
        $('#modal-key').modal('show');
    });

    
    $(".kecamatan").on("input", function () {
        return getDesa($(this).val(), "");
    });
    
    function getDesa(district_id, village_id) {
        $.ajax({
            url: HOST_URL + '/get-desa-modal-school',
            method: "GET",
            data: {
                district_id: district_id,
                village_id: village_id,
            },
            dataType: 'json',
            success: function(data) {
                $("#village_id").html('');
                $("#village_id").html(data.options);
                return false;
            }
        });
    }
}