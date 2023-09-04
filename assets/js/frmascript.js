$(document).ready(function(){

    //AÇILIŞTAKİ KÖTÜ GÖRÜNTÜYÜ ENGELLEMEK
    setTimeout(() => {
        $("body").css("opacity","1");
    }, 1000);

    //SAYFA YENİLENMEDEN YÜKLEME
    $('a[rel="load"]').click(function(e){
        $(".loading").css("opacity","1");
        $(".loading").css("pointer-events","none");  
        pageurl = $(this).attr('href');
        $.ajax({url:pageurl,success: function(data){
            $('body').html(data).find("body").html();
            setTimeout(function() { 
                $(".loading").css("opacity", "0");
                $(".loading").css("pointer-events","none");
            }, 300);
        }});        
        if(pageurl!=window.location){
            window.history.pushState({path:pageurl},'',pageurl);    
        }
        return false;  
    });

    $(window).bind('popstate', function() {
        $.ajax({url:location.pathname,success: function(data){
            $('body').html(data).find("body").html();
        }});
    });


    //TEMA KONTROLÜ
    if (!$.cookie('darkth')) 
    {
        $("body").addClass("lightth");
        $("body").removeClass("darkth");
    }
    else
    {
        $("body").addClass("darkth");
        $("body").removeClass("lightth");
    }

    $(".degis").on("click",function(){
        if($("body").hasClass("darkth"))
        {
            $("body").addClass("lightth");
            $("body").removeClass("darkth");
            $.removeCookie('darkth');
        }
        else
        {
            $("body").addClass("darkth");
            $("body").removeClass("lightth");
            $.cookie('darkth', "ok", { expires: 365 });
        }
    });


    //ARAMA
    $(".searchmob").on("click",function(){
        
        $(".closesearch").css("display","block");
        $(".sonuclar").css("display","block");

    });

    $(".closesearch").on("click", function(){
        $(".closesearch").css("display","none");
        $(".sonuclar").css("display","none");
    });

    $(".searchmob").keyup(function(){
        var value = $(".searchmob").val();
        
        $.ajax({
            type: "POST",
            url: "ajax.php?option=arama",
            data: {value:value},
            success : function(e){
                $(".sonuclar").html(e);
            }
        });

    });


});
