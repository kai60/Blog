<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>id</title>
</head>
<body>
<table border="3">

<tr>
<th>id</th>
 <th>标题</th>
 <th>内容</th>	
</tr>
 
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
		<td><?php echo ($data["id"]); ?></td>
		<td><?php echo ($data["title"]); ?></td>
		<td><?php echo ($data["content"]); ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>