<?php 

echo "<pre>";
$con=mysqli_connect("localhost","root","","demo2");
$parent=6;$level=0;$sum=0;$dis=0;$m="10";$y="2018";
$query="select * from register where referral_code='".$parent."'";
//echo $query;
$result=mysqli_query($con,$query);
$q="select * from discount";
$r1=mysqli_query($con,$q);
$array = Array();
$array1 = Array();
while($r=mysqli_fetch_array($r1))   	   
{
	$array[] = $r['level'];
	$array1[]=$r['discount'];
}
//print_r($array);
//print_r($array1);
while($rows=mysqli_fetch_array($result))
{
	//print_r($rows);
	$query1="select * from register where referral_code='".$rows["rid"]."'";
	//echo $query1;
	$result1=mysqli_query($con,$query1);
	$query2="select *,MONTH(`order_date`) ,YEAR(`order_date`) from order1 where rid='".$rows["rid"]."' and MONTH(`order_date`)='$m' and YEAR(`order_date`)='$y'";
	//echo $query2;
	$result2=mysqli_query($con,$query2);
	$level1=$level+1;
	while($rows2=mysqli_fetch_array($result2))
	{
		//print_r($rows2);
		
		if($array[0]==$level1)
		{
			$dis=($rows2["total"]*$array1[0])/100;
			//echo $dis."<br/>";
		}
		$sum=$sum+$dis."<br/>";	
	}
	while($rows1=mysqli_fetch_array($result1))
	{
		//print_r($rows1);
		$query4="select * from register where referral_code='".$rows1["rid"]."'";
		//echo $query4;
		$result4=mysqli_query($con,$query4);
		$query3="select *,MONTH(`order_date`) ,YEAR(`order_date`) from order1 where rid='".$rows1["rid"]."' and MONTH(`order_date`)='$m' and YEAR(`order_date`)='$y'";
		//echo $query3;
		$result3=mysqli_query($con,$query3);
		$level2=$level1+1;
		while($rows3=mysqli_fetch_array($result3))
		{
			//print_r($rows3);
			
			if($array[1]==$level2)
			{
				$dis=($rows3["total"]*$array1[1])/100;
				//echo $dis."<br/>";
			}
			$sum=$sum+$dis."<br/>";	
		}
		while($rows4=mysqli_fetch_array($result4))
		{
			//print_r($rows4);
			$query5="select *,MONTH(`order_date`) ,YEAR(`order_date`) from order1 where rid='".$rows4["rid"]."' and MONTH(`order_date`)='$m' and YEAR(`order_date`)='$y'";
			//echo $query3;
			$result5=mysqli_query($con,$query5);
			$level3=$level2+1;
			while($rows5=mysqli_fetch_array($result5))
			{
				//print_r($rows3);
				
				if($array[2]==$level3)
				{
					$dis=($rows5["total"]*$array1[2])/100;
					//echo $dis."<br/>";
				}
				$sum=$sum+$dis."<br/>";	
			}
			$query6="select * from register where referral_code='".$rows4["rid"]."'";
			//echo $query4;
			$result6=mysqli_query($con,$query6);
			while($rows6=mysqli_fetch_array($result6))
			{
				//print_r($rows6);
				$query7="select *,MONTH(`order_date`) ,YEAR(`order_date`) from order1 where rid='".$rows6["rid"]."' and MONTH(`order_date`)='$m' and YEAR(`order_date`)='$y'";
				//echo $query3;
				$result7=mysqli_query($con,$query7);
				$level4=$level3+1;
				while($rows7=mysqli_fetch_array($result7))
				{
					//print_r($rows3);
					
					if($array[3]==$level4)
					{
						$dis=($rows7["total"]*$array1[3])/100;
						//echo $dis."<br/>";
					}
					$sum=$sum+$dis."<br/>";	
				}
			}
			//echo $sum;
		}
	}
}
echo "amount:".$sum;


?>