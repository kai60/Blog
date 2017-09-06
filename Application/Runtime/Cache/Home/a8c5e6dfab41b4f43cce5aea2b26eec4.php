<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>
<FORM method="post" action="/tp3/index.php/Home/Form/update">
标题：<INPUT type="text" name="title" value="<?php echo ($vo["title"]); ?>"><br/>
内容：<TEXTAREA name="content" rows="5" cols="45"><?php echo ($vo["content"]); ?></TEXTAREA><br/>
<INPUT type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
<INPUT type="submit" value="提交">
</FORM>
</body>
</html>