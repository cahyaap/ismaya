<?php
    include "koneksi.php";
?>
<table class="table table-hover" id="table-master">
    <thead>
        <th class="text-center">No</th>
        <th class="text-center">Nama Pelanggan</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Total Belanja</th>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM history WHERE tanggal = (SELECT tanggal FROM laporan ORDER BY tanggal DESC LIMIT 1)";
            $result = $mysqli->query($query);
            $nomor = 1;
            $total = 0;
            while($row = $result->fetch_object()){
        ?>
        <tr>
            <td class="text-center"><?= $nomor ?></td>
            <td><?= $row->nama_pelanggan ?></td>
            <td class="text-center"><?= date("d/m/Y", strtotime($row->tanggal)) ?></td>
            <td class="text-right" align="right"><?= number_format($row->total_belanja, 0) ?></td>
        </tr>
        <?php
                $total += $row->total_belanja;
                $nomor++;
            }
        ?>
    </tbody>
    <tfoot>
        <th class="text-center" colspan="3">Total</th>
        <th class="text-right" style="text-align: right;"><?= number_format($total, 0) ?></th>
    </tfoot>
</table>