"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
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
    var url = HOST_URL + '/admin/sd/laporan/show?school_id='+ school_id +'&bulan='+bulan+'&tahun='+tahun;
    window.open(url, title, "height=650,width=1024,left=150,scrollbars=yes");
    return false;
} 

function resetReport(){
    var validat = $("#form_validate_reset").valid();
    if (!validat) {
        return false;
    }
    $(".content-generate").show();
    $(".loading-report").hide();
    var bulan = $("#bulan_reset option:selected").text();
    var tahun = $("#tahun_reset").val();
    var school = $("#school_id_reset option:selected").text();
    var laporan = $("#laporan option:selected").text();
    $("#title_content").text("APAKAH KAMU YAKIN RESET LAPORAN "+ laporan +" BULAN : "+ bulan +" "+tahun+" "+school);    
    $(".modal-title").html("RESET LAPORAN");
    $("#submitData").html('<i class="fa fa-save"></i> Simpan');
    $("#formResetReport").modal("show");
}

$("#resetReport").click(function (event) {
    event.preventDefault();
    $(".loading-report").show();
    $(".content-generate").hide();
    $("#resetReport").prop("disabled", true );
    $("#close-report").prop("disabled", true );
    $("#cancel-report").prop("disabled", true );
    var message_alert = $("#semester option:selected").text()+" "+$("#bulan_reset option:selected").text()+" "+$("#tahun_reset option:selected").text()+" "+$("#school_id_reset option:selected").text();
    $.ajax({
        url: HOST_URL + '/admin/sd/laporan/reset',
        method: "POST",
        data: {
            bulan : $("#bulan_reset").val(),
            tahun : $("#tahun_reset").val(),
            school_id : $("#school_id_reset").val(),
            laporan : $("#laporan").val(),
            semester : $("#semester").val(),
            message_alert: message_alert
        },
        error: function (json) {
            $("#resetReport").prop("disabled", false);
            $("#close-report").prop("disabled", false);
            $("#cancel-report").prop("disabled", false);
            notifToast("error", "Reset Laporan", d.message);
            return false;            
        },
        success: function (d) {
            if (d.status == 'success') {
                console.log(d.message);
                $("#resetReport").prop("disabled", false);
                $("#close-report").prop("disabled", false);
                $("#cancel-report").prop("disabled", false);
                $("#formResetReport").modal("hide");
                notifToast("add", "Reset Laporan", d.message);
                return false;
            } else if ((d.status == 'error')) {
                $("#resetReport").prop("disabled", false);
                $("#close-report").prop("disabled", false);
                $("#cancel-report").prop("disabled", false);
                $("#formResetReport").modal("hide");
                notifToast(d.status, "Reset Laporan", d.message);
                return false;
            }
        }
    });
});
