<?php 

function dateTimeDiff($date_block,$available_date){

// Extract from $available_date
$available_year = substr($available_date,0,4);
$available_month = substr($available_date,5,2);
$available_day = substr($available_date,8,2);

// Extract from $date_block
$ref_year = substr($date_block,0,4);
$block_month = substr($date_block,5,2);
$block_day = substr($date_block,8,2);

// create a string yyyymmdd 20071021
$tempMaxDate = $available_year . $available_month . $available_day;
$tempDataBlock = $block_year . $block_month . $block_day;

$tempDifference = $tempMaxDate-$tempDataBlock;

	// If the difference is GT 10 days show the date
	if($tempDifference >= 10){
	echo $date_block;
	} else {

		// Extract $available_date H:m:ss
		$available_hour = substr($available_date,11,2);
		$available_min = substr($available_date,14,2);
		$available_seconds = substr($available_date,17,2);

		// Extract $date_block Date H:m:ss
		$block_hour = substr($date_block,11,2);
		$block_min = substr($date_block,14,2);
		$block_seconds = substr($date_block,17,2);

		$hDf = $available_hour-$block_hour;
		$mDf = $available_min-$block_min;
		$sDf = $available_seconds-$block_seconds;

	// Show time difference ex: 2 min 54 sec ago.
	if($dDf<1){
		if($hDf>0){
			if($mDf<0){
				$mDf = 60 + $mDf;
				$hDf = $hDf - 1;
				return $mDf . ' min left'; 
			} else {
				return $hDf. ' hr ' . $mDf . ' min left';
			}
		} else {
			if($mDf>0){
				return $mDf . ' min ' . $sDf . ' sec left';
			} else {
				return $sDf . ' sec left';
			}
		}
	} else {
		return $dDf . ' days left';
	}
}
}
?>