<?php
/*
  by Jinda Han @ November 21, 2015
  session_start(); 
  if(!isset($_SESSION['password'])){
      echo 'Need to Login';
      echo "<script> window.location.replace('index.php') </script>";//another way to forward

      exit();
  }
*/
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"> <!-- display Chinese -->
	<style type="text/css">
		textarea{
			font-size: 14px; 
			font-family: "Verdana";
			background-color: lightyellow;
		}
		div{
			background-color: orange;
		}
		.highlight{
		    background-color: white; 
		}

	button {
	  background: #3498db;
	  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
	  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
	  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
	  background-image: -o-linear-gradient(top, #3498db, #2980b9);
	  background-image: linear-gradient(to bottom, #3498db, #2980b9);
	  -webkit-border-radius: 28;
	  -moz-border-radius: 28;
	  border-radius: 28px;
	  font-family: Courier New;
	  color: #ffffff;
	  font-size: 15px;
  padding: 2px 5px 3px 5px;
	  text-decoration: none;
	}

	button:hover {
	  background: #3cb0fd;
	  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
	  text-decoration: none;
	}
	.button {
	  background: #cc7f0a;
	  background-image: -webkit-linear-gradient(top, #cc7f0a, #ebac0c);
	  background-image: -moz-linear-gradient(top, #cc7f0a, #ebac0c);
	  background-image: -ms-linear-gradient(top, #cc7f0a, #ebac0c);
	  background-image: -o-linear-gradient(top, #cc7f0a, #ebac0c);
	  background-image: linear-gradient(to bottom, #cc7f0a, #ebac0c);
	  -webkit-border-radius: 28;
	  -moz-border-radius: 28;
	  border-radius: 28px;
	  font-family: Courier New;
	  color: #ffffff;
	  font-size: 15px;
  padding: 2px 5px 3px 5px;
	  text-decoration: none;
	}

	.button:hover {
	  background: #fc633c;
	  background-image: -webkit-linear-gradient(top, #fc633c, #d9671a);
	  background-image: -moz-linear-gradient(top, #fc633c, #d9671a);
	  background-image: -ms-linear-gradient(top, #fc633c, #d9671a);
	  background-image: -o-linear-gradient(top, #fc633c, #d9671a);
	  background-image: linear-gradient(to bottom, #fc633c, #d9671a);
	  text-decoration: none;
	}
	  .buttonBlue {
	    background: #3498db;
	    background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
	    background-image: -moz-linear-gradient(top, #3498db, #2980b9);
	    background-image: -ms-linear-gradient(top, #3498db, #2980b9);
	    background-image: -o-linear-gradient(top, #3498db, #2980b9);
	    background-image: linear-gradient(to bottom, #3498db, #2980b9);
	    -webkit-border-radius: 28;
	    -moz-border-radius: 28;
	    border-radius: 28px;
	    font-family: Courier New;
	    color: #ffffff;
	    font-size: 15px;
  padding: 2px 5px 3px 5px;
	    text-decoration: none;
	  }

	  .buttonBlue:hover {
	    background: #3cb0fd;
	    background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
	    background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
	    background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
	    background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
	    background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
	    text-decoration: none;
	  }
	</style>
</head>
<body>
<?php
//更改文件名
if(isset($_POST['newFilename'])){
	$filename = $_POST['newFilename'];
}
else if(isset($_GET['newFilename'])){
	$filename = $_GET['newFilename'];
}
else
	$filename = "error_log";
//选择显示的方式是plain text 还是html
if(isset($_POST['textDisplay'])){
	$textDisplay = 	$_POST['textDisplay'];
	//echo "textDisplay post: ".$textDisplay;
}
else if(isset($_GET['textDisplay'])){
	$textDisplay = $_GET['textDisplay'];
	//echo "textDisplay get: ".$textDisplay;
}
else
	$textDisplay = "";
	
$footer = '<hr><p>Update 11/21 Version 0.4.1<br>Design by <i>Kevin J. Han</i>@UIUC on 2015/11/15 <a class="buttonBlue" href="phpMyEditor.php?textDisplay='.$textDisplay.'&action=history&newFilename='.$filename.'">Update History</a> <a class="buttonBlue" href="index.php?action=logout">Logout</a></p>';

//Logo & Title
echo '<h1><i><a href="phpMyEditor.php?newFilename="  style= "text-decoration:none">phpMyEditor</a></i></h1>';

echo '<font color="red">Introduction</font>: <span class="highlight">This is web based server side light file editor, you can instantly modify<br>';
echo '<font color="orange">any format</font> of your file on <font color="orange">any device</font> instead of download and upload it again.</span><br>';
echo '<font color="red">Directory</font>: '.$_SERVER['PHP_SELF'].'<br>';

//echo 'Filename: '.$filename.'&nbsp&nbsp&nbsp&nbspTest';
echo '<form action="phpMyEditor.php" method="post"><font color="red">Filename</font>: <input type="text" Name="newFilename" value="'.$filename.'"></intput>';

//text display
if($textDisplay != "html")
	echo '<input type="radio" name="textDisplay" value="plainText" checked>PlainText 
	  	  <input type="radio" name="textDisplay" value="html">HTML ';
else
	echo '<input type="radio" name="textDisplay" value="plainText">PlainText
  	      <input type="radio" name="textDisplay" value="html" checked>HTML ';
//input button	  
echo '<input class="buttonBlue" name="change" type="submit" value="Change File" /></form>';

if(isset($_GET['action']) == "history"){

	$updateHistory = "<hr>
	By Jinda Han, Project build on 2015/11/15 4:02am
	v0.1 简单的file更新 和 file显示 (OK)
	v0.2 合并file更新和file显示 (OK)
	v0.3 扩展：输入想要打开的文件 (OK)
	v0.3.1 文本背景 (OK)
	v0.3.2 轻微美化 (OK)
	v0.3.3 解决output空格的问题，output加入 nl2br (OK)
	v0.3.4 解决output tab的问题，copy tab再变成8个空格 (OK)
	v0.3.5 解决文件不存在时 exit(); (OK)
	v0.3.6 增加update history (OK)
	v0.3.7 精简footer，放到最顶上 (OK)
	v0.4.0 php how to display txt instead of html（可以选择）(OK) 
	v0.4.1 adding future functions
	v0.5.0 添加多重信息并分词然后归类显示(?啥意思) 
	v0.6.0 list all the files under folder
	v0.7.0 add or delete files
	v0.8.0 把文件777，然后file close再改回来read only
	v0.9.0 根据不同的语言，例如php，html，java，Python等关键字显示不同的颜色
	v1.0.0 美化
	//衍生版
	v1.1.0 增加消息反馈，放到单独的文本里(单独小项目，文本adding & displaying)
	v1.2.0 增加链接(link) 增加，删除，修改
	v1.3.0 增加计划事件，增加，删除，修改，用逗号隔开每个事件 
	";
	echo '<div>'.nl2br(str_replace('	','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$updateHistory)).'</div>';
}

//完成脚本——如何用PHP在线编辑txt文本(感觉这个反了，应该是展示然后编辑)
if(isset($_POST['Submit'])){
	if($_POST['Submit']){
		$open = fopen($filename,"w+");
		$text = $_POST['update'];
		fwrite($open, $text);
		fclose($open);
		echo '<font color="blue">File updated!</font> '; 

		//echo '<a href="phpMyEditor.php?edit=yes&newFilename='.$filename.'">[Edit]</a>';
		echo '<button onclick="window.location.href=\'phpMyEditor.php?textDisplay='.$textDisplay.'&edit=yes&newFilename='.$filename.'\'">Edit</button>';
		
		$file = file($filename);
		echo '<hr><p>';
		foreach($file as $text) {
			//$new = str_replace('	','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$text);
			if($textDisplay != "html")
				$text = htmlspecialchars($text);
			echo nl2br(str_replace('	','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$text));
		}
		echo '</p>';
	}
}

else if(isset($_GET['edit'])=="yes"){
	$file = file("$filename");
	echo '<form action="phpMyEditor.php?textDisplay='.$textDisplay.'&newFilename='.$filename.'" method="post">';
	echo '<textarea Name="update" cols="80" rows="10">';
	foreach($file as $text) {
		echo $text;
	} 
	echo '</textarea><br>';
	echo '<input class="buttonBlue" name="Submit" type="submit" value="Update" /></form>';
}

else{
	if($filename=="") //空文件直接退出
		exit($footer);

	if(!file_exists($filename)) //检测文件是否存在
		exit('<hr><font color="blue">File not exist!</font>'.$footer);

	echo '<button onclick="window.location.href=\'phpMyEditor.php?textDisplay='.$textDisplay.'&edit=yes&newFilename='.$filename.'\'">Edit</button>';
	//echo '<p align="left"><a href="phpMyEditor.php?edit=yes&newFilename='.$filename.'">[Edit]</a></p>';
	$file = file("$filename");
	echo '<hr><p>';
	foreach($file as $text) {
		//$new = str_replace('	','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$text);
		if($textDisplay != "html")
			$text = htmlspecialchars($text);
		echo nl2br(str_replace('	','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$text));
	}
	echo '</p>';
		
}
echo $footer;
?>
</body>
</html>