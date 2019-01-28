$( document ).ready(function(){
    //Hide item buttons on load
    //    $("#cold-drinks").hide();
    //    $("#food").hide();
    //    $("#snacks").hide();

    //Resize item buttons on load
    $(".item-btns-container").css("grid-auto-rows", $('.item-btn').width());

    //Load current order
    $("#current-order-items").load("current_order_loop.php");

    //Load current order total
    $("#total-val").load("total.php");

    //Check status of previous order
    orderStatus();

    //Load pending orders
    loadPendingOrders();
})

//Check last order status
function orderStatus(){
    $orderStatus = $("#order-check").attr("data-status");
    console.log($orderStatus);
    if($("#order-check").attr("data-status")==="Processing"){
        $("#new-order").hide();
        setTimeout(function(){
            $("#current-order-info").load("order_info.php");
        } , 1000);
        setTimeout(function(){
            $("#current-order-items").load("current_order_loop.php");
        } , 1200);
    }else{
        $(".order-options").hide();
        $("#new-order").show();
    }
}

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
$("#add-new-order").click(function(){
    $("#new-order").fadeOut(200);
    $(".order-options").slideDown(300);

    var addNewOrder = $.ajax({
        url: "new_order.php"
    });

    setTimeout(function(){
        $("#current-order-info").load("order_info.php");
    } , 1000);
})

//Get current order total
function orderTotal(){
    setTimeout(function(){
        $("#current-order-total").load("total.php");
    } , 1000);
}

//Add item to current order
$("#add-btn").click(function(){
    $itemID = $("#option-item-name").attr("data-item-id");
    $itemPrice = $("#option-item-price").attr("data-item-price");
    $opt_1 = $("#add-in-size").attr("data-option-name");
    $opt_2 = $("#add-in-cream").attr("data-option-name");
    $opt_3 = $("#add-in-milk").attr("data-option-name");

    var addItem = $.ajax({
        type: 'POST',
        url: "add.php",
        data: { id: $itemID, price: $itemPrice, opt_1: $opt_1, opt_2: $opt_2, opt_3: $opt_3 },
        dataType: "text"
    });

    setTimeout(function(){
        $("#current-order-items").load("current_order_loop.php");
    } , 1000);

    orderTotal();

    clearAllOptions();
})

//Delete item from current order
$( document ).on('click', '.delete', function(){
    $orderItemID = $(this).attr("data-order-item-id");
    var deleteItem = $.ajax({
        type: 'POST',
        url: "delete.php",
        data: { id: $orderItemID} ,
        dataType: "text"
    });

    setTimeout(function(){
        $("#current-order-items").load("current_order_loop.php");
    } , 1000);

    orderTotal();
})

//Creates customisation menu for current item selected
$(".item-btn").click(function(){
    clearAllOptions();

    $itemID = $(this).attr("data-id");
    $itemName = $(this).attr("data-item-name");
    $itemPrice = $(this).attr("data-item-price");

    $(".item-btn").removeClass("active");
    $(this).addClass("active");

    $("#option-item-name").empty();
    $("#option-item-name").append($itemName);
    $("#option-item-price").empty();
    $("#option-item-price").append("£", $itemPrice);
    $("#option-item-name").attr("data-item-id", $itemID);
    $("#option-item-price").attr("data-item-price", $itemPrice);

    options["itemPrice"] = parseFloat($itemPrice);
})

//Cancel order
$("#cancel-btn").click(function(){

})

//Process order
$( document ).on('click', '#pay-btn', function(){
    $orderID = $("#current-order-id").attr("data-order-id");

    var processOrder = $.ajax({
        type: 'POST',
        url: "process_order.php",
        data: { id: $orderID} ,
        dataType: "text"
    });

    console.log("pay");

    loadPendingOrders();
})

//Option prices
var options = {};

//Total price of options
function sumOptions(options){
    var sum = 0;
    for(var option in options){
        if(options.hasOwnProperty(option)){
            sum += parseFloat(options[option]);
        }
    }
    return sum;
}

function priceUpdate(){
    var totaloptions = sumOptions(options);
    $("#option-item-price").empty();
    $("#option-item-price").append("£", totaloptions.toFixed(2));
    $("#option-item-price").attr("data-item-price", totaloptions.toFixed(2));
}

//Add options
$(".size-btn").click(function(){
    $optionID = $(this).attr("id");
    $optionName = $(this).attr('data-option-name');
    $(".size-btn").removeClass("active");
    $(this).addClass("active");

    $optionPrice = parseFloat($(this).attr("data-price"));

    options["size"] = $optionPrice;

    $("#add-in-size").remove();
    $(".option-list").append("<div class='option-added' id='add-in-size' data-option-name='"+$optionName+"'>\
<span class='option-added-name'>+ "+$optionName+"</span>\
<span class='option-added-price'>£"+$optionPrice.toFixed(2)+"</span>\
</div>");

    priceUpdate();
})

$(".option-add-in").change(function(){
    $optionID = $(this).attr("id");
    $optionName = $('option:selected', this).attr('data-option-name');
    $optionPrice = parseFloat($('option:selected', this).attr('data-price'));

    options[$optionID] = $optionPrice;

    $("#add-in-"+$optionID).remove();
    $(".option-list").append("<div class='option-added' id='add-in-"+$optionID+"' data-option-name='"+$optionName+"'>\
<span class='option-added-name'>+ "+$optionName+"</span>\
<span class='option-added-price'>£"+$optionPrice.toFixed(2)+"</span>\
</div>");

    priceUpdate();
})

//Clear options
function clearAllOptions(){
    $("#option-item-name").empty();
    $("#option-item-price").empty();
    $(".size-btn").removeClass("active");
    $("#default-size").addClass("active");
    $(".option-add-in").val("0");
    $(".option-added").remove();
}

//Load pending orders
function loadPendingOrders(){
    setTimeout(function(){
        $("#pending-orders-list").load("pending_orders_loop.php");
    } , 1000);
}
