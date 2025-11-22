@extends('layouts.user_type.auth')

@section('content')
<main class="main-content mt-0">
    <div class="container-fluid py-3">

        {{-- judul halaman --}}
        <h4 class="mb-3">Pelanggan</h4>

        {{-- tombol tambah --}}
        <button class="btn bg-gradient-primary mb-3" onclick="document.getElementById('formTambah').classList.toggle('d-none')">
            Tambah Pelanggan
        </button>

        {{-- TABEL PELANGGAN --}}
        <div class="card mb-4">
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- nanti isi foreach dari db --}}
                        <tr>
                            <td colspan="4" class="text-center text-secondary">
                                Data pelanggan belum ada
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>


        {{-- FORM TAMBAH / EDIT --}}
        <div id="formTambah" class="card p-3 d-none">
            <h6>Tambah / Edit Pelanggan</h6>

            <form>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="2"></textarea>
                </div>

                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
            </form>
        </div>


        {{-- DETAIL PELANGGAN --}}
        <div class="card mt-4 p-3">
            <h6>Detail Pelanggan (Riwayat Transaksi)</h6>

            <p class="text-secondary">Klik tombol <b>Detail</b> pada tabel untuk lihat riwayat pelanggan</p>
        </div>

    </div>
</main>
@endsection
