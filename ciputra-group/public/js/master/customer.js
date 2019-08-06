(function (w) {
    "use strict";

    var $ = w.jQuery;
    var $formCustomer = $("#form-customer");
    var $modalFormCustomer = $('#modalFormCustomer');
    var baseUrl = $("base").attr("href");
    var dataUrl = baseUrl + "master/customer/data";

    var optionsNotif = {
        style: 'bar',
        message: '',
        position: 'top',
        type: 'success',
        timeout: 4000,
        showClose: true
    }

    var dataTableOptions = {
        ajax: {
            url: dataUrl
        },
        order: [
            [1, "asc"]
        ],
        columns: [
            {
                data: "customer_name",
                name: "customer_name"
            },
            // {
            //     data: "release_date",
            //     name: "release_date",
            //     render: function (data, type, row) {
            //         return moment(data).format('DD MMMM YYYY');
            //     }
            // },
            {
                data: "address",
                name: "address"
            },
            {
                data: "phone",
                name: "phone"
            },
            {
                data: "email",
                name: "email"
            },
            {
                orderable: false,
                mRender: function (data, type, row) {
                    return `
                        <a href="#" data-id="${row.customer_id}" id="edit-customer" data-target="#modalFormCustomer" data-toggle="modal">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px"></i>
                        </a>
                        <a href="#" data-id="${row.customer_id}" id="delete-customer" data-target="#modalConfirm" data-toggle="modal">
                        <i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px;color:red"></i>
                        </a>
                    `;
                }
            },
        ]
    };

    var table = $("#detailedTable").DataTable(
        $.extend(true, window.dataTableDefaultOptions, dataTableOptions)
    );



    $('#modalConfirm').on('click', 'button', confirm);

    // handle save data
    $formCustomer.on("submit", saveCustomer);

    // handle edit data
    $('#detailedTable tbody').on('click', 'a[id="edit-customer"]', editCustomer);

    // handle delete data
    $('#detailedTable tbody').on('click', 'a[id="delete-customer"]', deleteCustomer);

    function editCustomer(evt) {
        var id = $(this).attr("data-id");
        console.log(id);
        $.ajax({
            method: "GET",
            dataType: "json",
            url: baseUrl + "master/customer/" + id,
            success: function (response) {
                $modalFormCustomer.find('#id').val(response.payloads.customer_id);
                $modalFormCustomer.find('#customer_name').val(response.payloads.customer_name);
                $modalFormCustomer.find('#address').val(response.payloads.address);
                $modalFormCustomer.find('#phone').val(response.payloads.phone);
                $modalFormCustomer.find('#email').val(response.payloads.email);
            },
            error: function (response) {}
        });
        evt.preventDefault();
    }

    function saveCustomer(evt) {
        var formData = $formCustomer.serializeArray();
        $.ajax({
            method: "POST",
            dataType: "json",
            url: baseUrl + "master/customer",
            data: formData,
            success: function (response) {
                $(".modal").modal("hide");
                table.ajax.url(dataUrl).load();
                clearFormAlbum();
                optionsNotif.message = response.payloads.message;
                $('.notif').pgNotification(optionsNotif).show();
            },
            error: function (response) {}
        });
        evt.preventDefault();
        return false;
    }

    function deleteCustomer(evt) {
        var id = $(this).attr("data-id");
        $("#modalConfirm").data("id",id);
        evt.preventDefault();
    }

    function confirm(evt) {
        var id = $("#modalConfirm").data("id");
        if ($(this).text() == 'Yes') {
            $.ajax({
                method: "DELETE",
                dataType: "json",
                url: baseUrl + "master/customer/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $(".modal").modal("hide");
                    table.ajax.url(dataUrl).load();
                    optionsNotif.message = response.payloads.message;
                    $('.notif').pgNotification(optionsNotif).show();
                },
                error: function (response) {}
            });
        }
        evt.preventDefault();
        return false;
    }

    function clearFormAlbum() {
        $modalFormCustomer.find('#id').val("");
        $modalFormCustomer.find('#customer_name').val("");
        $modalFormCustomer.find('#address').val("");
        $modalFormCustomer.find('#phone').val("");
        $modalFormCustomer.find('#email').val("");
    }
})(window);
