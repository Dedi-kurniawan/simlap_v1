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
    	url: HOST_URL + '/dt/admin/master/sekolah',
        data: function (d) {
            d.role_id = $("#kategori_filter").val();
            d.koordinator_id = $("#koordinator_filter").val();
        }
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'nama_sekolah',
            name: 'nama_sekolah',
            orderable: true,
            searchable: true,
        },
        {
            data: 'nss',
            name: 'nss',
            orderable: true,
            searchable: true,
        },
        {
            data: 'npsn',
            name: 'npsn',
            orderable: true,
            searchable: true,
        },
        {
            data: 'status_sekolah',
            name: 'status_sekolah',
            orderable: false,
            searchable: false,
        },
        {
            data: 'tahun_berdiri',
            name: 'tahun_berdiri',
            orderable: false,
            searchable: false,
        },
        {
            data: 'akreditasi_nilai',
            name: 'akreditasi_nilai',
            orderable: false,
            searchable: false,
        },
        {
            data: 'district.nama',
            name: 'district.nama',
            orderable: false,
            searchable: false,
        },
        {
            data: 'village.nama',
            name: 'village.nama',
            orderable: false,
            searchable: false,
        },
        {
            data: 'telepon_sekolah',
            name: 'telepon_sekolah',
            orderable: false,
            searchable: false,
        },
        {
            data: 'email',
            name: 'email',
            orderable: false,
            searchable: false,
        },
        {
            data: 'koordinator.nama',
            name: 'koordinator.nama',
            orderable: false,
            searchable: false,
        },
        {
            data: 'kepala_sekolah',
            name: 'kepala_sekolah',
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
        $(".dataTables_length").append("<button class='btn btn-danger font-weight-bolder ml-5 mr-2' id='deleteData'><i class='fa fa-trash'></i>Hapus (ALT+Q)</button><button class='btn btn-success font-weight-bolder ml-3' id='editData'><i class='fa fa-edit'></i>Edit (ALT+W)</button><button class='btn btn-info font-weight-bolder ml-5 mr-2' id='showData'><i class='fa fa-eye'></i>Detail(ALT+R)</button>");
    },
});

$("#button_filter").on("click", function(e) {
    e.preventDefault();
    table.ajax.reload(null, false);
    return false;    
});


function createData() {
    $(".modal-title").html("Formulir Tambah Data SEKOLAH");
    $("#submitData").val("add");
    $(".method-hidden").html("");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formModal").modal("show");
}

function importData(){
    $(".modal-title-import").html("Import Data SEKOLAH");
    $("#submitImport").val("add");
    $("#submitImport").html('<i class="fa fa-file-excel"></i> Import');
    $("#formImport").modal("show");
}

$("#formImportSchool").submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    startLoading();
    var url = HOST_URL + '/admin/master/import-sekolah';
    var title = "Import Data";
    var action = "add";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (d) {
            finishLoading();
            if (d.status == 'success') {
                $("#formImport").modal("hide");
                $("#formImportSchool")[0].reset();
                table.ajax.reload(null, false);
                notifToast(action, title, d.message);
                return false;
            } else if ((d.status == 'error')) {
                $("#formImport").modal("hide");
                $("#formImportSchool")[0].reset();
                table.ajax.reload(null, false);
                notifToast('error', title, d.message);
                return false;
            }
        }
    });
});

$(document).on("click", "#editData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/admin/master/sekolah/' + id + '/edit';
        $.get(url, function (d) {
            if (d.status == 'success') {
                $.each(d.edit, function (key, value) {
                    if (key == "district_id") {
                        $('#district_id').val(d.edit.district_id).trigger('change');
                        getDesa(d.edit.district_id, d.edit.village_id);
                    }else if(key == "akreditasi" || key == "koordinator_id" || key == "kurikulum" || key == "role_id") {
                        $('#'+ key).val(value).trigger('change');
                    }
                    $('#'+ key).val(value); 
                    var sertifikasi_kepala_sekolah = d.edit.sertifikasi_kepala_sekolah == "SUDAH" ? "sudah" : "belum";
                    $('.'+ sertifikasi_kepala_sekolah).prop('checked', true);

                    var status_sekolah = d.edit.status_sekolah == "NEGERI" ? "negeri" : "swasta";
                    $('.'+ status_sekolah).prop('checked', true);
                });
                $("#id_edit").val(id);
                $(".modal-title").html("Formulir Ubah Data Sekolah");
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

$(".kecamatan").on("input", function () {
    return getDesa($(this).val(), "");
});

function getDesa(district_id, village_id) {
    $.ajax({
        url: HOST_URL + '/admin/master/get-desa',
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
        var url = HOST_URL + '/admin/master/sekolah';
        var title = "TAMBAH DATA";
    } else if (action == "edit") {
        var id    = $("#id_edit").val();
        var url   = HOST_URL + '/admin/master/sekolah/' + id;
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
                $("#formModal").modal("hide");
                $("#form_validate")[0].reset();
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
    if (data) {
        var id   = data.id;
        var name = data.nama_sekolah;
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
        url: HOST_URL + '/admin/master/sekolah/' + id,
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

$( ".date_picker_year" ).datepicker({
    format   :"yyyy",
    viewMode: "years", 
    minViewMode: "years"
});

$(document).on("click", "#showData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/admin/master/sekolah/' + id;
        $.get(url, function (d) {
            if (d.status == 'success') {
                $.each(d.show, function (key, value) {
                    console.log(key, value);
                    $('#'+ key +'_show').text(value); 
                });
                $(".modal-title").html("DETAIL DATA SEKOLAH");
                $("#formShow").modal("show");
                return false;
            } else if ((d.status == 'error')) {
                notifToast("error", "DETAIL DATA GAGAL", "data tidak di temukan");    
                return false;
            }
        });
    } else {
        notifToast("error", "DETAIL DATA GAGAL", "Pilih salah satu data untuk di edit");    
        return false;    
    }   
});