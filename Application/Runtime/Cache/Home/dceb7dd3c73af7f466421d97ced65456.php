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
  <input type="text" name="title" placeholder="标题" class="title" id="title">
</div>
  <div id="summernote"><p>Hello ,<b>从这里开始</b></p></div>
<div>

  <input type="button" value="发布" class="submit" id="ajaxBtn">
</div>
</form>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#ajaxBtn').click(function ()
        {
            blog=new Object();
            blog.title=$('#title').text();
            blog.content=$('.note-editing-area').html();
            blog.user_id=1;
            blog.create_time=new Date();
            blog.author='author';


            $.ajax({
                type: "POST",
                data :$.param(blog),
                url : '/index.php/Home/Main/postblog',
                cache: false,
                processData: false,
                contentType: 'application/x-www-form-urlencoded',
                dataType:'json',
                success:function(result){
                      
                      if (result.status) 
                      {
                        alert(result.message);
                        location.href=result.url;

                      }
                 },
                error:function(xhr,status,error){
                     
                   }
                   });

        })




    });
  </script>
</body>
</html>