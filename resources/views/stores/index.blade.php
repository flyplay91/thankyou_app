@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('stores.create') }}"> Add New Store</a>
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
            <th>Store Url</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($stores as $store)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $store->url }}</td>
            <td>
                <form action="{{ route('stores.destroy',$store->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('stores.edit',$store->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>  
    {!! $stores->links() !!}
      
@endsection