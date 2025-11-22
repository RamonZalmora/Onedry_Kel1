@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Ubah Status Transaksi</h1>
<form action="{{ route('transaksi.update', $transaksi) }}" method="POST" class="bg-white p-6 rounded shadow w-1/3">
    @csrf @method('PUT')
    <label>Status</label>
    <select name="status" class="w-full p-2 border mb-3">
        @foreach($statuses as $s)
            <option value="{{ $s }}" {{ $s == $transaksi->status ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
        @endforeach
    </select>
    <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
