﻿

<html xmlns="cc">

<head>
<link rel="stylesheet" type="text/css" href="css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<div id="container">
	<div id="header">
		<h1>
			Cashier Login
		</h1>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="cashier_login.php">销售模式</a></li>
			<li><a href="cashier_stock.php">进货模式</a></li>
			<li><a href="cashier_query.php">查询模式</a></li>
			<li><a href="cashier_return.php">顾客退货</a></li>
		</ul>
	</div>
	<div id="content-container">
		<div id="content">
				
			<p>
<?php
$host="localhost"; // Host name 
$username="rahman"; // Mysql username 
$password="653201"; // Mysql password 
$db_name="s_market"; // Database name 
$tbl_name="users"; // Table name

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
mysql_query("set names utf8");
$sql = "SELECT * FROM   `temp` ";
$result = mysql_query($sql);
if($result=== FALSE) {echo "query faild";}


while($row = mysql_fetch_assoc($result))
{
$barcode=$row['barcode'];
$sql="DELETE FROM `s_market`.`temp` WHERE `temp`.`barcode` = '$barcode';";
$re=mysql_query($sql);
if($re== FALSE) {echo "query faild";}

$sql = "UPDATE `goods_in_stock` SET `amount`=`amount` - 1 WHERE `goods_in_stock`.`barcode` = '$barcode';";
$re=mysql_query($sql);
if($re== FALSE) {echo "query faild1";}

$sql=" SELECT  * FROM `good_list`, `goods_in_stock` WHERE `goods_in_stock`.`barcode`= '$barcode'";
$retu = mysql_query($sql);
if($retu == FALSE) {echo "query faild2";}

$row = mysql_fetch_array($retu);

$name = $row['name'];
$barcode = $row['barcode'];
$category = $row['category'];
$additional = $row['additional'];
$amount = $row['amount'];
$inprice = $row['in_price'];
$outprice = $row['out_price'];
$discount = $row['discount'];
$mark = $row['mark'];


$sql="INSERT INTO `record`(`barcode`, `name`, `category`, `amount`, `in_price`, `out_price`, `discount`, `additional`, `mark`)
VALUES ($barcode, '$name', '$category', $amount, $inprice, $outprice, $discount, '$additional', $mark)";

$ret = mysql_query($sql);
if( $ret == FALSE ) echo 'query faild3';


}
echo '<b>结帐成功！谢谢光临^_^</b>';
?>
			</p>

		</div>
		<div id="aside">
		<p><?php
$count=0;
$host="localhost"; // Host name 
$username="rahman"; // Mysql username 
$password="653201"; // Mysql password 
$db_name="s_market"; // Database name 
$tbl_name="users"; // Table name

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
mysql_query("set names utf8");



$sql="SELECT * FROM `rate` ORDER BY count DESC ";
$resul1=mysql_query($sql);
if($resul1 == FALSE) echo 'query faild';
echo '<center><h2>销量排行榜</h2></center>';
echo '<center><table border="0" cellpadding="5">
<tr>
<th>名称</th>
<th>销量</th>
</tr>';

while($row=mysql_fetch_assoc($resul1))
{
$barcode=$row['barcode'];
$count=$row['count'];
$sql = "SELECT * FROM `good_list` WHERE `good_list`.`barcode` = '$barcode'";
$resul2=mysql_query($sql);
if($resul2 == FALSE) echo 'query faild';

$row1 = mysql_fetch_assoc($resul2);
$name=$row1['name'];
if($count==0)continue;
echo '
<tr>
<td><center>' . $name . '</center></td>
<td><center>' . $count . '</center></td>
</tr>
';
}
echo '</table></center>';
echo '<form name="update"  action="rate.php" >
<center><input type="submit" value="更新排行榜" name="update"></center>
</form>
';

?></p>

			<p>
<body onLoad="goforit()">
 
 
<script>
 
/*
Live Date Script- 
?? Dynamic Drive (www.dynamicdrive.com)
For full source code, installation instructions, 100's more DHTML scripts, and Terms Of Use,
visit http://www.dynamicdrive.com
*/
 
 
var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
 
function getthedate(){
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var hours=mydate.getHours()
var minutes=mydate.getMinutes()
var seconds=mydate.getSeconds()
var dn="AM"
if (hours>=12)
dn="PM"
if (hours>12){
hours=hours-12
}
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
//change font size here
var cdate="<small><font color='000000' face='Arial'><b>"+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+" "+hours+":"+minutes+":"+seconds+" "+dn
+"</b></font></small>"
if (document.all)
document.all.clock.innerHTML=cdate
else if (document.getElementById)
document.getElementById("clock").innerHTML=cdate
else
document.write(cdate)
}
if (!document.all&&!document.getElementById)
getthedate()
function goforit(){
if (document.all||document.getElementById)
setInterval("getthedate()",1000)
}
 
</script>
<span id="clock"></span>
			</p>
		</div>
		<div id="footer">
			Rahman.kdd@zju
		</div>
	</div>
</div>

</body>

</html>

