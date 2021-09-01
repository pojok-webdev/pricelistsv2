(function($){
    tProduct = $("#tProduct").dataTable({
        "sPaginationType":"full_numbers",
        "aaSorting": [[ 0, "desc" ]],
        "aoColumnDefs":[ 
            { 'bVisible':'false','aTargets':[4,6]}
        ],
        aoColumns: [
            { "sClass": "category",bSortable:true},
            { "sClass": "kdvas",bSortable:true,sWidth:"15%"  },
            { "sClass": "name",sWidth:"20%" },
            { "sClass": "currency","bVisible":true },
            { "sClass": "padiattr","bVisible":false },
            {sWidth:"10%"},
            { "sClass": "nonpadiattr","bVisible":false },
            { "bVisible":true,sWidth:"5%" },
            { "sClass": "currency",sWidth:"10%" }
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            /* Append the grade to the default row class name */
            if ( aData[4] == "yellow" )
            {
                $('td:eq(5)', nRow).html( '<b class="yellow">A</b>' );
            }
            if ( aData[6] == "yellow" )
            {
                $('td:eq(7)', nRow).html( '<b class="yellow">A</b>' );
            }
        },
        "aoColumnDefs": [ {
                "sClass": "center",
                "aTargets": [ -1, -2 ]
        } ]
    });
}(jQuery))
$(".selectall").on("click",function(){
    $(".productCategory").prop("checked",this.checked);
    doRenew();
})
$(".productCategory").on("click",function(){
    //console.log("val",$(this).val());
    doRenew();
})
function currencyFormatDE(num) {
    return (
      num
        .replace('.', ',') // replace decimal point character with ,
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' Rp. '
    ) // use . as a separator
  }
  
  //console.info(currencyFormatDE(1234567.89)) // output 1.234.567,89 €
/*$('.ccurrency').on("click",function(){
    setThousandSeparator();
})*/
setThousandSeparator = function(){
    $('#tProduct tbody tr td.currency').each(function(){
        //console.log("this",$(this).text());
        $(this).html(currencyFormatDE($(this).text()));
    });
}
doRenew = function(){
    renew($(".productCategory:checked"),function(res){
        //console.log("catetgories",res);
        tProduct.fnDestroy();
        rebuild({categories:res},function(){
            setAttributes();
        })
    });
}
rebuild = function(obj,callback){
    tProduct = $("#tProduct").dataTable({
        bRetrieve:true,
        bSort:true,
        bProcessing:true,
        sAjaxSource:'/vases/ajaxsourcebycategories',
        "sPaginationType":"full_numbers",
        sServerMethod:'post',
        "fnServerParams": function ( aoData ) {
            aoData.push( { "name": "category_id","value":obj.categories } );
        },
        "aaSorting": [[ 0, "desc" ]],
        "aoColumnDefs":[ 
            { 'bVisible':'false','aTargets':[4,6]}
        ],
        aoColumns: [
            { "sClass": "category",bSortable:true},
            { "sClass": "kdvas",bSortable:true  },
            { "sClass": "name" },
            { "sClass": "currency","bVisible":true },
            { "sClass": "padiattr","bVisible":false },
            {},
            { "sClass": "nonpadiattr","bVisible":false },
            { "bVisible":true },
            { "sClass": "currency" }
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            x = $(nRow).find('td:eq(2)').text();
            y = $(nRow).find('td:eq(4)').text();

            //var row = $(this).closest('tr');
            var data = $('#tProduct').dataTable().fnGetData(nRow);
            if(data[4]=='yellow'){
                $(nRow).find('td:eq(5)').css('background-color','yellow')
            };
            if(data[6]=='yellow'){
                //console.log("Should be invoked");
                $(nRow).find('td:eq(7)').css('background-color','yellow')
            };
            setCellColor({row:nRow,src:4,target:4},function(x){
                setCellColor({row:x,src:6,target:5},function(y){
                    return y;
                })
//                return x;
            });
              //$(nRow).find('td:eq(5)').css('background-color', 'yellow');


          //  console.log(data[6]);

            //return nRow;
        },    
    });
callback(tProduct);
}
setCellColor = function(obj,callback){
    var data = $('#tProduct').dataTable().fnGetData(obj.row);
    if(data[obj.src]=='yellow'){
        console.log("It Should be invoked",obj);
        console.log("Color",data[obj.src]);
        //$(nRow).find('td:eq(5)').css('background-color', 'yellow');
        $(obj.row).find('td:eq('+obj.target+')').css('background-color','yellow');
        callback(obj.row);
    }else{
        $(obj.row).find('td:eq('+obj.target+')').css('background-color','#FFF');
        callback(obj.row);
    }

}
renew = function(obj,callback){
    var favorite = [];
    $.each(obj, function(){
        favorite.push($(this).val());
    });
    callback("'"+favorite.join("','")+"'");
}
setAttributes = function(){
    $('#tProduct tbody tr').each(function(x,y){
        console.log('TE-ER',x,y);
        $.each(y,function(v,w){
    //        console.log('$this',v,w);
        })
    })
}