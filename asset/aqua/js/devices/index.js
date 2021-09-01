(function($){
    tProduct = $("#tProduct").dataTable({
        bProcessing:true,
        bSort:true,
        sAjaxSource:'/devices/ajaxsource',
        "aaSorting": [[ 0, "desc" ]],
        "sPaginationType":"full_numbers",
        //"aoColumnDefs":[ { 'aDataSort':[2], 'aTargets': [3] },{ 'aDataSort':[4], 'aTargets': [5] },],
        aoColumns: [
          { "sClass": "category",bSortable:true  },
          { "sClass": "kdticket",bSortable:true,sWidth:"15%"  },
          { "sClass": "name",sWidth:"20%" },
          { "sClass": "currency",sWidth:"45%"},
          { "sClass": "currency",sWidth:"10%" },
          { "sClass": "ticketstart",sWidth:"5%" },
          { "sClass": "ticketend",sWidth:"10%" }
        ]
    });
    function currencyFormatDE(num) {
        return (
          num
            .replace('.', ',') // replace decimal point character with ,
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' Rp. '
        )
      }
    setThousandSeparator = function(){
        $('#tProduct tbody tr td.currency').each(function(){
            console.log("this",$(this).text());
            $(this).html(currencyFormatDE($(this).text()));
        });
    }
    $(".productCategory").on("click",function(){
      console.log("val",$(this).val());
      doRenew();
    })
    doRenew = function(){
      renew($(".productCategory:checked"),function(res){
          console.log("catetgories",res);
          tProduct.fnDestroy();
          tProduct = $("#tProduct").dataTable({
              bRetrieve:true,
              bSort:true,
              bProcessing:true,
              sAjaxSource:'/devices/ajaxsourcebycategories',
              sServerMethod:'post',
              "fnServerParams": function ( aoData ) {
                  aoData.push( { "name": "category_id","value":res } );
              },
              "sPaginationType":"full_numbers",
              "aaSorting": [[ 0, "desc" ]],
              //"aoColumnDefs":[ { 'aDataSort':[2], 'aTargets': [3] },{ 'aDataSort':[4], 'aTargets': [5] },],
              aoColumns: [
                { "sClass": "category",bSortable:true  },
                { "sClass": "kdticket",bSortable:true  },
                { "sClass": "name" },
                { "sClass": "currency"},
                { "sClass": "currency" },
                { "sClass": "ticketstart" },
                { "sClass": "ticketend" }
                ]
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
    $('.selectall').click(function(){
        $(".productCategory").prop("checked",this.checked);
        doRenew();
    });
}(jQuery))
