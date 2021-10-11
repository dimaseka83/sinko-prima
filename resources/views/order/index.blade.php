@extends('layouts.app')
@section('content')
    <a href="{{ route('order.create') }}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Order</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($purchasings as $item)
        <tr>
      <td>Order Number {{ $item->id }}</td>
      <td>
          <a href="{{ route('order.edit',$item->id) }}" class="btn btn-primary">Edit</a>
          {{-- <form action="{{ route('order.destroy',$item->id) }}" method="post">
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