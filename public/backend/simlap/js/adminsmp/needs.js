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
    	url: HOST_URL + '/dt/admin/smp/kebutuhan-guru',
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
    var url = HOST_URL + '/admin/smp/kebutuhan-guru/print?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    window.open(url, title, "height=650,width=1024,left=150,scrollbars=yes");
    return false;
} 