@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">

    <!-- DAFTAR TRANSAKSI -->
    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h6>Daftar Transaksi</h6>
            <button class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahTransaksi">+ Tambah Transaksi</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pelanggan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Layanan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Berat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- nanti looping transaksi disini --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- MODAL TAMBAH TRANSAKSI -->
<div class="modal fade" id="modalTambahTransaksi" tabindex="-1" aria-labelledby="modalTambahTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Transaksi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row">

                    <div class="col-md-6 mb-3">
                        <label>Pelanggan</label>
                        <select name="pelanggan_id" class="form-control">
                            {{-- looping pelanggan --}}
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Layanan</label>
                        <select name="layanan_id" class="form-control">
                            {{-- looping layanan --}}
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Berat Cucian (Kg)</label>
                        <input type="number" step="0.1" name="berat" class="form-control" placeholder="cth: 2.5">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Total Harga</label>
                        <input type="number" name="total" class="form-control" placeholder="otomatis" disabled>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Foto Cucian (opsional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Metode Pembayaran</label>
                        <select name="metode" class="form-control" id="metodePembayaran">
                            <option value="cash">Cash</option>
                            <option value="qris">QRIS</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3" id="qrArea" style="display:none;">
                        <label>Scan QRIS</label><br>
                        <img src="{{ asset('assets/img/qris_dummy.png') }}" width="180">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Kasir</label>
                        <input type="text" name="kasir" class="form-control" value="{{ auth()->user()->name ?? '' }}" readonly>
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


<!-- MODAL EDIT STATUS -->
<div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="modalStatusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Update Status Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="baru">Baru</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="diambil">Diambil</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-gradient-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('metodePembayaran').addEventListener('change', function() {
        if (this.value === 'qris') {
            document.getElementById('qrArea').style.display = 'block';
        } else {
            document.getElementById('qrArea').style.display = 'none';
        }
    });
</script>

@endsection