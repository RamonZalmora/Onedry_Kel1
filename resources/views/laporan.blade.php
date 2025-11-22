@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <div class="container-fluid py-4">
    <h4>Laporan Transaksi</h4>

    <div class="card p-4 mt-4">
        <form>
            <div class="row">

                <div class="col-md-4">
                    <label>Tipe Laporan</label>
                    <select class="form-control">
                        <option value="harian">Harian</option>
                        <option value="bulanan">Bulanan</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Pilih Tanggal / Bulan</label>
                    <input type="date" class="form-control">
                </div>

                <div class="col-md-4">
                    <label style="visibility: hidden;">filter</label><br>
                    <button class="btn bg-gradient-primary w-100">Tampilkan</button>
                </div>

            </div>
        </form>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h6>Hasil Laporan</h6>
        </div>
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Berat</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
                </tbody>
            </table>

            <div class="text-end mt-3">
                <button class="btn bg-gradient-primary">Export PDF</button>
                <button class="btn bg-gradient-primary">Export Excel</button>
            </div>

        </div>
    </div>

  </div>
</main>
@endsection
