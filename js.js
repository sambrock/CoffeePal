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

$(".item").click(function(){
    $(".customisations").empty();
    var type = $(this).next().next().text();
    if(type === "Coffee"){
        size();
    }else if(type === "Tea"){
        size();
        tea();
    }
    console.log(type);
})

//$(".item").click(function(){
//    var saveData = $.ajax({
//      type: 'POST',
//      url: "add.php",
//      data: { product_id: $(this).find(".prod_id").attr("data-id")} ,
//      dataType: "text",
//      success: function(resultData) { alert("Save Complete") }
//});
//})
