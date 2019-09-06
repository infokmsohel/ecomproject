<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            <p>CALL FOR ORDER +8801674961086</p>
        </div>
        <div class="agile-login">
            <ul>
                @if(Session::get('customerId'))
                <li><a href="#" onclick="document.getElementById('customerlogout').submit();" > Log Out </a></li>
                <form action="{{ route('customer-logout') }}" method="post" id="customerlogout">
                    {{ csrf_field() }}
                </form>
                @else
                <li><a href="{{ route('registered') }}"> Create Account </a></li>
                <li><a href="{{ route('checkout') }}">Login</a></li>
                @endif
                <li><a href="">Help</a></li>
                <li><a href="">{{ Session::get('customerName') }}</a></li>

            </ul>
        </div>
        <div class="product_list_header">
            <form action="#" method="post" class="last">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="display" value="1">
                <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="logo_products">
    <div class="container">
        {{--<div class="w3ls_logo_products_left1">--}}
            {{--<ul class="phone_email">--}}
                {{--<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : +880 1674961086 </li>--}}

            {{--</ul>--}}
            <div class="w3ls_logo_products_left">
                <h1><a href="{{ route('/') }}">super Market</a></h1>

            </div>

        {{--</div>--}}

        <div class="w3l_search">
            <form action="{{ route('search-view') }}" method="post">
                {{ csrf_field() }}
                <input type="search" name="searchView" id="searchProduct" placeholder="Search for a Product..." >

                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits sticky-top">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('/') }}" class="act">Home</a></li>

                @foreach($categories as $category)
                        <li class="active"><a href="{{ route('category-content',['id'=>$category->id,'name'=>$category->category_name]) }}" class="act">{{ $category->category_name }}</a></li>
                        <!-- Mega Menu -->
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>