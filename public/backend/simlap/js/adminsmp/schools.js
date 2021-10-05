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
    	url: HOST_URL + '/dt/admin/smp/sekolah',
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
        $(".dataTables_length").append("<button class='btn btn-info font-weight-bolder ml-5 mr-2' id='showData'><i class='fa fa-eye'></i>Detai Data (ALT+R)</button>");
    },
});

$(document).on("click", "#showData", function (e) {
    var data = table.row('.selected').data();
    if (data) {
        var id = data.id;
        var url   = HOST_URL + '/admin/smp/sekolah/' + id;
        $.get(url, function (d) {
            if (d.status == 'success') {
                $.each(d.show, function (key, value) {
                    $('#'+ key).text(value); 
                });
                $(".modal-title").html("DETAIL DATA SEKOLAH SMP");
                $("#formModal").modal("show");
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