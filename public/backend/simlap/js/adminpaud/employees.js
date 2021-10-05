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
    	url: HOST_URL + '/dt/admin/paud/tenaga-kependidikan',
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
        data: 'nama',
        name: 'nama',
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
        data: 'jenis_kelamin',
        name: 'jenis_kelamin',
        orderable: true,
        searchable: true,
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
        data: 'jabatan',
        name: 'jabatan',
        orderable: false,
        searchable: false,
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
        data: 'tanggal_mulai_bekerja',
        name: 'tanggal_mulai_bekerja',
        orderable: false,
        searchable: false,
    },
    {
        data: 'tmt_capeg',
        name: 'tmt_capeg',
        orderable: false,
        searchable: false,
    },
    {
        data: 'kecamatan',
        name: 'kecamatan',
        orderable: false,
        searchable: false,
    },
    {
        data: 'desa',
        name: 'desa',
        orderable: false,
        searchable: false,
    },
    {
        data: 'alamat_rumah',
        name: 'alamat_rumah',
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
    var url = HOST_URL + '/admin/paud/tenaga-kependidikan/print?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    window.open(url, title, "height=650,width=1024,left=150,scrollbars=yes");
    return false;
} 