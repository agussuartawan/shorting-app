<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="text-align: center">
        <h1>Laporan Stock Opname</h1>
    </div>
    <table border="1" width="100%" style="border-collapse: collapse">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Sisa Stok</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($shorted as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td style="text-align: right">{{ $item->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
