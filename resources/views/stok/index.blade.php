@extends('layouts.app')
@section('content')
    <a href="{{ route('stok.create') }}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Produk</th>
      <th scope="col">Gudang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Satuan</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($stok as $item)
        <tr>
      <td>{{ $item->product->name }}</td>
      <td>{{ $item->warehouse->name }}</td>
      <td>{{ $item->jumlah }}</td>
      <td>{{ $item->product->satuan }}</td>
      <td>
          <a href="{{ route('stok.edit',$item->id) }}" class="btn btn-primary">Edit</a>
          {{-- <form action="{{ route('customer.destroy',$item->id) }}" method="post">
            @csrf
            @method('delete')
          <button type="submit" class="btn btn-danger">Delete</button>
          </form> --}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection