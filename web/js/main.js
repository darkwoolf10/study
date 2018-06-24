$(document).on('click', 'button.createShop', function(){
    $.ajax({
        url:  "shop/add",
        type: "POST",
        dataType: "json",
        async: true,
        success: function (data)
        {
            console.log("Create shop");
        }
    });
    return false;
});