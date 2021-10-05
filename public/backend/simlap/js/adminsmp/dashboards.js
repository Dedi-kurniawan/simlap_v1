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
    "deferRender": true,
    "bSortClasses": false,
    "pageLength": 50,
    "lengthMenu": [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Semua"]
    ],
    ajax: {
        method: 'POST',
    	url: HOST_URL + '/dt/admin/smp/dashboard',
        data: function (d) {
            d.bulan = $("#bulan").val();
            d.tahun = $("#tahun").val();
            d.semester = $("#semester").val();
        }
    },
    columns: [{
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'school.nama_sekolah',
            name: 'school.nama_sekolah',
            orderable: true,
            searchable: true,
        },
        {
            data: 'teacher',
            name: 'teacher',
            orderable: false,
            searchable: false,
        },
        {
            data: 'employee',
            name: 'employee',
            orderable: false,
            searchable: false,
        },
        {
            data: 'student',
            name: 'student',
            orderable: false,
            searchable: false,
        },
        {
            data: 'need',
            name: 'need',
            orderable: false,
            searchable: false,
        },
        {
            data: 'facility',
            name: 'facility',
            orderable: false,
            searchable: false,
        },
        {
            data: 'created_date_format',
            name: 'created_date_format',
            orderable: false,
            searchable: false,
        },
        {
            data: 'completed_date_format',
            name: 'completed_date_format',
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
    "footerCallback": function(row, data, start, end, display) {
        var bulan = $("#bulan").val();
        var tahun = $("#tahun").val();
        var title = "LAPORAN SEKOLAH "+getBulanFormat(bulan)+" "+tahun;
        $(".title-report").text(title);
    }
});

$('#status_filter').on('click', function (e) {
    table.ajax.reload(null, false);
});

function getBulanFormat(bulan)
    {
            switch (bulan) {
                case "01":
                    var bulan = "Januari";
                    break;
                case "02":
                    var bulan = "Februari";
                    break;
                case "03":
                    var bulan = "Maret";
                    break;
                case "04":
                    var bulan = "April";
                    break;
                case "05":
                    var bulan = "Mei";
                    break;
                case "06":
                    var bulan = "Juni";
                    break;
                case "07":
                    var bulan = "Juli";
                    break;
                case "08":
                    var bulan = "Agustus";
                    break;
                case "09":
                    var bulan = "September";
                    break;
                case "10":
                    var bulan = "Oktober";
                    break;
                case "11":
                    var bulan = "November";
                    break;
                case "12":
                    var bulan = "Desember";
                    break;
            }
            return bulan;
    }
