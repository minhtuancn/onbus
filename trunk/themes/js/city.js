$("li.city > a").click(function() {
    var a = $(this).parent().parent().parent().parent().parent(),
        b = $(this).attr("data-state");
        if(a.attr("id") == "departPlaceSelector"){
            $("#departPlace").val($(this).text());        
            $("#vstart").val(b);
            $("#destination").focus(); 
        }
        if(a.attr("id") == "destinationSelector"){
            $("#destination").val($(this).text()); 
            $("#vend").val(b);            
            $("#departDate").focus();
        }         
    return !1
});
$("li.city2 > a").click(function() {
    var a = $(this).parent().parent().parent().parent().parent(),
        b = $(this).attr("data-state");
        if(a.attr("id") == "departPlaceSelector2"){
            $("#departPlace2").val($(this).text());        
            $("#vstart_search").val(b);
            $("#destination2").focus(); 
        }
        if(a.attr("id") == "destinationSelector2"){
            $("#destination2").val($(this).text()); 
            $("#vend_search").val(b);            
            $("#departDate").focus();
        }         
    return !1
});