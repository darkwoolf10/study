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
        url: "/party/" + $(this).attr("data-party-id") + "/del",
        type: "POST",
        dataType: "json",
        async: true,
        success: function (data)
        {
            var element = $(".quntityToy" + data.party_id);
            quntityToy = element.html() -1;
            element.html(quntityToy);
            console.log(element.html());
            console.log("-->", data);
        }
    });
    return false;
});