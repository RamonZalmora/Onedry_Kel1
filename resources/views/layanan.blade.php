@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">

    <!-- DAFTAR LAYANAN -->
    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h6>Daftar Layanan</h6>
            <button class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalLayanan">+ Tambah Layanan</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Layanan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- nanti looping layanan disini --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal Tambah / Edit Layanan -->
<div class="modal fade" id="modalLayanan" tabindex="-1" aria-labelledby="modalLayananLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <form method="POST" action="">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalLayananLabel">Tambah / Edit Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Layanan</label>
                    <input type="text" name="nama" class="form-control" placeholder="cth: Cuci Kering">
                </div>

                <div class="mb-3">
                    <label>Tipe Layanan</label>
                    <select name="tipe" class="form-control">
                        <option value="kg">Per Kg</option>
                        <option value="item">Per Item</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="cth: 7000">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
            </div>
        </form>

    </div>
  </div>
</div>
@endsection
