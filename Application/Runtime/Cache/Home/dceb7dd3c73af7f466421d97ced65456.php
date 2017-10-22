<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>写文章</title>
  <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
  <script src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script> 
  <link href="/Public/css/summernote.css" rel="stylesheet">
  <script src="/Public/js/summernote.js"></script>
</head>
<body>
<form method="post" action="/index.php/Home/Main/postblog">


<div>
  <input type="text" name="title" placeholder="标题" class="title">
</div>
  <div id="summernote"><p>Hello ,<b>从这里开始</b></p></div>
<div>
  <input type="submit" value="发布" class="submit">
</div>
</form>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
</body>
</html>