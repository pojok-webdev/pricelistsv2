$('#btnSave').click(function(){
    console.log('buttonsavae invoked',$('#id').val());
    $.ajax({
        url:'/vases/update',
        type:'post',
        data:{
            descriptionblob:btoa($('#description').html()),
            id:$('#id').val()
        }
    })
    .done(function(res){
        console.log("vases update saved",res);
    })
    .fail(function(err){
        console.log("vases update failed",err);
    })
})