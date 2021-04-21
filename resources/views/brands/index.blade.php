@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('brands.create') }}"> Add New brand</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Brand Title</th>
            <th>Brand Tag</th>
            <th>Brand Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($brands as $brand)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $brand->brand_title }}</td>
            <td>{{ $brand->brand_tag }}</td>
            <td>{{ $brand->brand_description }}</td>
            <td>
                <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>  
    {!! $brands->links() !!}
      
@endsection