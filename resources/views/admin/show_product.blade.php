<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .h2-title{
            text-align: center;
            font-size: 40px;
            line-height: 50px;
            padding-top: 20px;
        }
        .th-color{
            background-color: skyblue;
        }
        .product-list-table table th,  .product-list-table table td{
            color: #fff;
        }
        #product-image{
            color: #fff;
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
            <h2 class="h2-title">All product</h2>
            <div class="table-responsive product-list-table">
                <table class="table">
                    <thead>
                        <tr class="th-color">
                            <th>Product title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Product Image</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $p)
                            <tr>
                                <td>{{$p->title}}</td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->quantity}}</td>
                                <td>{{$p->category}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->discount_price}}</td>
                                <td>
                                    <img src="/product/{{$p->image}}" alt="">
                                </td>
                                <td><a href="{{url('delete_product',$p->id)}}" onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger">Delete</a></td>
                                <td><a href="{{url('update_product',$p->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
