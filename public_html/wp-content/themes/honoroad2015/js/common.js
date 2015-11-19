function mouse_enter_map(){$(".map iframe").css("pointer-events","auto")}(new WOW).init(),jQuery.fn.extend({scrollTo:function(e,i){return this.each(function(){var n=$(this).offset().top;$("html,body").animate({scrollTop:n},e,i)})}}),$(function(){$("#menu-toggle").sidr({name:"sidr",speed:200,side:"left",source:null,renaming:!0,body:"body"}),$(document).on("click",function(e){var i=$("#sidr");i.is(e.target)||0!==i.has(e.target).length||$.sidr("close","sidr")}),$(window).bind("resize",function(){$("body").hasClass("sidr-open")&&$(window).width()>=768&&$.sidr("close")}),$(".sub-menu-sidr").hide(),$("#sidr li").on("click",function(){$("ul",this).toggle("fast")})}),$(function(){$(".accordion-toggle").on("click",function(){$(this).hasClass("selected")?$(this).removeClass("selected"):($(".accordion-toggle").removeClass("selected"),$(this).addClass("selected"),$(".collapse.in").collapse("hide"))})}),$(function(){$(".navbar-oil").affix({offset:{top:$("header").height()}})}),$(function(){$(".map").on("mouseenter",function(){setTimeout(mouse_enter_map,500)}),$(".map").on("mouseleave",function(){$(".map iframe").css("pointer-events","none")})}),jQuery(document).ready(function(e){function i(){var e=o.$Elmt.parentNode.clientWidth;e?o.$ScaleWidth(e-0):window.setTimeout(i,0)}if(e("#slider1_container").length>0){var n={$AutoPlay:!0,$AutoPlaySteps:1,$AutoPlayInterval:3e3,$PauseOnHover:1,$ArrowKeyNavigation:!0,$SlideEasing:$JssorEasing$.$EaseOutQuint,$SlideDuration:800,$MinDragOffsetToSlide:20,$SlideSpacing:0,$DisplayPieces:1,$ParkingPosition:0,$UISearchMode:1,$PlayOrientation:1,$DragOrientation:1,$ArrowNavigatorOptions:{$Class:$JssorArrowNavigator$,$ChanceToShow:2,$AutoCenter:2,$Steps:1,$Scale:!1},$BulletNavigatorOptions:{$Class:$JssorBulletNavigator$,$ChanceToShow:2,$AutoCenter:1,$Steps:1,$Lanes:1,$SpacingX:12,$SpacingY:4,$Orientation:1,$Scale:!1}},o=new $JssorSlider$("slider1_container",n);i(),e(window).bind("load",i),e(window).bind("resize",i),e(window).bind("orientationchange",i)}}),$(function(e){var i=300,n=1200,o=e("#back-top");e(window).scroll(function(){e(this).scrollTop()>i?o.addClass("cd-is-visible"):o.removeClass("cd-is-visible cd-fade-out"),e(this).scrollTop()>n&&o.addClass("cd-fade-out")}),o.on("click",function(){e("#header").scrollTo()})}),$(function(){var e=$(".thumb-list ul.touch-list li");e.each(function(){$(this).find("a").on("click",function(){var i=$(this).data("full");e.removeClass("selected"),$(this).parent().addClass("selected"),$(".image-block img").attr("src",i)})}),$(".fancybox").fancybox()});

$(function () {
    var error_icon_template = '<span class="pull-right" style="position: absolute; right: 5px; top: 5px; font-size: 1.2em;"><i class="fa fa-times"></i></span>';
    var form_valid = $('#contact-info-form');
    form_valid.validate({
        rules: {
            're_title': {
                required: true
            },
            're_name': {
                required: true
            },
            're_email': {
                required: true,
                email: true
            },
            're_phone': {
                required: true,
                number: true
            },
            're_content': {
                required: true
            }
        },
        messages: {
            're_title': error_icon_template,
            're_name': error_icon_template,
            're_email': error_icon_template,
            're_phone': error_icon_template,
            're_content': error_icon_template,
        },
        submitHandler: function (form) {
            //
            var v = grecaptcha.getResponse();
            if (v.length == 0) {
                $('#captcha').innerHTML = "You can't leave Captcha Code empty";
                return false;
            }
            if (v.length != 0) {
//                $('#captcha').innerHTML = "Captcha completed";
                form.submit();
                return false;
            }            
        }
    });
});