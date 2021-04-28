@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="pull-left">
                <h3>Edit Brand</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('brands.index') }}"> Back</a>
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
  
    <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="row justify-content-center">
            <div class="col-md-8">
                <select class="browser-default custom-select mb-3" name="store_id" required>
                    <option selected>Select Store</option>
                    @foreach($stores as $store)
                    <option value="{{ $store->id }}" @if($store->id == $brand->store_id) selected @endif>{{ $store->url }}</option>
                    @endforeach
                </select>

                <div class="input-group mb-3 td-img">
                    <img src="/images/{{ $brand->brand_image }}">
                </div>

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="brand_image" multiple class="custom-file-input form-control" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Brand Title</span>
                    </div>
                    <input type="text" name="brand_title" value="{{ $brand->brand_title }}" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Brand Tag</span>
                    </div>
                    <input type="text" name="brand_tag" value="{{ $brand->brand_tag }}" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Brand Description</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="brand_description" required>{{ $brand->brand_description }}</textarea>
                </div>
            </div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection