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
    "pageLength": 24,
    "lengthMenu": [
        [12, 24, 36, 48, -1],
        [12, 24, 36, 48, "Semua"]
    ],
    ajax: {
        method: 'POST',
    	url: HOST_URL + '/dt/admin/smp/pengaturan',
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'bulan',
            name: 'bulan',
            orderable: true,
            searchable: true,
        },
        {
            data: 'tahun',
            name: 'tahun',
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
        $(".dataTables_length").append("<button class='btn btn-danger font-weight-bolder ml-2 mr-2' id='deleteData'><i class='fa fa-trash'></i>Hapus(ALT+Q)</button><button class='btn btn-success font-weight-bolder mr-2' id='editData'><i class='fa fa-edit'></i>Edit(ALT+W)</button>");
    },
    "fnDrawCallback": function() {
        if(table.row(1).data() == undefined){
            $('#datatable tbody tr:first td:last span').removeAttr('data-toggle');
        }
    },
});

function createData() {
    $(".modal-title").html("Formulir Tambah Data Laporan Sekolah");
    $("#submitData").val("add");
    $(".method-hidden").html("");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formModal").modal("show");
}


$(document).on("click", "#editData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/admin/smp/pengaturan/' + id + '/edit';
        $.get(url, function (d) {
            if (d.status == 'success') {
                $('#bulan').val(d.edit.bulan).trigger('change');
                $('#tahun').val(d.edit.tahun);
                $("#id_edit").val(id);
                $(".modal-title").html("Formulir Ubah Data Pengaturan Laporan Sekolah");
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

$( ".datepicker" ).datepicker({
    format   :"yyyy",
    viewMode: "years", 
    minViewMode: "years"
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
        var url = HOST_URL + '/admin/smp/pengaturan';
        var title = "TAMBAH DATA";
    } else if (action == "edit") {
        var id    = $("#id_edit").val();
        var url   = HOST_URL + '/admin/smp/pengaturan/' + id;
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
                if (key == 'bulan') {
                    $(".error-bulan").html("<label id='" + key + "-error' class='error ' for='" + key + "'>" + value + "</label>");
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
                notifToast(d.status, title, d.message);
                return false;
            }
        }
    });
});

$(document).on('click', '#deleteData', function (e) {
    e.preventDefault();
    var data = table.row('.selected').data();
    var id   = data.id;
    var name = data.bulan+' '+data.tahun;
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
        url: HOST_URL + '/admin/smp/pengaturan/' + id,
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
            // updateStatus(id, status_value);
            var title = "Update Status";
            var action = "edit";
            $.ajax({
                url: HOST_URL + '/admin/smp/pengaturan/status/'+id,
                method: 'POST',
                dataType: 'json',
                data: {
                    status  : status,
                },
                success: function (d) {
                    finishLoading();
                    if (d.status == 'success') {
                        Swal.fire(
                            "Ubah status!",
                            "Berhasil ubah "+status,
                            "success"
                        )
                        table.ajax.reload(null, false);
                        notifToast(action, title, d.message);
                        return false;
                    } else {
                        Swal.fire(
                            "Ubah status!",
                            "Error "+d.message,
                            "error"
                        )
                        table.ajax.reload(null, false);
                        notifToast("error", title, d.message);
                        return false;
                    }
                },
                error: function (xhr, thrownError) {
                    Swal.fire(
                        "Ubah status!",
                        "Error "+thrownError,
                        "error"
                    )
                }
            });
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
    console.log(id, status)
    var title = "Update Status";
    var action = "edit";
    $.ajax({
        url: HOST_URL + '/admin/smp/pengaturan/status/'+id,
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


$("#datatable_refresh").on("click", function () {
    loadingRefresh();
});

function loadingRefresh() {
    $('#datatable_refresh i').addClass('text-dark fa-spin');
        table.ajax.reload(function() {
        $('#datatable_refresh i').removeClass('text-dark fa-spin');
    });
}
