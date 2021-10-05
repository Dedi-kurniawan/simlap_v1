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
    "pageLength": 100,
    "lengthMenu": [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Semua"]
    ],
    ajax: {
        method: 'POST',
    	url: HOST_URL + '/dt/paud/kebutuhan-guru',
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'mapel',
            name: 'mapel',
            orderable: true,
            searchable: true,
        },
        {
            data: 'rombel',
            name: 'rombel',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jam_rombel',
            name: 'jam_rombel',
            orderable: false,
            searchable: false,
        },
        {
            data: 'total_jam',
            name: 'total_jam',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jumlah_guru',
            name: 'jumlah_guru',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jam_perminggu',
            name: 'jam_perminggu',
            orderable: false,
            searchable: false,
        },
        {
            data: 'status_kepegawaian',
            name: 'status_kepegawaian',
            orderable: false,
            searchable: false,
        },
        {
            data: 'keterangan',
            name: 'keterangan',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jam_rombel',
            name: 'jam_rombel',
            orderable: true,
            searchable: true,
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

$('#export_pdf').on('click', function (e) {
    e.preventDefault();
    table.button(0).trigger();
});

function createData() {
    $(".modal-title").html("Formulir Tambah Data Analisi Kebutuhan Guru");
    $("#submitData").val("add");
    $(".method-hidden").html("");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formModal").modal("show");
}


$(document).on("click", "#editData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/paud/kebutuhan-guru/' + id + '/edit';
        $.get(url, function (d) {
            if (d.status == 'success') {
                $('#mapel').val(d.edit.mapel).trigger('change');
                $('#rombel').val(d.edit.rombel);
                $('#jam_rombel').val(d.edit.jam_rombel);
                $('#jumlah_guru').val(d.edit.jumlah_guru);
                $('#jam_perminggu').val(d.edit.jam_perminggu);
                $('#status_kepegawaian').val(d.edit.status_kepegawaian).trigger('change');
                $('#keterangan').val(d.edit.keterangan).trigger('change');
                $("#id_edit").val(id);
                $(".modal-title").html("Formulir Ubah Data Tenaga Pendidik");
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
        var url = HOST_URL + '/paud/kebutuhan-guru';
        var title = "TAMBAH DATA";
    } else if (action == "edit") {
        var id    = $("#id_edit").val();
        var url   = HOST_URL + '/paud/kebutuhan-guru/' + id;
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
                if (key == 'mapel') {
                    $(".error-mapel").html("<label id='" + key + "-error' class='error ' for='" + key + "'>" + value + "</label>");
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
    var name = data.mapel;
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
        url: HOST_URL + '/paud/kebutuhan-guru/' + id,
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
        url: HOST_URL + '/paud/report-kebutuhan-guru',
        method: "POST",
        error: function (d) {
            console.log(d);
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
