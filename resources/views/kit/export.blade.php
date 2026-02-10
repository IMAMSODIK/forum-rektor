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

        th,
        td {
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

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background: #f2f2f2;
        }

        .check {
            font-weight: bold;
            font-size: 16px;
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
                <th width="20%">Nama Peserta</th>
                <th width="12%">No HP</th>
                <th width="10%">ID Card</th>
                <th width="10%">Goodie Bag</th>
                <th width="10%">Shall</th>
                <th width="10%">Tas</th>
                <th width="23%">Tanda Tangan</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td style="text-align:left">{{ $item->nama }}</td>
                    <td>{{ $item->no_hp }}</td>

                    <td class="check">{{ $item->kit && $item->kit->id_card ? '✓' : '-' }}</td>
                    <td class="check">{{ $item->kit && $item->kit->goodie_bag ? '✓' : '-' }}</td>
                    <td class="check">{{ $item->kit && $item->kit->shall ? '✓' : '-' }}</td>
                    <td class="check">{{ $item->kit && $item->kit->tas ? '✓' : '-' }}</td>

                    <td class="ttd">
                        @if ($item->ttd)
                            <img src="{{ public_path($item->ttd) }}">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
