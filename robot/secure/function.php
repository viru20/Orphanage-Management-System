<?php
// Common Function
//echo "loan_calculator_db";
//exit;
function set_filename($filename)
{
   $newfilename = preg_replace('/[^A-Za-z0-9\- -]/', '', $filename); // Removes special chars.
   $newfilename = str_replace(' ', '-', $newfilename); // Replaces all spaces with hyphens.
   $newfilename = str_replace('---', '-', $newfilename);
   $newfilename = str_replace('--', '-', $newfilename);
   $newfilename = strtolower($newfilename);
   
   return $newfilename;
}
function get_file_extension($filename)
{
	return pathinfo($filename, PATHINFO_EXTENSION);
}

function remove_file_extension($filename,$extension)
{
	return str_replace($extension,"",$filename);
}
function uploadimage($generatedfilename,$filename,$filename_tmpname,$filename_type,$uploadpath,$uploadwidth,$uploadheight,$imageprefix)
{
				$fileextension=get_file_extension($filename);
				//$fileextension=strtolower($fileextension);
				$generatedfilename=$generatedfilename.".".$fileextension;
				
				if (($filename_type == "image/gif")
				|| ($filename_type == "image/png")
				|| ($filename_type == "image/jpeg")
				|| ($filename_type == "image/pjpeg"))				
				{
						$saveuploadedimage=time()."-".$generatedfilename;														
						copy($filename_tmpname,$uploadpath.$saveuploadedimage);					
				}
				
				if($filename_type=='image/jpg' ||$filename_type=='image/jpeg')
				{
					$image = imagecreatefromjpeg($uploadpath.$saveuploadedimage);
				}
				else if($filename_type=='image/gif')
				{
					$image = imagecreatefromgif($uploadpath.$saveuploadedimage);
				}
				else if($filename_type=='image/png')
				{
					$image = imagecreatefrompng($uploadpath.$saveuploadedimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = $uploadwidth;
				$theight = $uploadheight;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($filename_type=='image/jpg' ||$filename_type=='image/jpeg')
				{
					imagejpeg($im,$uploadpath.$imageprefix.$saveuploadedimage);
				}
				else if($filename_type=='image/gif')
				{
					imagegif($im,$uploadpath.$imageprefix.$saveuploadedimage);
				}
				else if($filename_type=='image/png')
				{
					imagepng($im,$uploadpath.$imageprefix.$saveuploadedimage);
				}	
					
				return $saveuploadedimage;
}

function uploadimage_multiple_one($generatedfilename,$filename,$filename_tmpname,$filename_type,$uploadpath,$imagesizearray,$displayimagepath)
{
	  
	$c=0;
		
	$curdate=date("Ymd");			
	
	// Make Main Directory
	
	$newdir=$uploadpath.$curdate;
	
	$displaypath=$displayimagepath.$curdate."/";

	if(is_dir($newdir)==false)
	{
		mkdir($newdir,0777,true);
	}
	
		$fileextension=get_file_extension($filename);
		$generatedfilename=$generatedfilename.".".$fileextension;			
		
		// Main Image Upload
		
		if (($filename_type == "image/gif")
		|| ($filename_type == "image/png")
		|| ($filename_type == "image/jpeg")
		|| ($filename_type == "image/pjpeg"))				
		{													
				copy($filename_tmpname,$newdir."/".$generatedfilename);					
		}				
		
		if($filename_type=='image/jpg' ||$filename_type=='image/jpeg')
		{
				$image = imagecreatefromjpeg($newdir."/".$generatedfilename);
		}				
		else if($filename_type=='image/gif')
		{
				$image = imagecreatefromgif($newdir."/".$generatedfilename);
		}
		else if($filename_type=='image/png')
		{
				$image = imagecreatefrompng($newdir."/".$generatedfilename);
		}				
			
		$width = imagesx($image);
		$height = imagesy($image);
	
	
	foreach($imagesizearray as $imagesize) 
	{
		
		$size[$c]=$imagesize;
		
		
		$heightwidth=explode("x",$size[$c]);
		
		  
		// Make Image Size Directory
		
		$newsizedir=$uploadpath.$curdate."/".$size[$c];				
		
		if(is_dir($newsizedir)==false)
		{
			mkdir($newsizedir,0755,true);
		}

		$twidth = $heightwidth[0];
		$theight = $heightwidth[1];
		
		$im = imagecreatetruecolor($twidth,$theight);
		imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));

		if($filename_type=='image/jpg' ||$filename_type=='image/jpeg')
		{
			imagejpeg($im,$newsizedir."/".$generatedfilename);
		}
		else if($filename_type=='image/gif')
		{
			imagegif($im,$newsizedir."/".$generatedfilename);
		}
		else if($filename_type=='image/png')
		{
			imagepng($im,$newsizedir."/".$generatedfilename);
		}					
		$c++;
	}
	return $curdate."_".$generatedfilename;
		
	//return $displaypath."_".$generatedfilename;
	
}

