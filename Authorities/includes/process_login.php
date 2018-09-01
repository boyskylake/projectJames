<?php session_start();

require('config.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['usernm']))
		{
			$msg[]="No such User";
		}
		
		if(empty($_POST['pwd']))
		{
			$msg[]="Password Incorrect........";
		}
		
	}
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			$unm=$_POST['usernm'];
			$pwd=$_POST['pwd'];

			if ($_POST['ddlSelect'] == 'member') {
				$q="select * from member where member_user = '".mysqli_real_escape_string($conn, $unm)."' ";
				$res=mysqli_query($conn,$q) or die("wrong query");
				$row=mysqli_fetch_assoc($res);
				if(!empty($row))
				{
					if($pwd==$row['member_Password'])
					{
						$_SESSION=array();
						$_SESSION['unm']=$row['member_user'];
						$_SESSION['uid']=$row['member_id'];
						$_SESSION['name'] = $row['member_Name'];
						$_SESSION['status']='member';
						header("location:../Library.php");
					}
					else{
						echo 'Incorrect Password....';
					}
				}
				else
				{
					echo 'Invalid User';
				}

			}
			elseif ($_POST['ddlSelect'] == 'staff') {
				$q="select * from authorities where authorities_user = '".mysqli_real_escape_string($conn, $unm)."' ";
				$res=mysqli_query($conn,$q) or die("wrong query");
				$row=mysqli_fetch_assoc($res);
				if(!empty($row))
				{
					if($pwd==$row['authorities_password'])
					{
						$_SESSION=array();
						$_SESSION['unm']=$row['authorities_user'];
						$_SESSION['uid']=$row['authorities_id'];
						$_SESSION['name'] = $row['authorities_name'];
						$_SESSION['status']='staff';
						header("location:../Authorities/Authorities.php");
					}
					else{
						echo 'Incorrect Password....';
					}
				}
				else
				{
					echo 'Invalid User';
				}
			}
			else{
				$q="select * from admin where a_unm = '".mysqli_real_escape_string($conn, $unm)."' ";
				$res=mysqli_query($conn,$q) or die("wrong query");
				$row=mysqli_fetch_assoc($res);
				if(!empty($row))
				{
					if($pwd==$row['a_pwd'])
					{
						$_SESSION=array();
						$_SESSION['unm']=$row['a_unm'];
						// $_SESSION['uid']=$row['a_pwd'];
						$_SESSION['name'] = $row['a_name'];
						$_SESSION['status']='admin';
						header("location:../Admin/addmin.php");
					}
					else{
						echo 'Incorrect Password....';
					}
				}
				else
				{
					echo 'Invalid User';
				}
			}
		}
			
?>