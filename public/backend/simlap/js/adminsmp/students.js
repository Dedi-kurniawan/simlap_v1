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
    	url: HOST_URL + '/dt/admin/smp/peserta-didik',
        data: function (d) {
            d.school_id = $("#school_id").val();
            d.bulan = $("#bulan").val();
            d.tahun = $("#tahun").val();
        }
    },
    columns: [{
        data: 'DT_RowIndex',
        orderable: false,
        searchable: false
    },
    {
        data: 'kelas',
        name: 'kelas',
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
    "footerCallback": function(row, data, start, end, display) {
        var api  = this.api();
        var json = api.ajax.json();
        $("#kurikulum").text(json.kurikulum);
    }
});

$("#filter_data").on("click", function(e) {
    e.preventDefault();
    var validat = $("#form_validate").valid();
    if (validat) {
        table.ajax.reload(null, false);
    }
    return false;    
});

function printReport(){
    var validat = $("#form_validate").valid();
    if (!validat) {
        return false;
    }
    var bulan = $("#bulan").val();
    var tahun = $("#tahun").val();
    var school_id = $("#school_id").val();
    var title = "LAPORAN BULAN :"+bulan+" "+tahun;
    var url = HOST_URL + '/admin/smp/peserta-didik/print?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    window.open(url, title, "height=650,width=1024,left=150,scrollbars=yes");
    return false;
} 