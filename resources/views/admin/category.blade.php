<!DOCTYPE html>
<html lang="en">
<head>
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
                <h2 class="h2font">Add Category</h2>
                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input type="text" name="category" placeholder="Write category name" class="input_color">
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table center">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->category_name}}</td>
                            <td><a onclick="return confirm('Are You Sure To Delete This')" href="{{url('delete_category',$data->id)}}" class="btn btn-danger">Delete</a> </td>
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

