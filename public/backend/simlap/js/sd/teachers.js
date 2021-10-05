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
    "pageLength": 200,
    "lengthMenu": [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Semua"]
    ],
    ajax: {
        method: 'POST',
    	url: HOST_URL + '/dt/sd/tenaga-pendidik',
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'nama',
            name: 'nama',
            orderable: true,
            searchable: true,
        },
        {
            data: 'nuptk',
            name: 'nuptk',
            orderable: true,
            searchable: true,
        },
        {
            data: 'nip',
            name: 'nip',
            orderable: true,
            searchable: true,
        },
        {
            data: 'golongan',
            name: 'golongan',
            orderable: false,
            searchable: false,
        },
        {
            data: 'tmt_gol_terakhir',
            name: 'tmt_gol_terakhir',
            orderable: false,
            searchable: false,
        },
        {
            data: 'tmt_sekolah',
            name: 'tmt_sekolah',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jabatan',
            name: 'jabatan',
            orderable: false,
            searchable: false,
        },
        {
            data: 'tmt_jabatan',
            name: 'tmt_jabatan',
            orderable: false,
            searchable: false,
        },
        {
            data: 'tempat_lahir',
            name: 'tempat_lahir',
            orderable: false,
            searchable: false,
        },
        {
            data: 'tanggal_lahir',
            name: 'tanggal_lahir',
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
            data: 'alamat_rumah',
            name: 'alamat_rumah',
            orderable: false,
            searchable: false,
        },
        {
            data: 'tmt_sebagai_guru',
            name: 'tmt_sebagai_guru',
            orderable: false,
            searchable: false,
        },
        {
            data: 'mapel',
            name: 'mapel',
            orderable: false,
            searchable: false,
        },
        {
            data: 'sertifikasi',
            name: 'sertifikasi',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jenis_kelamin',
            name: 'jenis_kelamin',
            orderable: false,
            searchable: false,
        },
        {
            data: 'status_pegawai',
            name: 'status_pegawai',
            orderable: false,
            searchable: false,
        },
        {
            data: 'pendidikan',
            name: 'pendidikan',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jurusan',
            name: 'jurusan',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jjm',
            name: 'jjm',
            orderable: false,
            searchable: false,
        }
    ],
    columnDefs: [{
        "targets": '_all',
        "defaultContent": "-"
    }],
    buttons: [{
            extend: 'print',
            orientation: 'landscape',
            title: 'DATA TENAGA PENDIDIK',
            messageTop: 'DATA TENAGA PENDIDIK',
            customize: function ( win ) {
                $(win.document.body).find('table')
                    .addClass('table-bordered')
                    .removeClass('nowrap')
                    .css('font-size', 'inherit' );
            }
        },
    ],
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
    "footerCallback": function(row, data, start, end, display) {
        var api  = this.api();
        var json = api.ajax.json();
        $("#total_all").text(json.recordsTotal);
        $("#total_laki").text(json.t_laki);
        $("#total_perempuan").text(json.t_perempuan);
    }
});


function createData() {
    $(".modal-title").html("Formulir Tambah Data Tenaga Pendidik SD");
    $("#submitData").val("add");
    $('#district_id').val($("#id_district").val()).trigger('change');
    getDesa($("#id_district").val(), "");
    $(".method-hidden").html("");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formModal").modal("show");
}

