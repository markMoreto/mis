<?php 
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header("location: ../../../../");
	}

	include("inc/connection.inc.php");

 	if(!isset($dbconnection)){
		die("No database connection");
 	}
	
	if(!isset($_GET) || !isset($_GET['id'])){
		header("location: ../?user=".$_SESSION["currentuser"]."&page=dashboard");
	}
	
	$dbmis = $dbconnection->mis;
	$get = $dbmis->timeline->find(array("timeline_id" => new MongoId($_GET['id'])));
	if($get->hasNext()){
		$result = $get->getNext();
		
		$milestones = $result['dates_in_between'];
		//$project_start = date("d-m-Y", strtotime($result['date_start']));
		//$project_end = date("d-m-Y", strtotime($result['date_end']));
		$date1 = $result['date_start'];
		$date2 = $result['date_end'];
		
		$diff = abs(strtotime($date2) - strtotime($date1));
		//die($date1 . " - " . $date2);
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		
		$yearsday = $years * 365;
		$monthsday = $months * 30;
		
		
		$durationStart = $days + $yearsday + $monthsday;
		
		//die($durationStart);
		//$durationStart = date_diff($project_start, $project_end);
		//$durationStart = $durationStart / 86400;
	}else{
		die("passed id was not found.");
	}
?>

<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title><?php echo isset($_GET['project']) ? ucfirst($_GET['project']) : ''; ?> Report</title>
</head>
	<script src="codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="codebase/dhtmlxgantt.css" type="text/css" title="no title" charset="utf-8">

	<script type="text/javascript" src="samples/common/testdata.js"></script>
	<style type="text/css">
		html, body{ height:100%; padding:0px; margin:0px; overflow: hidden;}
	</style>
<body>
	<a onclick="window.print()">--------PRINT</a><br>
<input type="radio" id="scale1" name="scale" value="1" checked /><label for="scale1">Day scale</label><br>
<input type="radio" id="scale2" name="scale" value="2" /><label for="scale2">Week scale</label><br>
<input type="radio" id="scale3" name="scale" value="3" /><label for="scale3">Month scale</label><br>
<input type="radio" id="scale4" name="scale" value="4" /><label for="scale4">Year scale</label><br>

	<br />
	<hr />
	<div id="gantt_here" style='width:100%; height:100%;'></div>
	<script type="text/javascript">
        var tasks =  {
            data:[
            <?php 
            	$i = 1;
            	$y = 1;
				$projectName = isset($_GET['project']) ? ucfirst($_GET['project']) : 'No project';
            	echo "{id:{$i}, text:'". $projectName ."', start_date: '{$project_start}', duration: {$durationStart}, open: true},";
				
				foreach ($milestones as $key => $value) {
					$a = $i + 1;
					$b = "{";
					$b .= "id:".$a;
					$b .= ", text:'".$value['m_remarks'];
					$b .= "', start_date:'".date("d-m-Y", strtotime($value['m_start']))."', duration:".$value['m_duration'].", parent:".$y."},";
					echo $b;
					$i++;
				}
				
			  ?>
            ],
            links:[
            
            <?php 
            	for ($y = 1; $y <= $i ; $y++) {
            		$b = $y + 1; 
					$out = "{ id: {$y}, source: {$y}, target: {$b},";
					
					if($y == 1){
						$out .= " type:'1'},";
					}else{
						$out .= " type:'0'},";
					}
					echo $out;
				}
            ?>

            ]
        };

		gantt.init("gantt_here");
		gantt.parse(tasks);

		gantt.config.scale_unit = "day";
    gantt.config.step = 1;
    gantt.config.date_scale = "%d %M, %D";

    var func = function(e) {
        e = e || window.event;
        var el = e.target || e.srcElement;
        var value = el.value;

        switch (value) {
            case "1":
                gantt.config.scale_unit = "day";
                gantt.config.step = 1;
                gantt.config.date_scale = "%d %M, %D";
                gantt.config.subscales = [];
                gantt.config.scale_height = 27;
                gantt.templates.date_scale = null;
                break;
            case "2":
                var weekScaleTemplate = function(date){
                    var dateToStr = gantt.date.date_to_str("%d %M");
                    var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
                    return dateToStr(date) + " - " + dateToStr(endDate);
                };

                gantt.config.scale_unit = "week";
                gantt.config.step = 1;
                gantt.templates.date_scale = weekScaleTemplate;
                gantt.config.subscales = [
                    {unit:"day", step:1, date:"%D" }
                ];
                gantt.config.scale_height = 50;
                break;
            case "3":
                gantt.config.scale_unit = "month";
                gantt.config.date_scale = "%F, %Y";
                gantt.config.subscales = [
                    {unit:"day", step:1, date:"%j, %D" }
                ];
                gantt.config.scale_height = 50;
                gantt.templates.date_scale = null;
                break;
            case "4":
                gantt.config.scale_unit = "year";
                gantt.config.step = 1;
                gantt.config.date_scale = "%Y";
                gantt.config.min_column_width = 50;

                gantt.config.scale_height = 90;
                gantt.templates.date_scale = null;

                var monthScaleTemplate = function(date){
                    var dateToStr = gantt.date.date_to_str("%M");
                    var endDate = gantt.date.add(date, 2, "month");
                    return dateToStr(date) + " - " + dateToStr(endDate);
                };

                gantt.config.subscales = [
                    {unit:"month", step:3, template:monthScaleTemplate},
                    {unit:"month", step:1, date:"%M" }
                ];
                break;
        }

        gantt.render();
    };
    var els = document.getElementsByName("scale");
    for (var i = 0; i < els.length; i++) {
        els[i].onclick = func;
    }
	</script>
</body>
