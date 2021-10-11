@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('warehouse.update',$warehouse->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ $warehouse->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection