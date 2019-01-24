$( document ).ready(function(){
    //Hide item buttons on load
    $("#cold-drinks").hide();
    $("#food").hide();
    $("#snacks").hide();

    //Resize item buttons on load
    $(".item-btns-container").css("grid-auto-rows", $('.item-btn').width());
})

//Resize item buttons on resize
$( window ).resize(function(){
    $(".item-btns-container").css("grid-auto-rows", $('.item-btn').width());
})

//Show menu items for each category
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

//Create a new order
$("#new-order").click(function(){
    var addNewOrder = $.ajax({
        url: "new_order.php",
        success: function(resultData) { alert("Save Complete") }
    });
})

//Add item to current order
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

//Delete item from current order
$( document ).on('click', '.delete', function(){
    $orderItemID = $(this).attr("data-order-item-id");
    var deleteItem = $.ajax({
        type: 'POST',
        url: "delete.php",
        data: { id: $orderItemID} ,
        dataType: "text"
    });
})

//Refresh the current order items every seccond
setInterval(function(){
    $("#current-order-items").load("current_order_loop.php");
}, 1000);

//Creates customisation menu for current item selected
$(".item-btn").click(function(){
    $itemName = $(this).find(".item-name").text();

    $(".item-btn").removeClass("active");
    $(this).addClass("active");

    $("#order-item-name").empty();
    $("#order-item-name").append($itemName);
})
