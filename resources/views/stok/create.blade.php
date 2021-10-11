@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('stok.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Stok</label>
            <input type="text" class="form-control" name="jumlah">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Produk</label>
            <select name="product_id" id="" class="form-control">
                @foreach ($product as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Gudang</label>
            <select name="warehouse_id" id="" class="form-control">
                @foreach ($warehouse as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection