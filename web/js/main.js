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

// $(document).on('click', 'button.delShop', function(){
//     $.ajax({
//         url:  Routing.generate('delShop', {postId: $(".delShop").attr("data-shop-id")}),
//         type: "POST",
//         dataType: "json",
//         async: true,
//         success: function (data)
//         {
//
//             console.log("Delete shop");
//         }
//     });
//     return false;
// });