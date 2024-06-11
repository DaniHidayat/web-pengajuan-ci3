<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Laporan</h2>
	<table>
    <thead>
        <tr>
            <th>ID Pengajuan</th>
            <th>Nama Daerah</th>
            <th>Anggaran</th>
            <th>Keterangan</th>
            <th>Nama Pengajuan</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['id_pengajuan']; ?></td>
            <td><?php echo isset($row['Nama_KotaKab']) ? $row['Nama_KotaKab'] : $row['Nama_Provinsi']; ?></td>
            <td><?php echo $row['anggaran']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td><?php echo $row['Nama_pengajuan']; ?></td>
            <td><?php echo $row['tanggal_pengajuan']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
