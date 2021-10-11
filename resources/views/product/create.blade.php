@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Satuan</label>
            <input type="text" class="form-control" name="satuan">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection