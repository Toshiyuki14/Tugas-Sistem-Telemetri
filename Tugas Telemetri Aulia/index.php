<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Aulia Unisma</title>

    <script src="jquery/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      setInterval(function(){
        $("#cekdetakjantung").load('cekdetakjantung.php');
        $("#cekstatus").load('cekstatus.php');
      },1000);
    });
  
  </script>
    

  </head>
  <body>

  <div>
    <class="container" style="text-align:center";> 
    <center>
    <img src="images/jantung.jpg" style="width: 500px;">
    </center>
      <h2>
        Sistem Monitoring Detak Jantung Pasien <br>berbasis web secara real time
      </h2>

      <div style="justify-content: center; display:flex">
      <div class="card text-center" style="width: 50%;">
      <div class="card-header" style="font-size: 30px; font-weight:bold; background-color:yellow">
      Rata-Rata Detak Jantung

      </div>
      <div class="card-body">
        <h1 style="font-weight: bold"><span id="cekdetakjantung">NoFinger</span><span style="font-size:20px">  BPM</span>

        </h1>
      </div>
      <div class="card-footer">
        <span id="cekstatus">Status : -</span>

      </div>
      
      </div>

      </div>
      <div class="container" style="margin-top: 20px">
        <img src="images/unisma.png">

      </div>
  </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
