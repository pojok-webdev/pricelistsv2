(function($){
    tNote = $("#tNote").dataTable({
        bProcessing:true,
        bSort:true,
        sAjaxSource:'/notes/ajaxsource',
        "aaSorting": [[ 0, "asc" ]],
        aoColumns: [
            { "sClass": "kdticket","sType":"numeric","bSortable":true,"asSorting":["asc","desc"]  },
            { "sClass": "name" },
          ]
    });
}(jQuery))