function display_status_icon($value)
{
	if($value==0)
	{
		return "no.png";
	}
	else if($value=1)
	{
		return "yes.png";
	}
}

function tree($uid)
{
  $con = mysqli_connect("localhost", "root", "", "orphanage_db");
  //echo "select * from ".TABLE_PREFIX."user_master where user_status=1 and user_is_deleted=0 and user_ref_number_from='".$uid."'";
  $qry_main_user=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_status=1 and user_is_deleted=0 and user_ref_number_from='".$uid."'");

  $i=1;
  while($result_main_user=mysqli_fetch_array($qry_main_user))
  {
    if($result_main_user['user_level']==1)
    {
      $style_css="margin-left:1px;height:10px;";
    }
    else if($result_main_user['user_level']==2)
    {
      $style_css="margin-left:15px;height:10px;";
    }
    else if($result_main_user['user_level']==3)
    {
      $style_css="margin-left:30px;height:10px;";
    }
    else if($result_main_user['user_level']==4)
    {
      $style_css="margin-left:45px;height:10px;";
    }
    else if($result_main_user['user_level']==5)
    {
      $style_css="margin-left:60px;height:10px;";
    }
    else if($result_main_user['user_level']==6)
    {
      $style_css="margin-left:75px;height:10px;";
    }
    else if($result_main_user['user_level']==7)
    {
      $style_css="margin-left:90px;height:10px;";
    }
    else if($result_main_user['user_level']==8)
    {
      $style_css="margin-left:115px;height:10px;";
    }
    else if($result_main_user['user_level']==9)
    {
      $style_css="margin-left:130px;height:10px;";
    }
    else if($result_main_user['user_level']==10)
    {
      $style_css="margin-left:145px;height:10px;";
    }
    else if($result_main_user['user_level']==11)
    {
      $style_css="margin-left:160px;height:10px;";
    }
    else if($result_main_user['user_level']==12)
    {
      $style_css="margin-left:175px;height:10px;";
    }
    else if($result_main_user['user_level']==13)
    {
      $style_css="margin-left:190px;height:10px;";
    }
    else if($result_main_user['user_level']==14)
    {
      $style_css="margin-left:205px;height:10px;";
    }
    else if($result_main_user['user_level']==15)
    {
      $style_css="margin-left:220px;height:10px;";
    }
    else if($result_main_user['user_level']==16)
    {
      $style_css="margin-left:235px;height:10px;";
    }
    else if($result_main_user['user_level']==17)
    {
      $style_css="margin-left:250px;height:10px;";
    }
    else if($result_main_user['user_level']==18)
    {
      $style_css="margin-left:265px;height:10px;";
    }
    else if($result_main_user['user_level']==19)
    {
      $style_css="margin-left:280px;height:10px;";
    }
    else if($result_main_user['user_level']==20)
    {
      $style_css="margin-left:295px;height:10px;";
    }
    else 
    {
      $style_css="margin-left:10px;height:10px;";
    }

    echo "<div style=".$style_css.">".$result_main_user['user_name']."</div><br>";
    //echo "hii".$result_main_user['user_id'];
    tree($result_main_user['user_id']);
    $i++;
  }
}

function active_count($table,$fieldcheck,$deletedfield)
{
	$con = mysqli_connect("localhost", "root", "", "orphanage_db");	
	$recordsetactivecount = mysqli_query($con,"SELECT ".$fieldcheck." from ".$table." where ".$fieldcheck."=1 and ".$deletedfield."=0");
	
	return mysqli_num_rows($recordsetactivecount);
}

function inactive_count($table,$fieldcheck,$deletedfield)
{
	$con = mysqli_connect("localhost", "root", "", "orphanage_db");
	$recordsetinactivecount = mysqli_query($con,"SELECT ".$fieldcheck." from ".$table." where ".$fieldcheck."=0 and ".$deletedfield."=0");
	return mysqli_num_rows($recordsetinactivecount);
}


function non_deleted_count($table,$fieldcheck)
{
	$con = mysqli_connect("localhost", "root", "", "orphanage_db");
	$recordsetdeletecount = mysqli_query($con,"SELECT ".$fieldcheck." from ".$table." where ".$fieldcheck."=0");
	return mysqli_num_rows($recordsetdeletecount);
}
function deleted_count($table,$fieldcheck)
{
	$con = mysqli_connect("localhost", "root", "", "orphanage_db");
	$recordsetdeletecount = mysqli_query($con,"SELECT ".$fieldcheck." from ".$table." where ".$fieldcheck."=1");
	return mysqli_num_rows($recordsetdeletecount);
}

function count_total_records($table,$idfield)
{
	$con = mysqli_connect("localhost", "root", "", "orphanage_db");
	$recordsettotalrecords = mysqli_query($con,"SELECT ".$idfield." from ".$table);
	return mysqli_num_rows($recordsettotalrecords);
}

function basepath($source,$filetype)
{
  $feedBasePath = "../".$filetype."/";
  if (!is_dir($feedBasePath)){
      mkdir($feedBasePath);         
  }
  return $feedBasePath;

}


?>