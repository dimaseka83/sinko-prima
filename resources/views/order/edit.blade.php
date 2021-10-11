@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('order.update',$purchasings->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
             <select name="customer_id" id="" class="form-control">
                @foreach ($customer as $item)
                <option value="{{ $item->id }}" @if ($purchasings->customer_id === $item->id)
                    selected
                @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" name="address" value="{{ $purchasings->address }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Pay Product</label>
            <input type="text" class="form-control" name="pay_product" value="{{ $purchasings->pay_product }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Delivery Date</label>
            <input type="date" class="form-control" name="delivery_date" value="{{ $purchasings->delivery_date }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Delivery Courier</label>
            <input type="text" class="form-control" name="delivery_courier" value="{{ $purchasings->delivery_courier }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Gudang</label>
            <select name="warehouse_id" id="" class="form-control">
                @foreach ($warehouse as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <a class="btn btn-success" id="btn-tambah">Add Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th colspan="2">Jumlah</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($order as $item)
                <tr>
                    <td><select class="form-control" name="product_id[]" id="">
                            @foreach ($product as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach</select></td>
                    <td><input type="number" name="jumlah[]" id="" class="form-control" value="{{ $item->jumlah }}">
                    </td>
                    <td><select name="status[]" class="form-control" id="">
                            <option value="1" @if ($item->status === 1)
                                selected
                            @endif>Order</option>
                            <option value="2" @if ($item->status === 2)
                                selected
                            @endif>Process</option>
                            <option value="3" @if ($item->status === 3)
                                selected
                            @endif>Paid</option>
                            <option value="4" @if ($item->status === 4)
                                selected
                            @endif>Cancelled</option>
                        </select></td>
                    </td>
                    <td><button class="btn btn-danger" id="delete">X</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    $(document).on('click', '#btn-tambah', function () {
        addData();
    });

    function addData(nama_barang, jumlah) {
        let tambah_data =
            '<tr><td><select class ="form-control" name="product_id[]" id="">@foreach ($product as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td><td><input type="number" name="jumlah[]" id="" class="form-control"></td><td><select name="status[]" class="form-control" id=""><option value="1">Order</option><option value="2">Process</option><option value="3">Paid</option><option value="4">Cancelled</option></select></td></td><td><button class="btn btn-danger" id="delete">X</button></td></tr>';
        $('.tbody').append(tambah_data);
    }
    $(document).on('click', '#delete', function () {
        $(this).parent().parent().remove();
    });
    $(document).on('click', '#delete-data', function () {
        const id = $('#id').val();
        $.ajax({
            url: "edit/delete",
            data: {
                'id': id
            },
            method: 'GET',
            success: function (response) {
                alert("Data Berhasil Dihapus");
            }
        });
        $(this).parent().parent().remove();
    });

</script>
@endsection
