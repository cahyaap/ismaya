<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ismaya Sentra Bisnis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 text-center">
                <h4>Test Web Developer (REMOTE) PT. ISMAYA SENTRA BISNIS</h4>
                <strong><small>Developed by <a href="https://www.instagram.com" target="_blank">cahyaajipermana</a></small></strong>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <h5>Form Input</h5>
                    <button type="button" id="btnProses" onclick="proses()" class="btn btn-success">Proses Semua History</button>
                    <span id="process-data" style="display: none;">Memproses data...</span>
                </div>
                <div class="form-group" id="load-table" style="display: none;">Memuat data...</div>
                <div class="form-group table-responsive" id="data-table"></div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        function getHistory(){
            $.ajax({
                url: "history.php",
                beforeSend: function(){
                    $("#data-table").empty();
                    $("#load-table").show();
                },
                success: function(res){
                    $("#load-table").hide();
                    $("#data-table").html(res);
                    $("#table-master").DataTable();
                }
            });
        }

        function proses(){
            $.ajax({
                url: "proses.php",
                dataType: "json",
                beforeSend: function(){
                    $("#btnProses").hide();
                    $("#data-table").empty();
                    $("#process-data").show();
                    $("#load-table").show();
                },
                success: function(res){
                    $("#process-data").hide();
                    $("#load-table").hide();
                    $("#btnProses").show();
                    getHistory();
                }
            });
        }
        $(document).ready(function(){
            getHistory();
        });
    </script>
</body>
</html>