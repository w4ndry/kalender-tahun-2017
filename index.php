<?php
require "core/init.php";

$monthNames = Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", 
"Agustus", "September", "Oktober", "November", "Desember");

if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];
 
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}

	$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
	$maxday = date("t",$timestamp);
	$thismonth = getdate ($timestamp);
	$today = date('j');
	$startday = $thismonth['wday'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Kalender Tahun 2017</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Costum Style -->
    <link href="assets/style/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

		<script>
			function date(date){
				console.log(date);
			}
		</script>
  </head>

  
  
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Kalender Tahun <?= $cYear; ?></h1>
        </div>
      </div>
      
      <div class="row">
        <main class="col-md-7 calender">
          <div class="col-md-12">
            <h2>Kalender</h1>
          </div>

          <div class="row header">
            <div class="col-md-12">
              <div class="row">
                <div class="col-xs-3 col-md-3">
                  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>"> Prev </a>
                </div>
                <div class="col-xs-6 col-md-6">
                  <p> <?php echo $monthNames[$cMonth-1].' '.$cYear; ?> </p>
                </div>
                <div class="col-xs-3 col-md-3">
                  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>"> Next </a>
                </div>
              </div>
            </div>
          </div> <!-- End row header -->

          <div class="row">
            <div class="col-md-12">
              <div class="day-of-week">
                Senin
              </div>
              <div class="day-of-week">
                Selasa
              </div>
              <div class="day-of-week">
                Rabu
              </div>
              <div class="day-of-week">
                Kamis
              </div>
              <div class="day-of-week">
                Jum'at
              </div>
              <div class="day-of-week sat">
                Sabtu
              </div>
              <div class="day-of-week sun">
                Minggu
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php 
								for ($i=1; $i<($maxday+$startday); $i++) {
										if($i < $startday) echo "<div class='day-of-week date'> </div>";
										else {
										if($i - $startday + 1 == $today && $i % 7 == 0 || $i - $startday + 1 == date(e)) echo "<a class='day-of-week btn date btn-danger'>". ($i - $startday + 1) . "</a>";
										else if($i - $startday + 1 == $today) echo "<a class='day-of-week btn date btn-info'>". ($i - $startday + 1) . "</a>";
										else if($i % 7 == 6) echo "<a class='day-of-week date btn btn-default sat'>". ($i - $startday + 1) . "</a>";
										else if($i % 7 == 0) echo "<a class='day-of-week btn date btn-default sun'>". ($i - $startday + 1) . "</a>";
										 else echo "<a class='day-of-week date btn btn-default'>". ($i - $startday + 1) . "</a>";
										}
								}
								
							?>
              
            </div>
          </div>
        


        </main>

        <aside class="col-md-offset-1 col-md-4 list-off-day">
          <h2>Hari Libur Nasional</h1>
					<?php
						if($cYear == 2017){
							$query = "SELECT * FROM hari_libur WHERE bulan = $cMonth";
							$data  = $conn->query($query);
							if($data->num_rows > 0){
								while($row = $data->fetch_assoc()){
									$date 	 = $row['tanggal'];
									$month 	 = $row['bulan'];
									$year 	 = $row['tahun'];
									$off_day = $row['hari_libur'];
					?>
					<div class="row">
							<a class="col-md-12 btn btn-default list-btn" onclick="date(<?=$date; ?>);">
								<?= $date . ' ' . $monthNames[$cMonth-1] . ' ' . $year . ', ' . $off_day; ?>
							</a>
					</div>
							<?php
									
										}
							}else{
								echo "Tidak ada hari libur";
							}
						}else{
							echo "No data for this year". ' ' . '@'.$cYear;
						}
						?>
        </aside>
      </div>
    </div> <!-- End container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>

	<script>
		$(function() {
			$('a.btn-default').on('click', function(){
				$('a.btn-default').css('background', '#fff');
				$(this).css('background', '#aaa');
			});
			$('.list-btn').on('click', function(){
				$('.list-btn').css('background', '#fff');
				$(this).css('background', '#aaa');
			});
			
		});
	</script>

</html>