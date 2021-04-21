
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/" method="POST" enctype="multipart/form-data">
                <select class="browser-default custom-select mb-3">
                    <option selected>Select Brand</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="product_title">Product Title</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Product Title" aria-label="Brandtags" aria-describedby="product_title">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Product Description</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="product_price">Product Price</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Product Price" aria-label="Brandtags" aria-describedby="product_price">
                </div>

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="files[]" multiple class="custom-file-input form-control" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection