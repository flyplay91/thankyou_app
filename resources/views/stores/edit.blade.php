@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="pull-left">
                <h3>Edit Store</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('stores.index') }}"> Back</a>
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
  
    <form action="{{ route('stores.update',$store->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="store_url">Store Url</span>
                    </div>
                    <input type="text" name="url" value="{{ $store->url }}" class="form-control">
                </div>
            </div>

            <div class="col-md-8">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection