$(document).ready(function() {
    $("div").filter(".overview").hide(0);
    $("div").filter("#loading").hide(0);
    $("div").filter(".tab_content").slideToggle(900);
    $("div").filter("#loading").toggle(300);
    var link = "notice/type_get/firm"
    setTimeout(function() {
        $(".tab_content").load(link, function() {

            $("tr").filter('#record').click(function() {
                window.document.location = $(this).attr("href");
            });

            $("tr:odd").css({"background-color": "lightblue", "color": "black"});
            $("tr:even").css({"background": "none", "color": "black"});
            $("tr").filter('#record').mouseenter(function() {
                $(this).css({"background-color": "#A70000", "color": "gainsboro", "cursor": "pointer"});
            });
            $("tr").filter('#record').mouseleave(function() {
                $(this).css({"background-color": "#A70000", "color": "gainsboro"});
                $("tr:odd").css({"background-color": "lightblue", "color": "black"});
                $("tr:even").css({"background": "none", "color": "black"});

            });
            $("div").filter("#toggle_message").hide(0);
            $("h4").filter("#records_title").click(function() {
                $(this).siblings("div").filter("#records").slideToggle(800);
                $(this).siblings("div").filter("#toggle_message").toggle(800);
            });
            $("h4").filter("#records_title").mouseenter(function() {
                $(this).css({"cursor": "pointer"});
            });
        });
        $("div").filter(".tab_content").slideToggle(300);
        
    }, 900);
    $("div").filter(".overview").hide(0);
    $("div").filter("#loading").hide(0);
    $("h4").filter(".link").mouseenter(function() {
        $(this).css({"cursor": "pointer"})
    });
    $("h4").click(function() {
        $("div").filter(".tab_content").slideToggle(900);
        $("div").filter("#loading").toggle(300);
        var page = $(this).attr("href");
        var link = "notice/type_get/" + page;
        setTimeout(function() {
            $(".tab_content").load(link, function() {
                $("tr").filter('#record').click(function() {
                    window.document.location = $(this).attr("href");
                });
                $("tr:odd").css({"background-color": "lightblue", "color": "black"});
                $("tr:even").css({"background": "none", "color": "black"});
                $("tr").filter('#record').mouseenter(function() {
                    $(this).css({"background-color": "#A70000", "color": "gainsboro", "cursor": "pointer"});
                });
                $("tr").filter('#record').mouseleave(function() {
                    $(this).css({"background-color": "#A70000", "color": "gainsboro"});
                    $("tr:odd").css({"background-color": "lightblue", "color": "black"});
                    $("tr:even").css({"background": "none", "color": "black"});

                });
                $("div").filter("#toggle_message").hide(0);
                $("h4").filter("#records_title").click(function() {
                    $(this).siblings("div").filter("#records").slideToggle(800);
                    $(this).siblings("div").filter("#toggle_message").toggle(800);
                });
                $("h4").filter("#records_title").mouseenter(function() {
                    $(this).css({"cursor": "pointer"});
                });
            });
            $("div").filter(".tab_content").slideToggle(300);
            $("div").filter("#loading").toggle(300);
        }, 900);
    });
});
        