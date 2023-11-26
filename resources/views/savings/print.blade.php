<!DOCTYPE html>
<html lang="id">

<head>
    <title>Laporan periode Tabungan</title>
</head>

<body class="bg-white">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3>Laporan Tabungan<br>SMK AL-BAHRI</h3>
                </div>
                
                        </b>
        
                    </p>
                </div>
                <u>
                    <h4 class="text-center" style="font-family: helvetica; font-size: 18pt;">Laporan Periode Tabungan</h4>
                </u>
                @if (request('dari_tgl'))
                    <div class="text-center mb-3">
                        <small>dari tanggal {{ request('dari_tgl') }} sampai tanggal {{ request('sampai_tgl') }}</small>
                    </div>
                @endif
                <table class="table table-striped" style="border: 1,5px solid #000000;">
                    <thead>
                        <tr>
                            <th style="background-color: #C0C0C0;">Name</th>
                            <th style="background-color: #C0C0C0;">Class</th>
                            <th style="background-color: #C0C0C0;">Month</th>
                            <th style="background-color: #C0C0C0;">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($savings as $saving)
                        <tr>
                            <td style="border: 1px solid #000000;">{{ $saving['name'] }}</td>
                            <td style="border: 1px solid #000000;">{{ $saving['kelas'] }}</td>
                            <td style="border: 1px solid #000000;">{{ $saving['nameM'] }}</td>
                            <td style="border: 1px solid #000000;">{{ number_format($saving['nominal']) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">
                                Data pada tanggal-bulan ini tidak ada
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
