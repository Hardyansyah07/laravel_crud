<!DOCTYPE html>
<html>

<head>
    <title>Export Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>{{ $title }}</h1>
    </center>
    <p>Tanggal: {{ $date }}</p>
    <table id="dataTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok</th>
                <th>ID Merk</th>

            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ($barang as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>{{ $data->harga_barang }}</td>
                <td>{{ $data->stok}}</td>
                <td>{{ $data->id_merek }}</td>

            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">
                    Data data belum Tersedia.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
