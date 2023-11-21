<!DOCTYPE html>
<html lang="id">

<head>
    <title>Laporan periode Tabungan</title>
</head>

<body class="bg-white">
    <div class="content px-3">
        <div class="row">
            <div class="col-md-12">
                <div >
                    <P>
                        <b>
                       <h6 style="font-family: Calibri;">
                           
                            </h6>
                        </b>
                    </P>
                </div>
                <u>
                    <h4 class="text-center" style="font-family: helvetica; font-size: 18pt;">Laporan Periode Tabungan</h4>
                </u>

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
                        @foreach ($savings as $saving)
                        <tr>
                        <td style="border: 1px solid #000000;">{{ $saving['name'] }}</td>
                            <td style="border: 1px solid #000000;">{{ $saving['kelas'] }}</td>
                            <td style="border: 1px solid #000000;">{{ $saving['nameM'] }}</td>
                            <td style="border: 1px solid #000000;">{{ number_format($saving['nominal']) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="border: 1px solid #000000; text-align: left;"><strong>Total:</strong></td>
                            <td style="border: 1px solid #000000;">{{ number_format($savings->sum('nominal')) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
