<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Peserta</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background: #eee;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Data Peserta</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Satker</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesertas as $index => $p)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nip }}</td>
                <td>{{ $p->satker }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
