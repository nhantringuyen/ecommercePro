<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 1px solid green;
        }
        .form-control{
            color: #000;
        }
        select.form-control{
            background-color: #fff;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
@include('admin.header')
<!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="div_center">
                <h2 class="h2font">Add Product</h2>
                <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group form-row align-items-center">
                        <label for="product-title" class="col-md-2">Product Title:</label>
                        <div class="col-md-10">
                            <input class="form-control" id="product-title" type="text" name="title" placeholder="Write a title" value="{{$product->title}}" required>
                        </div>
                    </div>
                    <div class="form-group form-row align-items-center">
                        <label for="product-description" class="col-md-2">Product Description:</label>
                        <div class="col-md-10">
                            <input class="form-control" id="product-description" type="text" name="description" placeholder="Write a description" value="{{$product->description}}" required>
                        </div>
                    </div>
                    <div class="form-group form-row align-items-center">
                        <label for="product-price" class="col-md-2">Product Price:</label>
                        <div class="col-md-10">
                            <input class="form-control" id="product-price" type="number" name="price" placeholder="Write a price" value="{{$product->price}}" required>
                        </div>
                    </div>
                    <div class="form-group form-row align-items-center">
                        <label for="discount-price" class="col-md-2">Discount Price:</label>
                        <div class="col-md-10">
                            <input class="form-control" id="discount-price" type="number" name="discount_price" placeholder="Write discount price is a apply" value="{{$product->discount_price}}">
                        </div>
                    </div>
                    <div class="form-group form-row align-items-center">
                        <label for="product-quantity" class="col-md-2">Product Quantity:</label>
                        <div class="col-md-10">
                            <input class="form-control" id="product-quantity" type="number" min="0" name="quantity" placeholder="Write a quantity" value="{{$product->quantity}}" required>
                        </div>
                    </div>
                    <div class="form-group form-row align-items-center">
                        <label for="product-category" class="col-md-2">Product Category:</label>
                        <div class="col-md-10">
                            <select class="form-control" id="product-category" name="category" required>
                                <option value="">Add a category here</option>
                                @foreach($category as $cat)
                                    <option value="{{$cat->category_name}}" {{($cat->category_name == $product->category) ? 'selected' : '' }}>{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-row align-items-center">
                        <label for="product-image" class="col-md-2">Current Product Image:</label>
                        <div class="col-md-10">
                            <img src="/product/{{$product->image}}" height="100" width="100">
                        </div>
                    </div>
                    <div class="form-group form-row align-items-center">
                        <label for="product-image" class="col-md-2">Change Product Image:</label>
                        <div class="col-md-10">
                            <input class="form-control" id="product-image" type="file"  name="product_image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>
