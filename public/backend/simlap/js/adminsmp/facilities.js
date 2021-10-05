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
    	url: HOST_URL + '/dt/admin/smp/sarana-prasarana',
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
        data: 'uraian',
        name: 'uraian',
        orderable: true,
        searchable: true,
    },
    {
        data: 'baik',
        name: 'baik',
        orderable: false,
        searchable: false,
    },
    {
        data: 'rusak_ringan',
        name: 'rusak_ringan',
        orderable: false,
        searchable: false,
    },
    {
        data: 'rusak_sedang',
        name: 'rusak_sedang',
        orderable: false,
        searchable: false,
    },
    {
        data: 'rusak_berat',
        name: 'rusak_berat',
        orderable: false,
        searchable: false,
    },
    {
        data: 'jlh_kondisi',
        name: 'jlh_kondisi',
        orderable: false,
        searchable: false,
    },
    {
        data: 'kebutuhan',
        name: 'kebutuhan',
        orderable: false,
        searchable: false,
    },
    {
        data: 'keterangan',
        name: 'keterangan',
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
    var url = HOST_URL + '/admin/smp/sarana-prasarana/print?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    window.open(url, title, "height=650,width=1024,left=150,scrollbars=yes");
    return false;
}