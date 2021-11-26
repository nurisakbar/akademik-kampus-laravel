<table border="1">
    <tr>
        <th>NIDN</th>
        <th>Nama Dosen</th>
        <th>No HP</th>
        <th>Email</th>
    </tr>
    @foreach($dosen as $row)
    <tr>
        <td>{{ $row->nidn }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->no_hp }}</td>
        <td>{{ $row->email }}</td>
    </tr>
    @endforeach
</table>