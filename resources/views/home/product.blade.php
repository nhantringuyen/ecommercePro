<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($product as $p)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    ${{$p->price}}
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{$p->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$p->title}}
                            </h5>
                            @if($p->discount_price != null)
                                <h6 style="color: red">
                                    ${{$p->discount_price}}
                                </h6>
                                <h6 style="color: blue">
                                   <del>${{$p->price}}</del>
                                </h6>
                            @else
                                <h6 style="color: red">
                                    ${{$p->price}}
                                </h6>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