$(document).on("click", "#editData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/sd/tenaga-pendidik/' + id + '/edit';
        $.get(url, function (d) {
            if (d.status == 'success') {
                $("#status_table").val("tenaga_pendidik");
                $('#nama_lengkap').val(d.edit.nama); 
                $('#nuptk').val(d.edit.nuptk); 
                $('#nip').val(d.edit.nip); 
                $('#tmt_sebagai_guru').val(d.edit.tmt_sebagai_guru); 
                $('#golongan').val(d.edit.golongan == null ? "" : d.edit.golongan).trigger('change');
                $('#tmt_gol_terakhir').val(d.edit.tmt_gol_terakhir); 
                $('#tmt_di_sekolah_ini').val(d.edit.tmt_sekolah); 
                $('#jabatan').val(d.edit.jabatan == null ? "" : d.edit.jabatan).trigger('change'); 
                $('#tmt_jabatan').val(d.edit.tmt_jabatan); 
                $('#tempat_lahir').val(d.edit.tempat_lahir);
                $('#tanggal_lahir').val(d.edit.tanggal_lahir);
                $('#alamat_rumah').val(d.edit.alamat_rumah);
                $('#district_id').val(d.edit.district_id).trigger('change');
                getDesa(d.edit.district_id, d.edit.village_id);
                $('#mapel').val(d.edit.mapel == null ? "" : d.edit.mapel).trigger('change');
                var sertifikasi = d.edit.sertifikasi == "1" ? "sudah" : "belum";
                $('.'+ sertifikasi).prop('checked', true);
                var jenis_kelamin = d.edit.jenis_kelamin == "L" ? "laki" : "perempuan";
                $('.'+ jenis_kelamin).prop('checked', true);
                $('#status_pegawai').val(d.edit.status_pegawai).trigger('change');
                $('#pendidikan').val(d.edit.pendidikan == null ? "" : d.edit.pendidikan).trigger('change');
                $('#jurusan').val(d.edit.jurusan).trigger('change');                
                $('#jjm').val(d.edit.jjm);
                $("#id_edit").val(id);
                $(".modal-title").html("Formulir Ubah Data Tenaga Pendidik SD");
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

$("#district_id").on("input", function () {
    return getDesa($(this).val(), "");
});

function getDesa(district_id, village_id) {
    $.ajax({
        url: HOST_URL + '/sd/get-desa',
        method: "GET",
        data: {
            district_id : district_id,
            village_id  : village_id,
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
        var url = HOST_URL + '/sd/tenaga-pendidik';
        var title = "TAMBAH DATA";
    } else if (action == "edit") {
        var id    = $("#id_edit").val();
        var url   = HOST_URL + '/sd/tenaga-pendidik/' + id;
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
        var name = data.nama;
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
    }else{
        notifToast("error", "HAPUS DATA GAGAL", "Pilih salah satu data untuk di hapus");    
        return false; 
    }
});

function deleteData(id) {
    var title = "Hapus Data";
    var action = "delete";
    $.ajax({
        url: HOST_URL + '/sd/tenaga-pendidik/' + id,
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

function generateReport() {
    $(".content-generate").show();
    $(".loading-report").hide();
    $("#formGenerateReport").modal("show");
    return false;
}

$("#generateReport").click(function (event) {
    event.preventDefault();
    $(".loading-report").show();
    $(".content-generate").hide();
    $("#generateReport").prop("disabled", true );
    $("#close-report").prop("disabled", true );
    $("#cancel-report").prop("disabled", true );
    $.ajax({
        url: HOST_URL + '/sd/report-tenaga-pendidik',
        method: "POST",
        error: function (json) {
            $("#generateReport").prop("disabled", false);
            $("#close-report").prop("disabled", false);
            $("#cancel-report").prop("disabled", false);
            notifToast("error", "Generate Laporan", d.message);
            return false;            
        },
        success: function (d) {
            console.log(d);
            if (d.status == 'success') {
                $("#generateReport").prop("disabled", false);
                $("#close-report").prop("disabled", false);
                $("#cancel-report").prop("disabled", false);
                $("#formGenerateReport").modal("hide");
                notifToast("add", "Generate Laporan", d.message);
                return false;
            } else if ((d.status == 'error')) {
                $("#generateReport").prop("disabled", false);
                $("#close-report").prop("disabled", false);
                $("#cancel-report").prop("disabled", false);
                $("#formGenerateReport").modal("hide");
                notifToast(d.status, "Generate Laporan", d.message);
                return false;
            }
        }
    });
});

$("#datatable_refresh").on("click", function () {
    loadingRefresh();
});

function loadingRefresh() {
    $('#datatable_refresh i').addClass('text-dark fa-spin');
        table.ajax.reload(function() {
        $('#datatable_refresh i').removeClass('text-dark fa-spin');
    });
}
