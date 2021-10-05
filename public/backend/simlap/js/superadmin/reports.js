

$("#kategori_filter").on("change", function () {
    return getSchool($(this).val());
});

getSchool($("#kategori_filter").val());

function getSchool(role_id) {
    $.ajax({
        url: HOST_URL + '/superadmin/get-sekolah',
        method: "GET",
        data: {
            role_id: role_id,
        },
        dataType: 'json',
        success: function(data) {
            $("#school_id").html('');
            $("#school_id").html(data.options);
            return false;
        }
    });
}

function printReport(){
    var validat = $("#form_validate").valid();
    if (!validat) {
        return false;
    }
    var bulan = $("#bulan").val();
    var tahun = $("#tahun").val();
    var school_id = $("#school_id").val();
    var title = "LAPORAN BULAN :"+bulan+" "+tahun;
    if ($("#kategori_filter").val() == '2') {
        var url = HOST_URL + '/admin/paud/laporan/show?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    }else if($("#kategori_filter").val() == '3'){
        var url = HOST_URL + '/admin/sd/laporan/show?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    }else if($("#kategori_filter").val() == '4'){
        var url = HOST_URL + '/admin/smp/laporan/show?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    }
    
    window.open(url, title, "height=650,width=1024,left=150,scrollbars=yes");
    return false;
} 