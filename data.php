<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		
	</style>
</head>
</head>
<body>
    <?php
    	include_once('connection.php');
        $obj=new connection();
        $obj->connect();
		//$obj->sql="SELECT * FROM register where refrreal_code=0";
		//$obj->select($obj->sql);
		//$no=mysqli_num_rows($obj->res);
		//echo "<pre>";
		
		function get_menu_tree($parent_id) 
		{
			include_once('connection.php');
        	$obj=new connection();
        	$obj->connect();
			$menu='';
			$obj->sql="SELECT * FROM register where referral_code='".$parent_id."'";
			$obj->select($obj->sql);
			//$no1=mysqli_num_rows($obj->res);
			while($rows1=mysqli_fetch_array($obj->res))
			{
				//$rows1=mysqli_fetch_array($obj->res);
				$menu.="<li>". $rows1['name'];
				$menu.="<ul>".get_menu_tree($rows1['rid'])."</ul>";
				$menu.="</li>";
			}
			return $menu;
		}

		echo "<ul>";
		echo get_menu_tree(0);
		echo "</ul>";
		/*for ($i=0; $i<=$no ; $i++) { 
			$rows=mysqli_fetch_array($obj->res);
				echo $rows['name']."<br/>";
			$obj->sql="SELECT c1.rid, c1.title FROM  register c1 LEFT JOIN category c2 ON c2.parent_id = c1.id WHERE c2.id refrreal_code ='".$rows['rid']."'";
			$obj->select($obj->sql);
			$no1=mysqli_num_rows($obj->res);
			while($rows1=mysqli_fetch_array($obj->res))
			{
				//$rows1=mysqli_fetch_array($obj->res);
				echo $rows1['name']."<br/>";
			}
		}*/

		/*while($rows=mysqli_fetch_array($obj->res))
		{
			echo $rows["name"] ."<br/>";
			
			if($rows > 0){
				//echo "1";
				$obj->sql="select * from register where refrreal_code='".$rows['rid']."'";
				$obj->select($obj->sql);

				while($rows1=mysqli_fetch_array($obj->res))
				{
					echo $rows1['name'];
				}

			} else {
				echo "0";
			}
			

			/*if($rows>0)
			{
				$obj->sql="select * from register where refrreal_code='".$rows['rid']."'";
				$obj->select($obj->sql);
				
				while($rows1=mysqli_fetch_array($obj->res))
				{
					//print_r($rows1);
					echo "&nbsp;--".$rows1["name"]."<br/>";
					$obj->sql="select * from register where refrreal_code='".$rows1['rid']."'";
					$obj->select($obj->sql);
					while($rows2=mysqli_fetch_array($obj->res))
					{	
						echo  "&nbsp;&nbsp;---".$rows2["name"]."<br/>";
					}
				}
			}*/
		/*}*/


		//echo $no;
		/*if($no>0)
		{

			foreach ($rows as $row)
			{
				echo $row["name"];
			}
		}*/
		?>
    <?php 
       
            /*$obj1=new connection();
	        $obj1->connect();
	        $obj1->sql="SELECT c1.rid,c2.refrreal_code AS parent_name FROM register AS c1 LEFT JOIN register AS c2 ON c1.refrreal_code=c2.rid";
	        $obj1->select($obj1->sql);
	        while($row=mysqli_fetch_array($obj1->res))
	        {
	        		        	
	       	if($row['refrreal_code']==0)
	        	{
	        		echo $row["name"];

	        	}
	        }*/
	    
	   	

   /* include_once('connection.php');
        $obj=new connection();
        $obj->connect();
		
  echo $obj->sql = "SELECT * FROM register WHERE `refrreal_code` = '".$parent."' ORDER BY rid ASC";
  $obj->select($obj->sql);
  //$query = mysql_query($sql);
  if (mysqli_num_rows($obj->res) > 0) {
     $user_tree_array[] = "<ul>";
    while ($row = mysqli_fetch_array($obj->res)) {
	  $user_tree_array[] = "<li>". $row->name."</li>";
      $user_tree_array = fetchCategoryTreeList($row->cid, $user_tree_array);
    }
	$user_tree_array[] = "</ul>";
  }
  return $user_tree_array;
}

echo "<ul>";
*/
  
?>   

</body>
</html>