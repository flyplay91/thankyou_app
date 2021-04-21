
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/">
                <select class="browser-default custom-select mb-3">
                    <option selected>Select Store</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="brand_title">Brand Title</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Yuicy" aria-label="Brandtitle" aria-describedby="brand_title">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="brand_tags">Brand Tags</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Cruelty free, Vegan" aria-label="Brandtags" aria-describedby="brand_tags">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Brand Description</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection