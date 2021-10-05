"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    // responsive: true,
    scrollX: true,
    autoWidth: true,
    select: true,
    "deferRender": true,
    "bSortClasses": false,
    "pageLength": 50,
    "lengthMenu": [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Semua"]
    ],
    ajax: {
        method: 'POST',
    	url: HOST_URL + '/dt/admin/paud/akun',
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'name',
            name: 'name',
            orderable: true,
            searchable: true,
        },
        {
            data: 'school.nama_sekolah',
            name: 'school.nama_sekolah',
            orderable: true,
            searchable: true,
        },
        {
            data: 'email',
            name: 'email',
            orderable: false,
            searchable: false,
        },
        {
            data: 'status',
            name: 'status',
            orderable: false,
            searchable: false,
        }
    ],
    columnDefs: [{
        "targets": '_all',
        "defaultContent": "-"
    }],
    "language": {
        "lengthMenu": "<div class='ml-2 mt-2'> _MENU_ </div>",
        "zeroRecords": "DATA TIDAK ADA ",
        "info": "Total Data :  _TOTAL_ ",
        "infoEmpty": "DATA TIDAK ADA",
        "infoFiltered": "",
        "search": "<div class='mr-2 mt-2'>cari : _INPUT_ </div>",
        "searchPlaceholder": "Cari...",
        "processing":'<div class="spinner spinner-primary spinner-left mr-3">loading...</div>'
    },
    "initComplete": function(oSettings) { 
        $(".dataTables_length").append("<button class='btn btn-danger font-weight-bolder ml-2 mr-2' id='deleteData'><i class='fa fa-trash'></i>Hapus(ALT+Q)</button><button class='btn btn-success font-weight-bolder mr-2' id='editData'><i class='fa fa-edit'></i>Edit(ALT+W)</button><button data-container='body' data-toggle='tooltip' title='Reset Passwod' class='btn btn-dark font-weight-bolder mr-2' id='resetPassword'><i class='fas fa-lock'></i>Reset Password (ALT+T)</button>");
    },
    "fnDrawCallback": function() {
        if(table.row(1).data() == undefined){
            $('#datatable tbody tr:first td:last span').removeAttr('data-toggle');
        }
    },
});

function createData() {
    $(".modal-title").html("Formulir Tambah Operator Sekolah");
    $("#submitData").val("add");
    $(".method-hidden").html("");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formModal").modal("show");
}


$(document).on("click", "#editData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/admin/paud/akun/' + id + '/edit';
        $.get(url, function (d) {
            if (d.status == 'success') {
                $('#nama_sekolah').val(d.edit.school_id).trigger('change');
                $('#name').val(d.edit.name);
                $('#email').val(d.edit.email);
                $("#id_edit").val(id);
                $(".modal-title").html("Formulir Ubah Data Kondidi Sarana & Prasarana paud");
                $("#submitData").val("edit");
                $("#formModal").modal("show");
                $("#submitData").html('<i class="fa fa-edit"></i> Ubah');
                $(".method-hidden").html("<input type='hidden' name='_method' value='PUT'/>")
                return false;
            } else if ((d.status == 'error')) {
                notifToast("error", "EDIT DATA GAGAL", "data tidak di temukan");    
                return false;
            }
        });
    } else {
        notifToast("error", "EDIT DATA GAGAL", "Pilih salah satu data untuk di edit");    
        return false;    
    }   
});


$("#submitData").click(function (event) {
    event.preventDefault();
    startLoading();
    var validat = $("#form_validate").valid();
    var action = $(this).val();
    if (!validat) {
        finishLoading();
        return false;
    }

    if (action == "add") {
        var url = HOST_URL + '/admin/paud/akun';
        var title = "TAMBAH DATA";
    } else if (action == "edit") {
        var id    = $("#id_edit").val();
        var url   = HOST_URL + '/admin/paud/akun/' + id;
        var title = "UBAH DATA";
    }

    $.ajax({
        url: url,
        method: "POST",
        data: $('#form_validate').serialize(),
        dataType: 'json',
        error: function (json) {
            finishLoading();
            var errors = $.parseJSON(json.responseText);
            $.each(errors.errors, function (key, value) {
                if (key == 'school_id') {
                    $(".error-school_id").html("<label id='" + key + "-error' class='error ' for='" + key + "'>" + value + "</label>");
                }
                $("input[name='" + key + "']").after("<label id='" + key + "-error' class='error invalid-feedback' for='" + key + "'>" + value + "</label>");
                $("input[name='" + key + "']").addClass("is-invalid");
            });
        },
        success: function (d) {
            finishLoading();
            if (d.status == 'success') {
                console.log(d.message)
                $("#formModal").modal("hide");
                $("#form_validate")[0].reset();
                $(".selectform").val("").trigger("change");
                $(".method-hidden").html("");
                table.ajax.reload(null, false);
                notifToast(action, title, d.message);
                return false;
            } else if ((d.status == 'error')) {
                $("#formModal").modal("hide");
                $("#form_validate")[0].reset();
                $(".selectform").val("").trigger("change");
                $(".method-hidden").html("");
                table.ajax.reload(null, false);
                notifToast(action, title, d.message);
                return false;
            }
        }
    });
});

$(document).on('click', '#deleteData', function (e) {
    e.preventDefault();
    var data = table.row('.selected').data();
    var id   = data.id;
    var name = data.name;
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Menghapus "+name,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak, Batal!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            // Swal.fire(
            //     "Hapus!",
            //     "Berhasil menghapus "+name,
            //     "success"
            // )
            deleteData(id);
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Batal",
                "Kamu membatalkan  menghapus "+name,
                "error"
            )
        }
    });
});

function deleteData(id) {
    var title = "Hapus Data";
    var action = "delete";
    $.ajax({
        url: HOST_URL + '/admin/paud/akun/' + id,
        method: "DELETE",
        dataType: 'json',
        success: function (d) {
            finishLoading();
            if (d.status == 'success') {
                table.ajax.reload(null, false);
                notifToast(action, title, d.message);
                return false;
            } else if (d.status == 'error') {
                table.ajax.reload(null, false);
                notifToast("error", title + " GAGAL" , d.message);
                return false;
            }
        }
    });
}

$('#datatable').on('click', '#ubahStatus', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    let name = $(this).data('name');
    //dibalik
    let status_value = $(this).data('status') == 0 ? "1" : "0";
    let status = $(this).data('status') == 0 ? "Aktif" : "Tidak Aktif";
    let status_buttons = $(this).data('status') == 0 ? "success" : "error";
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Ubah Status " +name+  " Menjadi "+status,
        icon: status_buttons,
        showCancelButton: true,
        confirmButtonText: "Ya, Ubah!",
        cancelButtonText: "Tidak, Batal!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {            
            Swal.fire(
                "Ubah status!",
                "Berhasil ubah "+status,
                "success"
            )
            updateStatus(id, status_value);
            // alert(id + "- "+status_value);
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Batal",
                "Kamu membatalkan ubah status "+name,
                "error"
            )
        }
    });
});


function updateStatus(id, status) {
    var title = "Update Status";
    var action = "edit";
    $.ajax({
        url: HOST_URL + '/admin/paud/status/'+id,
        method: 'POST',
        dataType: 'json',
        data: {
            status  : status,
        },
        success: function (d) {
            finishLoading();
            if (d.status == 'success') {
                table.ajax.reload(null, false);
                notifToast(action, title, d.message);
                return false;
            } else {
                table.ajax.reload(null, false);
                notifToast("error", title, d.message);
                return false;
            }
        },
        error: function (xhr, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        }
    });
}

$(document).on('click', '#resetPassword', function (e) {
    e.preventDefault();
    var data = table.row('.selected').data();
    var id   = data.id;
    var name = data.name;
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Reset Password "+name,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, Reset!",
        cancelButtonText: "Tidak, Batal!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            Swal.fire(
                "Hapus!",
                "Berhasil reset "+name+" menjadi : password123",
                "success"
            )
            resetPassword(id);
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Batal",
                "Kamu membatalkan  reset "+name,
                "error"
            )
        }
    });
});

function resetPassword(id) {
    var title = "Reset Password";
    var action = "delete";
    $.ajax({
        url: HOST_URL + '/admin/paud/akun/reset/' + id,
        method: "POST",
        dataType: 'json',
        success: function (d) {
            finishLoading();
            if (d.status == 'success') {
                table.ajax.reload(null, false);
                notifToast(action, title, d.message);
                return false;
            } else if (d.status == 'error') {
                table.ajax.reload(null, false);
                notifToast("error", title + " GAGAL" , d.message);
                return false;
            }
        }
    });
}


$("#datatable_refresh").on("click", function () {
    loadingRefresh();
});

function loadingRefresh() {
    $('#datatable_refresh i').addClass('text-dark fa-spin');
        table.ajax.reload(function() {
        $('#datatable_refresh i').removeClass('text-dark fa-spin');
    });
}

$(document).key('alt+t', function () {
    $("#resetPassword").click();
});