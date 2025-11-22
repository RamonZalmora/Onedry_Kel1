<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Laporan Transaksi</title>
    <style>
        body{font-family: DejaVu Sans, sans-serif;color:#333;}
        table{width:100%;border-collapse:collapse;}
        th,td{border:1px solid #ddd;padding:8px;text-align:left;}
        th{background:#f4f4f4;}
    </style>
</head>
<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr><th>Kode</th><th>Pelanggan</th><th>Layanan</th><th>Berat</th><th>Total</th><th>Status</th><th>Tanggal</th></tr>
        </thead>
        <tbody>
            @foreach($transaksis as $t)
            <tr>
                <td>{{ $t->kode }}</td>
                <td>{{ $t->pelanggan->nama }}</td>
                <td>{{ $t->layanan->nama }}</td>
                <td>{{ $t->berat }}</td>
                <td>{{ $t->total }}</td>
                <td>{{ $t->status }}</td>
                <td>{{ $t->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
