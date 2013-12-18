$(document).ready(function() {
    //hides the overview page at the start
    $("div").filter(".overview").hide(0);

    //hides the loading message at the start
    $("div").filter("#loading").hide(0);

    //show pointer when moving the mouse to the header
    $("h4").mouseenter(function() {
        $(this).css({"cursor": "pointer"})
    });
    
    //action after clicking the header
    $("h4").click(function() {
        
        //float the clicked link to right
        $("h4").filter('.tab_link').css({"font-size":"0.9em","background-color":"#143270","color":"white","border":"none"});
        
       $(this).css({"float":"left","font-size":"1.1em","background-color":"gainsboro","color":"#c61f30","border-color":"#c61f30","border-style":"solid","border-width":"1px"});
        
        

        //hide the divider once to hide the current contents        
        $("div").filter(".tab_content").slideUp(300);

        //show the loading text
        $("div").filter("#loading").toggle(300);

        //load data from the link
        var link = $(this).attr("href");
        setTimeout(function() {
            $(".tab_content").load(link, function() {

                //actions that happen after the data has been loaded in the content tab
                $("tr").filter('#record').click(function() {
                    window.document.location = $(this).attr("href");
                });
                $("tr:odd").css({"background-color": "lightblue", "color": "black"});
                $("tr:even").css({"background": "none", "color": "black"});
                $("tr").filter('#record').mouseenter(function() {
                    $(this).css({"background-color": "#c61f30", "color": "gainsboro", "cursor": "pointer"});
                });
                $("tr").filter('#record').mouseleave(function() {
                    $(this).css({"background-color": "#c61f30", "color": "gainsboro"});
                    $("tr:odd").css({"background-color": "lightblue", "color": "black"});
                    $("tr:even").css({"background": "none", "color": "black"});

                });
            });
            $("div").filter(".tab_content").slideDown(500);
            $("div").filter("#loading").hide(400);
        }, 1200);
    });
    $('h4').filter('#autoload').trigger('click');
});
        