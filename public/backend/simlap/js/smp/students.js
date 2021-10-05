// "use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    select: true,
    // "searching": false,
    // "deferRender": true,
    // "bSortClasses": false,
    "pageLength": 200,
    "lengthMenu": [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Semua"]
    ],
    ajax: {
        method: 'POST',
    	url: HOST_URL + '/dt/smp/peserta-didik',
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'room.kelas',
            name: 'room.kelas',
            orderable: false,
            searchable: true,
        },
        {
            data: 'siswa_l',
            name: 'siswa_l',
            orderable: false,
            searchable: false,
        },
        {
            data: 'siswa_p',
            name: 'siswa_p',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jlh_jk',
            name: 'jlh_jk',
            className: 'font-weight-bold bg-secondary',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_11',
            name: 'usia_11',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_12',
            name: 'usia_12',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_13',
            name: 'usia_13',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_14',
            name: 'usia_14',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_15',
            name: 'usia_15',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_16',
            name: 'usia_16',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_17',
            name: 'usia_17',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_18',
            name: 'usia_18',
            orderable: false,
            searchable: false,
        },
        {
            data: 'usia_19',
            name: 'usia_19',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jlh_usia',
            name: 'jlh_usia',
            className: 'font-weight-bold bg-secondary',
            orderable: false,
            searchable: false,
        },
        {
            data: 'islam',
            name: 'islam',
            orderable: false,
            searchable: false,
        },
        {
            data: 'katolik',
            name: 'katolik',
            orderable: false,
            searchable: false,
        },
        {
            data: 'protestan',
            name: 'protestan',
            orderable: false,
            searchable: false,
        },
        {
            data: 'hindu',
            name: 'hindu',
            orderable: false,
            searchable: false,
        },
        {
            data: 'budha',
            name: 'budha',
            orderable: false,
            searchable: false,
        },
        {
            data: 'lain',
            name: 'lain',
            orderable: false,
            searchable: false,
        },
        {
            data: 'jlh_agama',
            name: 'jlh_agama',
            className: 'font-weight-bold bg-secondary',
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
    $(".modal-title").html("Formulir Tambah Data Peserta didik smp");
    $("#submitData").val("add");
    $(".method-hidden").html("");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formModal").modal("show");
}


$(document).on("click", "#editData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/smp/peserta-didik/' + id + '/edit';
        $.get(url, function (d) {
            if (d.status == 'success') {
                $('#room_id').val(d.edit.room_id).trigger('change'); 
                $('#siswa_l').val(d.edit.siswa_l); 
                $('#siswa_p').val(d.edit.siswa_p);  
                $('#usia_11').val(d.edit.usia_11); 
                $('#usia_12').val(d.edit.usia_12);  
                $('#usia_13').val(d.edit.usia_13);  
                $('#usia_14').val(d.edit.usia_14);  
                $('#usia_15').val(d.edit.usia_15);  
                $('#usia_16').val(d.edit.usia_16);  
                $('#usia_17').val(d.edit.usia_17);  
                $('#usia_18').val(d.edit.usia_18);  
                $('#usia_19').val(d.edit.usia_19); 
                $('#islam').val(d.edit.islam); 
                $('#katolik').val(d.edit.katolik); 
                $('#protestan').val(d.edit.protestan); 
                $('#hindu').val(d.edit.hindu); 
                $('#budha').val(d.edit.budha); 
                $('#lain').val(d.edit.lain); 
                $("#id_edit").val(id);
                $(".modal-title").html("Formulir Ubah Data Peserta Pendidik SMP");
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
        var url = HOST_URL + '/smp/peserta-didik';
        var title = "TAMBAH DATA";
    } else if (action == "edit") {
        var id    = $("#id_edit").val();
        var url   = HOST_URL + '/smp/peserta-didik/' + id;
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
                if (key == 'room_id') {
                    $(".error-room_id").html("<label id='" + key + "-error' class='error ' for='" + key + "'>" + value + "</label>");
                }
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
    var name = data.room.kelas;
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
        url: HOST_URL + '/smp/peserta-didik/' + id,
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
        url: HOST_URL + '/smp/report-peserta-didik',
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
