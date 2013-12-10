/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
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
    $("h4").filter("#records_title").mouseenter(function(){
        $(this).css({"cursor":"pointer"});
    });

});




