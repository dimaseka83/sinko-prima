@extends('layouts.app')
@section('content')
    <a href="{{ route('customer.create') }}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customer as $item)
        <tr>
      <td>{{ $item->name }}</td>
      <td>{{ $item->alamat }}</td>
      <td>
          <a href="{{ route('customer.edit',$item->id) }}" class="btn btn-primary">Edit</a>
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