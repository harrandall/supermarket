﻿<html xmlns="cc"><head><link rel="stylesheet" type="text/css" href="css.css" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body><div id="container">	<div id="header">		<h1>			Manager Login		</h1>	</div>	<div id="navigation">		<ul>			<li><a href="manager_login.php">注册新售货员帐号</a></li>		</ul>	</div>	<div id="content-container">		<div id="content">			<h2>				<center>注册新售货员帐号：</center>			</h2>			<p>			<form name="regis" method="POST" action="manager_register.php">			输入帐号名：&nbsp&nbsp<input type="text" name="account"><br />			输入密码：&nbsp&nbsp&nbsp&nbsp<input type="password" name="pw"><br />			再次输入密码：<input type="password" name="pwa"><br />			<input type="submit" name="s" value="注册">			</form>			</p>			<br /><br /><br /><br /><br /><br /><br /><br /><br />			<form name="return" action="index.php">			<input type="submit" name="s" value="返回到验证窗口">			</form>		</div>		<div id="aside">		<p><?php$count=0;$host="localhost"; // Host name $username="rahman"; // Mysql username $password="653201"; // Mysql password $db_name="s_market"; // Database name $tbl_name="users"; // Table namemysql_connect("$host", "$username", "$password")or die("cannot connect"); mysql_select_db("$db_name")or die("cannot select DB");mysql_query("set names utf8");$sql="SELECT * FROM `rate` ORDER BY count DESC ";$resul1=mysql_query($sql);if($resul1 == FALSE) echo 'query faild';echo '<center><h2>销量排行榜</h2></center>';echo '<center><table border="0" cellpadding="5"><tr><th>名称</th><th>销量</th></tr>';while($row=mysql_fetch_assoc($resul1)){$barcode=$row['barcode'];$count=$row['count'];$sql = "SELECT * FROM `good_list` WHERE `good_list`.`barcode` = '$barcode'";$resul2=mysql_query($sql);if($resul2 == FALSE) echo 'query faild';$row1 = mysql_fetch_assoc($resul2);$name=$row1['name'];if($count==0)continue;echo '<tr><td><center>' . $name . '</center></td><td><center>' . $count . '</center></td></tr>';}echo '</table></center>';echo '<form name="update"  action="manager_login.php" ><center><input type="submit" value="更新排行榜" name="update"></center></form>';?></p>						<p><body onLoad="goforit()">  <script> /*Live Date Script- ?? Dynamic Drive (www.dynamicdrive.com)For full source code, installation instructions, 100's more DHTML scripts, and Terms Of Use,visit http://www.dynamicdrive.com*/  var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December") function getthedate(){var mydate=new Date()var year=mydate.getYear()if (year < 1000)year+=1900var day=mydate.getDay()var month=mydate.getMonth()var daym=mydate.getDate()if (daym<10)daym="0"+daymvar hours=mydate.getHours()var minutes=mydate.getMinutes()var seconds=mydate.getSeconds()var dn="AM"if (hours>=12)dn="PM"if (hours>12){hours=hours-12}if (hours==0)hours=12if (minutes<=9)minutes="0"+minutesif (seconds<=9)seconds="0"+seconds//change font size herevar cdate="<small><font color='000000' face='Arial'><b>"+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+" "+hours+":"+minutes+":"+seconds+" "+dn+"</b></font></small>"if (document.all)document.all.clock.innerHTML=cdateelse if (document.getElementById)document.getElementById("clock").innerHTML=cdateelsedocument.write(cdate)}if (!document.all&&!document.getElementById)getthedate()function goforit(){if (document.all||document.getElementById)setInterval("getthedate()",1000)} </script><span id="clock"></span>			</p>		</div>		<div id="footer">			Rahman.kdd@zju		</div>	</div></div></body></html>