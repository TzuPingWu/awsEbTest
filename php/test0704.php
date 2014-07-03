<html>
<head>
<title>Test File</title>
</head>
<body>
<p> This is the test file.</p>
<p> The count in the file is....
<?php
$temp = 0;
$file = fopen("count.txt","r+") or die("Unable to read the file.");
$temp = fgets($file);
echo $temp;
?></p>
<p> The count after +1 = 
<?php
$wfile = fopen("count.txt","w+") or die("Unable to write the file.");
if (flock($wfile,LOCK_EX)){
	$num = $temp+1;	
	echo $num; 
	fwrite($wfile,$num);
	flock($wfile,LOCK_UN);//critical section unlock
	fclose($wfile);//close the file
	}
else{
	echo "Error locking file!";
	}?></p>
</body>
</html>