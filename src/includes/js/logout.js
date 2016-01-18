$(function(){
    window.onbeforeunload = closeSession;
    function closeSession(){
        $.ajax({
            url   : "/login/logout/",
            type  : "GET",
            async : false;
        });
        return "Your session progress has been saved!";
    }
});