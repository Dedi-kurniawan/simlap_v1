"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#tahun").on("change", function () {
    chartTeacher($("#tahun").val());
})

chartTeacher($("#tahun").val());
function chartTeacher(tahun) {
    $("#rekap_laporan_chart").append("");
    $.ajax({
        url: HOST_URL + '/paud/chart-tenaga-pendidik',
        method: "GET",
        dataType: 'json',
        data:{
    		tahun:tahun
    	},
        success: function (d) {
            console.log(d);
            if (d.status == 'success') {
                
                return false;
            } else if (d.status == 'error') {
                return false;
            }
        }
    });
}