@extends('layouts.app')
@section('content')
    <a href="{{ route('warehouse.create') }}" class="btn btn-primary">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($warehouse as $item)
        <tr>
      <td>{{ $item->name }}</td>
      <td>
          <a href="{{ route('warehouse.edit',$item->id) }}" class="btn btn-primary">Edit</a>
          {{-- <form action="{{ route('warehouse.destroy',$item->id) }}" method="post">
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