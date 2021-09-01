(function($){
    $('#client_id').on('change',function(){
        console.log($(this).val());
    })
    $("#pelanggan").keyup(function(){
        console.log('Client Name sent',$(this).val());
        $.ajax({
            type: "POST",
            url: "/tickets/clients",
            data:{'name':$(this).val()},
            beforeSend: function(){
                $("#pelanggan").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                console.log("Data received",data);
                $("#dugaanpelanggan").show();
                $("#dugaanpelanggan").html(data);
                $("#pelanggan").css("background","#FFF");
            }
        })
        .fail(function(err){
            console.log("Failed ajax",err);
        });
    });
    $("#pelanggan").on("focus",function(){
        $(this).select();
    })
    $.fn.populate = function(options){
        var settings = $.extend({
            url:'/'
        },options);
        $.ajax({
            url:'/'+settings.url,
            type:'get'
        })
        .done(function(res){
            console.log('Result',settings.url,res)
        })
        .fail(function(err){
            console.log("Error",err)
        });
        return this;
    }
}(jQuery))
function selectCountry(client_id,val) {
    $("#pelanggan").val(val);
    $("#dugaanpelanggan").hide();
    populateClientSites(client_id);
}
function populateClientSites(client_id){
    $("#client_site_id").populate({
        url:'/teknis-tickets/tickets/getclientsites/'+client_id,
    })
}