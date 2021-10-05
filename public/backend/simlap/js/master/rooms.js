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
    	url: HOST_URL + '/dt/admin/master/kelas',
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'no_urut',
            name: 'no_urut',
            orderable: true,
            searchable: true,
        },
        {
            data: 'kelas',
            name: 'kelas',
            orderable: true,
            searchable: true,
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
        $(".dataTables_length").append("<button class='btn btn-danger font-weight-bolder ml-5 mr-2' id='deleteData'><i class='fa fa-trash'></i>Hapus Data (ALT+Q)</button><button class='btn btn-success font-weight-bolder mr-2' id='editData'><i class='fa fa-edit'></i>Edit Data (ALT+W)</button>");
    },
});

function createData() {
    $(".modal-title").html("Formulir Tambah Data Kelas");
    $("#submitData").val("add");
    $(".method-hidden").html("");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formModal").modal("show");
}

$(document).on("click", "#editData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/admin/master/kelas-siswa/' + id + '/edit';
        $.get(url, function (d) {
            if (d.status == 'success') {
                $.each(d.edit, function (key, value) {
                    $('#'+ key).val(value);
                });
                $("#id_edit").val(id);
                $(".modal-title").html("Formulir Ubah Data Kelas");
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
        var url = HOST_URL + '/admin/master/kelas-siswa';
        var title = "TAMBAH DATA";
    } else if (action == "edit") {
        var id    = $("#id_edit").val();
        var url   = HOST_URL + '/admin/master/kelas-siswa/' + id;
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
                $(".method-hidden").html("");
                table.ajax.reload(null, false);
                notifToast(action, title, d.message);
                return false;
            } else if ((d.status == 'error')) {
                $("#formModal").modal("hide");
                $("#form_validate")[0].reset();
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
    if (data) {
        var id   = data.id;
        var name = data.kelas;
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
    } else {
        notifToast("error", "HAPUS DATA GAGAL", "Pilih salah satu data untuk di hapus");    
        return false;    
    }   
});

function deleteData(id) {
    var title = "Hapus Data";
    var action = "delete";
    $.ajax({
        url: HOST_URL + '/admin/master/kelas-siswa/' + id,
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
        },
        error: function (json) {
            table.ajax.reload(null, false);
            notifToast("error", title +" GAGAL" , " Minta admin untuk menghapus data");
            return false;
        },
    });
}

