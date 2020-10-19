@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
            <!-- <h3>ZOOM</h3> -->
        </div>


    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p>Mã ID: {{$value->product_id}}</p>
            <img src="images/product-details/rating.png" alt="" />

            <form>
                @csrf
                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">

                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                <input type="hidden" value="{{$value->product_image}}"
                    class="cart_product_image_{{$value->product_id}}">

                <input type="hidden" value="{{$value->product_quantity}}"
                    class="cart_product_quantity_{{$value->product_id}}">

                <input type="hidden" value="{{$value->product_price}}"
                    class="cart_product_price_{{$value->product_id}}">

                <span>
                    <span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>

                    <label>Số lượng:</label>
                    <input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}" value="1" />
                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
                </span>
                <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart"
                    data-id_product="{{$value->product_id}}" name="add-to-cart">
            </form>

            <p><b>Tình trạng:</b> Còn hàng</p>
            <!-- <p><b>Điều kiện:</b> Mơi 100%</p> -->
            <p><b>Số lượng kho còn:</b> {{$value->product_quantity}}</p>
            <p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
            <p><b>Danh mục:</b> {{$value->category_name}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{!!$value->product_desc!!}</p>

        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p>{!!$value->product_content!!}</p>
        </div>

        <!-- <div class="tab-pane fade" id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<p><b>Write Your Review</b></p>
				
				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div> -->
    </div>
</div>
<!--/category-tab-->
@endforeach
<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">Sản phẩm liên quan</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($relate as $key => $lienquan)
                <div class="col-sm-4">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$lienquan->product_id}}"
                            class="cart_product_id_{{$lienquan->product_id}}">

                        <input type="hidden" value="{{$lienquan->product_name}}"
                            class="cart_product_name_{{$lienquan->product_id}}">

                        <input type="hidden" value="{{$lienquan->product_image}}"
                            class="cart_product_image_{{$lienquan->product_id}}">

                        <input type="hidden" value="{{$lienquan->product_quantity}}"
                            class="cart_product_quantity_{{$lienquan->product_id}}">

                        <input type="hidden" value="{{$lienquan->product_price}}"
                            class="cart_product_price_{{$lienquan->product_id}}">

                        <div class="single-products">
                            <div class="productinfo text-center product-related">
                               
                                <a href="{{URL::to('/chi-tiet/'.$lienquan->product_slug)}}">
									<img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
	                                <input name="qty" type="hidden" min="1"
	                                    class="cart_product_qty_{{$lienquan->product_id}}" value="1" />
	                                <input name="productid_hidden" type="hidden" value="{{$lienquan->product_id}}" />
									<h2>{{number_format($lienquan->product_price,0,',','.').' '.'VNĐ'}}</h2>
	               	 				<p>{{$lienquan->product_name}}</p>
               	 				 </a>
                                
                                <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart"
                                    data-id_product="{{$lienquan->product_id}}" name="add-to-cart">
                            </div>
                        </div>

                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--/recommended_items-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var id = $(this).data('id_product');
        // alert(id);
        var cart_product_id = $('.cart_product_id_' + id).val();
        var cart_product_name = $('.cart_product_name_' + id).val();
        var cart_product_image = $('.cart_product_image_' + id).val();
        var cart_product_quantity = $('.cart_product_quantity_' + id).val();
        var cart_product_price = $('.cart_product_price_' + id).val();
        var cart_product_qty = $('.cart_product_qty_' + id).val();
        var _token = $('input[name="_token"]').val();
        if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
            alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
        } else {
            $.ajax({
                url: '{{url(' / add - cart - ajax ')}}',
                method: 'POST',
                data: {
                    cart_product_id: cart_product_id,
                    cart_product_name: cart_product_name,
                    cart_product_image: cart_product_image,
                    cart_product_price: cart_product_price,
                    cart_product_qty: cart_product_qty,
                    _token: _token,
                    cart_product_quantity: cart_product_quantity
                },
                success: function(data) {
                    console.log(data)
                    // swal({
                    //         title: "Đã thêm sản phẩm vào giỏ hàng",
                    //         text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                    //         showCancelButton: true,
                    //         cancelButtonText: "Xem tiếp",
                    //         confirmButtonClass: "btn-success",
                    //         confirmButtonText: "Đi đến giỏ hàng",
                    //         closeOnConfirm: false
                    //     },
                    //     function() {
                    //         window.location.href = "{{url('/gio-hang')}}";
                    //     });
                }
            });
        }
    });
});
</script>

@endsection