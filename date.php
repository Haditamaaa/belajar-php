<?php
echo date("l, d-M-Y"); 
echo "<br>";
echo time();
echo "<br>";
echo date("d M Y", time()-60*60*24*100);
echo "<br>";
echo date("l", mktime(0,0,0,2,12,2001));
echo "<br>";
echo date("l", strtotime("12 feb 2001"));