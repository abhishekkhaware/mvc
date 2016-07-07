var inputs = $("input");
$(document).on("keypress", "input", function(){
    inputs.each(function(i,el){
        var $el = $(el);
        if ($el.is(":valid")){
            $el.next("input")[0].disabled=false;
        } else {
            $el.next("input")[0].disabled=true;
        }
    });
});