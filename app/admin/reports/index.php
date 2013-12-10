<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title><?php echo isset($_GET['project']) ? ucfirst($_GET['project']) : 'Burgundy Tower'; ?> Report</title>
</head>
	<script src="codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title" charset="utf-8">

	<script type="text/javascript" src="samples/common/testdata.js"></script>
	<style type="text/css">
		html, body{ height:100%; padding:0px; margin:0px; overflow: hidden;}
	</style>
<body>
	<br />
	<hr />
	<div id="gantt_here" style='width:100%; height:100%;'></div>
	<script type="text/javascript">
        var tasks =  {
            data:[
            {id:1, text:"<?php echo isset($_GET['project']) ? ucfirst($_GET['project']) : 'Burgundy Tower'; ?>", start_date:"01-04-2013", duration:18,order:10, progress:0.4, open: true},
              {id:2, text:"Development", 	  start_date:"02-04-2013", duration:8, order:10, progress:0.6, parent:1},
              {id:3, text:"Production",    start_date:"11-04-2013", duration:8, order:20, progress:0.1, parent:1},
            {id:4, text:"Test Cycle",    start_date:"01-04-2013", duration:18, order:20, progress:0.7, parent:1}
            ],
                    links:[
            { id:1, source:1, target:2, type:"1"},
            { id:2, source:2, target:3, type:"0"},
            { id:3, source:3, target:4, type:"0"},
            { id:4, source:2, target:5, type:"2"},
        ]
        };

		gantt.init("gantt_here");


		gantt.parse(tasks);

	</script>
</body>
