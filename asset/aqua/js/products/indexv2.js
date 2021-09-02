(function($){
    tProduct = $("#tProduct").dataTable({
        bProcessing:true,
        bSort:true,
        sAjaxSource:'/products/ajaxsource',
        "sPaginationType":"full_numbers",
        "aaSorting": [[ 0, "desc" ]],
        "aoColumnDefs":[ { 'aDataSort':[2], 'aTargets': [3] },{ 'aDataSort':[4], 'aTargets': [5] },],
        aoColumns: [
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
        $(".productCategory").prop("checked",this.checked);
        doRenew();
    })
    $(".selectallcategory").on("click",function(){
        $(".clientCategories").prop("checked",this.checked);
        doRenew();
    })
    $(".selectallproducttype").on("click",function(){
        $(".productTypes").prop("checked",this.checked);
        doRenew();
    })
    
    $(".productCategory").on("click",function(){
        console.log("val",$(this).val());
        doRenew();
    })
    $(".productTypes").on("click",function(){
        console.log("val",$(this).val());
        doRenew();
    })
    $(".clientCategories").on("click",function(){
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
    setThousandSeparator = function(){
        $('#tProduct tbody tr td.currency').each(function(){
            console.log("this",$(this).text());
            $(this).html(currencyFormatDE($(this).text()));
        });
    }
    doRenew = function(){
        renew({
            'categories':$(".productCategory:checked"),
            'producttypes':$(".productTypes:checked"),
            'clientcategories':$(".clientCategories:checked")
        },function(res){
            console.log("catetgories",res.categories);
            console.log("producttypes",res.producttypes);
            console.log("clientcategories",res.clientcategories);
            tProduct.fnDestroy();
            tProduct = $("#tProduct").dataTable({
                bRetrieve:true,
                bSort:true,
                bProcessing:true,
                sAjaxSource:'/products/ajaxsourcebycategories',
                "sPaginationType":"full_numbers",
                sServerMethod:'post',
                "fnServerParams": function ( aoData ) {
                    aoData.push( 
                        { "name": "category_id","value":res.categories },
                        { "name": "producttypes","value":res.producttypes },
                        { "name": "clientcategories","value":res.clientcategories }
                    );
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
        },function(err){
            console.log('ERr',err)
        });
    }
    renew = function(obj,callback){
        var favorite = [],producttypes=[],clientcategories=[];
        $.each(obj.categories, function(){
            favorite.push($(this).val());
        });
        $.each(obj.producttypes, function(){
            producttypes.push($(this).val());
        });
        $.each(obj.clientcategories, function(){
            clientcategories.push($(this).val());
        });
        x= ['IDW950','IDW990','IDF990','IDF995','IWL990','ICS990','IWS950','IWR000']
        callback({'categories':"'"+favorite.join("','")+"'",'producttypes':"'"+producttypes.join("','")+"'",'clientcategories':"'"+clientcategories.join("','")+"'"});
    }
    $('#btnFilter').click(function(){
        console.log('settings invoked');
    })
}(jQuery))
