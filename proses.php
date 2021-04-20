<?php
    include "koneksi.php";

    // select data from transaksi & laporan
    $sql = "SELECT *, (SELECT tanggal FROM laporan ORDER BY tanggal DESC LIMIT 1) as tanggal, ((SELECT omset FROM laporan ORDER BY tanggal DESC LIMIT 1) * quantity / (SELECT total_quantity FROM laporan ORDER BY tanggal DESC LIMIT 1)) as total_belanja FROM transaksi";
    
    $result = $mysqli->query($sql);

    $return["status"] = false;

    if ($result) {
        $return["status"] = true;
        while ($row = $result->fetch_object()) {
            
            $nama_pelanggan = $row->nama_pelanggan;
            $tanggal = $row->tanggal;
            $total_belanja = $row->total_belanja;

            // insert data to history table
            $result2 = $mysqli->query("INSERT INTO history (`nama_pelanggan`, `tanggal`, `total_belanja`) VALUES ('$nama_pelanggan', '$tanggal', '$total_belanja')");
            
        }
    }
    
    $mysqli->close();

    echo json_encode($return);
?>