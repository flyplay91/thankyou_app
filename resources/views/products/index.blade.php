@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Store Url</th>
                <th>Brand Title</th>
                <th>Product Title</th>
                <th>Product Link</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Product Color</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr data-id="{{ $product->id }}">
                <td>{{ ++$i }}</td>
                <td>
                    {{ $product->store->url }}
                </td>
                <td>
                    {{ $product->brand->brand_title }}
                </td>
                <td>{{ $product->product_title }}</td>
                <td>{{ $product->product_link }}</td>
                <td>{{ $product->product_description }}</td>
                <td>{{ $product->product_price }}</td>
                <td class="td-img"><img src="/images/{{ $product->product_image }}"></td>
                <td>{{ $product->product_color }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
  
    {!! $products->links() !!}
      
@endsection