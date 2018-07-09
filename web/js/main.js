$(document).on('click', 'button.createShop', function(){
    $.ajax({
        url:  "add/shop",
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

// Bye toy
$(document).on('click', 'button.byeToy', function(){
    $.ajax({
        url: Routing.generate('del_toy', {id: $(this).attr("data-party-id")}),
        type: "POST",
        dataType: "json",
        async: true,
        success: function (data)
        {
            var element = $(".quntityToy" + data.party_id);
            quntityToy = element.html() -1;
            element.html(quntityToy);
        }
    });
    return false;
});

$(document).on('click', 'button.delShop', function(){
    $.ajax({
        url: Routing.generate('delete_shop', {id: $(this).attr("data-shop-id")}),
        // url:  "/del/" + $(this).attr("data-shop-id") + "/shop",
        type: "POST",
        dataType: "json",
        async: true,
        success: function (data)
        {
            $(".shop" + data.shop_id).remove(".shop" + data.shop_id);
        }
    });
    return false;
});