<?php 
	Class connection
	{
		var $con,$sql,$res;
		function connect()
		{
			$this->con=mysqli_connect('localhost','root','','demo2');
		}
		function insert($str)
		{
			$this->sql=$str;
			mysqli_query($this->con,$this->sql);	
		}
		function select($str)
		{
			$this->sql=$str;
			$this->res=mysqli_query($this->con,$this->sql);
		}

	}

?>