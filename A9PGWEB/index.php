<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "faskes_mjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM faskes";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input Data</a><br><br>";

if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Jenis</th>
                <th>Nama Faskes</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Jumlah Dokter Umum</th>
                <th>Jumlah Dokter Spesialis</th>
                <th>Jumlah Dokter Gigi</th>
                <th colspan='2'>Aksi</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["jenis"] . "</td>
                <td>" . $row["nama faskes"] . "</td>
                <td>" . $row["longitude"] . "</td>
                <td>" . $row["latitude"] . "</td>
                <td>" . $row["jumlah dokter umum"] . "</td>
                <td>" . $row["jumlah dokter spesialis"] . "</td>
                <td>" . $row["jumlah dokter gigi"] . "</td>
                <td><a href='edit/index.php?id=" . $row["id"] . "'>edit</a></td>
                <td><a href='delete.php?id=" . $row["id"] . "'>hapus</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

$conn->close();
?>