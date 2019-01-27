$( document ).ready(function(){
    //Hide item buttons on load
    $("#cold-drinks").hide();
    $("#food").hide();
    $("#snacks").hide();

    //Resize item buttons on load
    $(".item-btns-container").css("grid-auto-rows", $('.item-btn').width());

    //Load current order
    $("#current-order-items").load("current_order_loop.php");
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
        dataType: "text",
        success: function(resultData) { alert("Save Complete") }
    });

    setTimeout(function(){
        $("#current-order-items").load("current_order_loop.php");
    } , 1000);

    console.log($itemID);
    console.log($itemPrice);
    console.log($opt_1);
    console.log($opt_2);
    console.log($opt_3);
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
})

//Creates customisation menu for current item selected
$(".item-btn").click(function(){
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
    <span class='option-added-name'>"+$optionName+"</span>\
    <span class='option-added-price'>+£"+$optionPrice.toFixed(2)+"</span>\
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
    <span class='option-added-name'>"+$optionName+"</span>\
    <span class='option-added-price'>+£"+$optionPrice.toFixed(2)+"</span>\
    </div>");

    priceUpdate();
})
