<?php echo "<center> <h1>";
$cdate = mktime(0, 0, 0, 3, 27, 2015, 0);
$today = time();
$difference = $cdate - $today;
if ($difference < 0) { $difference = 0; }
echo "There are ". floor($difference/60/60/24)." days remaining until the Project Hand-in<br />";
$cdate = mktime(0, 0, 0, 3, 6, 2015, 0);
$today = time();
$difference = $cdate - $today;
if ($difference < 0) { $difference = 0; }
echo "There are ". floor($difference/60/60/24)." days remaining until the AI Assignment Hand-in<br />";
$cdate = mktime(0, 0, 0, 5, 11, 2015, 0);
$today = time();
$difference = $cdate - $today;
if ($difference < 0) { $difference = 0; }
echo "There are ". floor($difference/60/60/24)." days remaining until the Mobile Application Development Exam<br />";
$cdate = mktime(0, 0, 0, 5, 18, 2015, 0);
$today = time();
$difference = $cdate - $today;
if ($difference < 0) { $difference = 0; }
echo "There are ". floor($difference/60/60/24)." days remaining until the Enterprise Programming Exam<br />";
$cdate = mktime(0, 0, 0, 5, 26, 2015, 0);
$today = time();
$difference = $cdate - $today;
if ($difference < 0) { $difference = 0; }
echo "There are ". floor($difference/60/60/24)." days remaining until the AI Exam<br />";
echo "</center> </h1>";
?>