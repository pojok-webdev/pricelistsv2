(function($){
    tPhilo = $("#tPhilo").dataTable({
        bProcessing:true,
        bSort:true,
        sAjaxSource:'/philos/ajaxsource',
        "sPaginationType":"full_numbers",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumnDefs":[ { 'aDataSort':[2], 'aTargets': [3] },{ 'aDataSort':[4], 'aTargets': [5] },],
        aoColumns: [
            {"sClass":"id",bVisible:false},
            { "sClass": "kdticket",bSortable:true,sWidth:"5%"  },
            { "sClass": "name",sWidth:"20%" },
            { "sClass": "currency","bVisible":false,sWidth:"10%" },
            { "sClass": "currency",sWidth:"10%"},
            { "sClass": "currency","bVisible":false,sWidth:"10%" },
            { "sClass": "currency",sWidth:"10%" },
            { "sClass": "ticketstart",sWidth:"50%" },
            { "sClass": "ticketend",sWidth:"5%" }
          ]
    });
    $(".selectall").on("click",function(){
        $(".philoCategory").prop("checked",this.checked);
        doRenew();
    })
    $(".philoCategory").on("click",function(){
        console.log("val",$(this).val());
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
        $('#tPhilo tbody tr td.currency').each(function(){
            console.log("this",$(this).text());
            $(this).html(currencyFormatDE($(this).text()));
        });
    }
    doRenew = function(){
        renew($(".philoCategory:checked"),function(res){
            console.log("catetgories",res);
            tPhilo.fnDestroy();
            tPhilo = $("#tPhilo").dataTable({
                bRetrieve:true,
                bSort:true,
                bProcessing:true,
                sAjaxSource:'/philos/ajaxsourcebycategories',
                "sPaginationType":"full_numbers",
                sServerMethod:'post',
                "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "category_id","value":res } );
                },
                "aaSorting": [[ 0, "desc" ]],
                "aoColumnDefs":[ { 'aDataSort':[2], 'aTargets': [3] },{ 'aDataSort':[4], 'aTargets': [5] },],
                aoColumns: [
                    { "sClass": "kdticket",bSortable:true  },
                    { "sClass": "name" },
                    { "sClass": "currency","bVisible":false },
                    { "sClass": "currency"},
                    { "sClass": "currency","bVisible":false },
                    { "sClass": "currency" },
                    { "sClass": "ticketstart" },
                    { "sClass": "ticketend" }                          ]
            });
        });
    }
    renew = function(obj,callback){
        var favorite = [];
        $.each(obj, function(){
            favorite.push($(this).val());
        });
        callback("'"+favorite.join("','")+"'");
    }
    $('#btnFilter').click(function(){
        console.log('settings invoked');
    })
}(jQuery))
