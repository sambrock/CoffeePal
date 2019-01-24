$(document).ready(function(){
    $("#cold-drinks").hide();
    $("#food").hide();
    $("#snacks").hide();
})

$(document).on('click', '.delete', function(){
    $orderItemID = $(this).attr("data-order-item-id");
    var deleteItem = $.ajax({
        type: 'POST',
        url: "delete.php",
        data: { id: $orderItemID} ,
        dataType: "text"
    });
    console.log("click");
})

setInterval(function(){
    $("#current-order-items").load("current_order_loop.php");
}, 1000);

$(".item-btn").click(function(){
    $itemName = $(this).find(".item-name").text();

    $(".item-btn").removeClass("active");
    $(this).addClass("active");

    $("#order-item-name").empty();
    $("#order-item-name").append($itemName);
})

$(".sort-btn").click(function(){
    $btnID = $(this).attr("id");
    if($btnID==="hot-drinks-btn"){
        $("#hot-drinks").show();
        $("#cold-drinks").hide();
        $("#food").hide();
        $("#snacks").hide();
    }else if($btnID==="cold-drinks-btn"){
        $("#hot-drinks").hide();
        $("#cold-drinks").show();
        $("#food").hide();
        $("#snacks").hide();
    }else if($btnID==="food-btn"){
        $("#hot-drinks").hide();
        $("#cold-drinks").hide();
        $("#food").show();
        $("#snacks").hide();
    }else if($btnID==="snacks-btn"){
        $("#hot-drinks").hide();
        $("#cold-drinks").hide();
        $("#food").hide();
        $("#snacks").show();
    }
    $(".sort-btn").removeClass("active");
    $(this).addClass("active");
    console.log($btnID);
})

//$('.item-btn').height($('.item-btn').width());
$(".item-btns-container").css("grid-auto-rows", $('.item-btn').width());

$(".cat-btn").click(function(){
    $category = $(this).val();
    console.log($category);
    $hidden_input = $("#category");
    $hidden_input.val($category);
})

function size(){
    $(".customisations").append('<label>Size: </label>\
<select class="size">\
<option value="small">small</option>\
<option value="medium">medium</option>\
<option value="large">large</option>\
</select>')
}

function shots(){
    $(".customisations").append('<label>Shots:</label>\
<select class="shots">\
<option value="small">small</option>\
<option value="medium">medium</option>\
<option value="large">large</option>\
</select>')
}

function tea(){
    $(".customisations").append('<label>Tea bags:</label>\
<select class="tea">\
<option value="small">1 tea bag</option>\
<option value="medium">2 tea bags</option>\
<option value="large">3 tea bags</option>\
<option value="large">4 tea bags</option>\
</select>')
}

$(".item-btn").click(function(){
//    var type = $(this).next().next().text();
//    if(type === "Coffee"){
//        size();
//    }else if(type === "Tea"){
//        size();
//        tea();
//    }


})

//$(".item").click(function(){
//    var addItem = $.ajax({
//        type: 'POST',
//        url: "add.php",
//        data: { product_id: $(this).attr("data-id")} ,
//        dataType: "text",
//        success: function(resultData) { alert("Save Complete") }
//    });
//    console.log($(this).attr("data-id"));
//})

$("#new-order").click(function(){
    var addNewOrder = $.ajax({
        url: "new_order.php",
        success: function(resultData) { alert("Save Complete") }
    });
})
