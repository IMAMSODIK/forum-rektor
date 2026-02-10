<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Kit Peserta</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background: #f2f2f2;
        }

        .ttd img {
            height: 60px;
        }
    </style>
</head>
<body>

<h3 style="text-align:center;">DAFTAR PENERIMAAN KIT PESERTA</h3>

<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="25%">Nama Peserta</th>
            <th width="15%">No HP</th>
            <th width="35%">Daftar Kit</th>
            <th width="20%">Tanda Tangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td style="text-align:left">{{ $item->nama }}</td>
                <td>{{ $item->no_hp }}</td>
                <td style="text-align:left">
                    ID Card : {{ $item->kit && $item->kit->id_card ? '✔' : '-' }}<br>
                    Goodie Bag : {{ $item->kit && $item->kit->goodie_bag ? '✔' : '-' }}<br>
                    Shall : {{ $item->kit && $item->kit->shall ? '✔' : '-' }}<br>
                    Tas : {{ $item->kit && $item->kit->tas ? '✔' : '-' }}
                </td>
                <td class="ttd">
                    @if($item->ttd)
                        <img src="{{ asset($item->ttd) }}">
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
