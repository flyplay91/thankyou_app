@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row justify-content-center">
            <div class="col-md-8">
                <select class="browser-default custom-select mb-3" name="store_id" required>
                    <option selected>Select Store</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @if($brand->id == $product->brand_id) selected @endif>{{ $brand->brand_title }}</option>
                    @endforeach
                </select>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Product Title</span>
                    </div>
                    <input type="text" value="{{ $product->product_title }}" name="product_title" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Product Link</span>
                    </div>
                    <input type="text" value="{{ $product->product_link }}" name="product_link" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Product Description</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="product_description" required>{{ $product->product_description }}</textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Product Price</span>
                    </div>
                    <input type="text" value="{{ $product->product_price }}" name="product_price" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="product_image" multiple class="custom-file-input form-control" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection