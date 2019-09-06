<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <meta name="keywords" content="404 iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <link href="{{ asset('/') }}/front/css2//style.css" rel="stylesheet" type="text/css"  media="all" />
    <link href="{{ asset('/') }}/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/') }}/front/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/') }}/front/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="{{ asset('/') }}/front/js/jquery-1.11.1.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}/front/js/move-top.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}/front/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
@include('front.includes.header')
<div id="searchResult">
@yield('body')
@include('front.includes.footer')
    <script src="{{ asset('/') }}/front/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<script src="{{ asset('/') }}/front/js/minicart.min.js"></script>
<script>
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>
<!-- main slider-banner -->
<script src="{{ asset('/') }}/front/js/skdslider.min.js"></script>
<link href="{{ asset('/') }}/front/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

        jQuery('#responsive').change(function(){
            $('#responsive_wrapper').width(jQuery(this).val());
        });

    });
</script>
<!-- //main slider-banner -->
<script>
//    var searchElement= document.getElementById('searchProduct');
//    searchElement.onkeyup = function () {
//        var searchValue = searchElement.value;
//
//       var xmlhttp = new XMLHttpRequest();
//       xmlhttp.open('GET','http://localhost/php%20practice/php73/public/ajax-product-search/'+searchValue);
//       xmlhttp.onreadystatechange = function () {
//
//           if(xmlhttp.readyState == 4 && xmlhttp.status == 200  ){
//
//               document.getElementById('searchResult').innerHTML=xmlhttp.responseText;
//           }
//       }
//       xmlhttp.send(null);
//    }
$( function() {
    var availableTags = [

    ];
    $( "#searchProduct" ).autocomplete({
        source: 'http://localhost/php73/public/ajax-product-search/'
    });
} );
</script>
</body>
</html>
