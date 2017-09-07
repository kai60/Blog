<?php 
namespace Home\Event;
use Think\Controller;

/**
* 
*/
class DBEvent extends Controller
{
	
	public function hello()
	{
		echo "HELLO";
	}
	public function initDB()
	{



		$dbhost = 'localhost:3306';  // mysql服务器主机地址
        $dbuser = 'root';            // mysql用户名
        $dbpass = 'root';          // mysql用户名密码
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
        if(! $conn )
        {
        	die('连接失败: ' . mysqli_error($conn));
        }
        // 设置编码，防止中文乱码
        mysqli_query($conn , "set names utf8;");






        $hasDB=FALSE;
        $result = $conn->query('show databases;');


        while ($row=$result->fetch_assoc())
        {
           // print_r($row);
            $dbname = $row['Database'];

            if ($dbname=='Kai')
            {
                $hasDB=TRUE;
                break;
            }

        }


        if ($hasDB)
        {
            
        }
        else
        {

        }




        mysqli_close($conn);


    }


}






 ?>