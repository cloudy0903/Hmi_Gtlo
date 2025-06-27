<?php
session_start();
include 'koneksi.php';

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="img/sekolah.png">
    <title>BUKU TAMU</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .head {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .head img {
            width: 80px;
            margin-right: 20px;
        }

        .head .title {
            text-align: center;
            flex: 1;
        }

        .head .title h1 {
            margin: 0;
            font-size: 22px;
        }

        .head .title h2 {
            margin: 0;
            font-size: 18px;
        }

        .head .title h3 {
            margin: 0;
            font-size: 15px;
            font-style: italic;
        }

        .head .title p {
            margin: 5px 0;
        }

        .report-title {
            text-align: center;
            font-size: 24px;
            margin: 30px 0;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        table td {
            text-align: center;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .signature .date {
            margin-bottom: 40px;
        }

        .signature p {
            margin: 0;
        }

        .signature .name {
            margin-top: 50px;
        }

        .signature .name u {
            text-decoration: underline;
        }

        .signature .id-number {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="head">
        <img src="img/sekolah.png" alt="Logo Sekolah">
        <div class="title">
            <h1>KEMENTERIAN AGAMA DAN REPUBLIK INDONESIA</h1>
            <h2>KANTOR KEMENTERIAN AGAMA GORONTALO</h2>
            <h3>MADRASAH ALIYAH NEGERI 1</h3>
            <p>Jl. Poigar No.26 Kel. Molosipat U Kec. Sipatana Kota Gorontalo 96139</p>
        </div>
    </div>

    <div class="report-title">Daftar User Tamu</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM pengurus_komisariat");

            if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$data['nama']}</td>";
                    echo "<td>{$data['jenis_kelamin']}</td>";
                    echo "<td>{$data['alamat']}</td>";
                    echo "<td>{$data['no_tlp']}</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo '<tr><td colspan="5" align="center">TIDAK ADA DATA</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <div class="signature">
        <p class="date">Gorontalo, <script>document.write(new Date().toLocaleDateString());</script></p>
        <p>KEPALA SEKOLAH</p>
        <div class="name">
            <p><strong><u>Dr. H. Karjianto, S.Pd.I., M.Pd</u></strong></p>
            <p class="id-number"><strong>1985062720110110</strong></p>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
