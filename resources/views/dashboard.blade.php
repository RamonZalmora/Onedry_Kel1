@extends('layouts.user_type.auth')

@section('content')

<div class="row justify-content-center">
  <!-- Total Pelanggan -->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card h-100 shadow-lg border-0">
      <div class="card-body p-5">
        <div class="row align-items-center">
          <div class="col-9">
            <p class="text-lg mb-1 text-capitalize font-weight-bold">Total Pelanggan</p>
            <h2 class="font-weight-bolder mb-0">
              {{ $totalPelanggan ?? '120' }}
            </h2>
          </div>
          <div class="col-3 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-single-02 text-2xl opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Transaksi Hari Ini -->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card h-100 shadow-lg border-0">
      <div class="card-body p-5">
        <div class="row align-items-center">
          <div class="col-9">
            <p class="text-lg mb-1 text-capitalize font-weight-bold">Transaksi Hari Ini</p>
            <h2 class="font-weight-bolder mb-0">
              {{ $transaksiHariIni ?? '24' }}
            </h2>
          </div>
          <div class="col-3 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-cart text-2xl opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(session('user.role') == 'owner')
  <!-- Pendapatan Mingguan -->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card h-100 shadow-lg border-0">
      <div class="card-body p-5">
        <div class="row align-items-center">
          <div class="col-9">
            <p class="text-lg mb-1 text-capitalize font-weight-bold">Pendapatan Mingguan</p>
            <h2 class="font-weight-bolder mb-0">
              Rp {{ number_format($pendapatanMingguan ?? 1750000, 0, ',', '.') }}
            </h2>
          </div>
          <div class="col-3 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-chart-pie-35 text-2xl opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pendapatan Bulanan -->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card h-100 shadow-lg border-0">
      <div class="card-body p-5">
        <div class="row align-items-center">
          <div class="col-9">
            <p class="text-lg mb-1 text-capitalize font-weight-bold">Pendapatan Bulanan</p>
            <h2 class="font-weight-bolder mb-0">
              Rp {{ number_format($pendapatanBulanan ?? 7200000, 0, ',', '.') }}
            </h2>
          </div>
          <div class="col-3 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-credit-card text-2xl opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

@endsection