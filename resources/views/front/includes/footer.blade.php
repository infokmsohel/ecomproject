<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>

                {{--<ul class="address">--}}
                    {{--<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{ $footerContacts->address }}</li>--}}
                    {{--<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="#">{{ $footerContacts->email }}</a></li>--}}
                    {{--<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+88{{ $footerContacts->number }}</li>--}}
                {{--</ul>--}}
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">About Us</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Contact Us</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Short Codes</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">FAQ's</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    @foreach($categories as $category)

                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('category-content',['id'=>$category->id,'name'=>$category->category_name]) }}">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('show-cart') }}">My Cart</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('checkout') }}">Login</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('registered') }}">Create Account</a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('contact') }}">Contact</a></li>

                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="footer-copy">

        <div class="container">
            <p>© 2018 Super Market. All rights reserved  </p>
        </div>
    </div>

</div>
<div class="footer-botm">
    <div class="container">
        <div class="w3layouts-foot">
            <ul>
                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="payment-w3ls">
            <img src="{{ asset('/') }}/front/images/card.png" alt=" " class="img-responsive">
        </div>
        <div class="clearfix"> </div>
    </div>
</div>