(function (w) {
    "use strict";

    var $ = w.jQuery;
    var baseUrl = $("base").attr("href");
    var $formTransaction = $("#form-transaction");
    var dataUrl = baseUrl + "transaction/sales-detail/data";

    var date = moment().format("YYYY/MM/DD");

    $formTransaction.find('#sales_date').val(date);

    $.ajax({
        method: "GET",
        dataType: "json",
        url: dataUrl,
        success: function (response) {
            console.log(response);
            $formTransaction.find('#sales_id').val(response);
        },
        error: function (response) {}
    });

    $.ajax({
        method: "GET",
        dataType: "json",
        url: baseUrl + "master/customer/data",
        success: function (response) {
            console.log(response);
            var data = [];
            response.payloads.data.map(function(item, i) {
                data[i] = {
                    id : item.customer_id,
                    text : item.customer_name
                };
            });
            $('#customer_id').select2({
                data: data
            });
        },
        error: function (response) {}
    });
    
})(window);
