<? include("lock.php");
if(isset($_GET['id'])) {$id=$_GET['id'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������� �������������� �������</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top">

<?

if(!isset($id))
{

echo "<p class='chose_link'>�������� ������ ��� ��������������</p>";

$result=mysql_query("SELECT id, title FROM categories");
$myrow=mysql_fetch_array($result);

do
{
printf("<p class='edit'><a href='edit_category.php?id=%s' class='edit_link'>%s</a></p>", $myrow['id'], $myrow['title']);
}

while($myrow=mysql_fetch_array($result));
}

else
{
$result=mysql_query("SELECT * FROM categories WHERE id=$id");

if($result)
{
$myrow=mysql_fetch_array($result);

echo "<p class='edit_post'>�������������� ���������</p>";
	
print <<<HERE

<form name='form1' class='form' method='post' action='update_category.php'>
	<p>
		<label>������� �������� �������<br>
			<input type="text" name="title" value="$myrow[title]"><br>
	<br></label>
		</p>
	<p>
		<label>������� ������� �������� �������<br>
			<input type="text" name="meta_d" value="$myrow[meta_d]"><br>
	<br></lable>
		</p>
	<p>
		<label>������� �������� ����� � �������<br>
			<input type="text" name="meta_k" value="$myrow[meta_k]"><br>
	<br></label>
		</p>
	<p>
		<label>������� ������ ����� ���������� � ������<br />
			<textarea name="text" cols="40" rows="20">$myrow[text]</textarea><br />
	<br /></label>
		</p>
			<input type="hidden" name="id" value="$myrow[id]">
	<p>
		<label>
			<input type="submit" name="submit" value="��������� ���������" class='submit'>
		</lable>
	</p>

</form>

HERE;
}

else
{

echo "<p class='chose_link'>�������� ������ ��� ��������������</p>";

$result=mysql_query("SELECT id, title FROM categories");
$myrow=mysql_fetch_array($result);

do
{
printf("<p class='edit'><a href='edit_category.php?id=%s' class='edit_link'>%s</a></p>", $myrow['id'], $myrow['title']);
}

while($myrow=mysql_fetch_array($result));
}

}

?>

</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
