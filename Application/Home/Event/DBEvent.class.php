<?php 
namespace Home\Event;
use Think\Controller;

/**
* 
*/

class DBEvent extends Controller
{
    var $dbHost = '';
    var $dbUser = '';
    var $dbPassword = '';
    var $dbSchema = '';

    function __construct($host,$user,$password,$schema='')
    {

        parent::__construct();
        $this->dbHost = $host;
        $this->dbUser = $user;
        $this->dbPassword = $password;
        $this->dbSchema = $schema;

        $this->checkDB($schema);

    }






    public function checkDB($dbname)
    {







        $conn = mysqli_connect($this->dbHost,$this->dbUser ,$this-> dbPassword);
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

            $db=$row['Database'];


            if ($db==$dbname)
            {
                $hasDB=TRUE;
                break;
            }

        }


        if ($hasDB)
        {
            $this->dbSchema=$dbname;



        }
        else
        {
            $conn = mysqli_connect($this->dbHost,$this->dbUser,$this->dbPassword);
            if(! $conn )
            {
                die('连接错误: ' . mysqli_error($conn));
            }
            echo '连接成功<br />';
            $sql = "CREATE DATABASE $this->dbSchema ";
            $retval = mysqli_query($conn,$sql );
            if(! $retval )
            {
                die('创建数据库失败: ' . mysqli_error($conn));


                
            }
            else
            {
                echo "数据库 $this->dbSchema 创建成功\n";



                if ($this->createFromFile('/Applications/MAMP/htdocs/Public/tabel.sql',";"))
                {
                    echo '创建表成功';
                }
                else
                {
                    echo '建表失败';
                }

            }

            mysqli_close($conn);


        }




        mysqli_close($conn);


    }


    function createFromFile($sqlPath,$delimiter = '(;/n)|((;/r/n))|(;/r)',$prefix = '',$commenter = array('#','--'))
    {
        //判断文件是否存在
        if(!file_exists($sqlPath))
            return false;

        $handle = fopen($sqlPath,'rb');

        $sqlStr = fread($handle,filesize($sqlPath));

        //通过sql语法的语句分割符进行分割
        $segment = explode(";",trim($sqlStr));

        //var_dump($segment);

        //去掉注释和多余的空行
        foreach($segment as & $statement)
        {
            $sentence = explode("\n",$statement);

            $newStatement = array();

            foreach($sentence as $subSentence)
            {
                if('' != trim($subSentence))
                {
                    //判断是会否是注释
                    $isComment = false;
                    foreach($commenter as $comer)
                    {
                        if(preg_match("^(".$comer.")",trim($subSentence)))
                        {
                            $isComment = true;
                            break;
                        }
                    }
                    //如果不是注释，则认为是sql语句
                    if(!$isComment)
                        $newStatement[] = $subSentence;//添加到数组
                }
            }

            $statement = $newStatement;
        }

        foreach($segment as & $statement)
        {
            $newStmt = '';
            foreach($statement as $sentence)
            {
                $newStmt = $newStmt.trim($sentence)."\n";
            }

            $statement = $newStmt;
        }

        //用于测试------------------------       
        //var_dump($segment);
        //writeArrayToFile('data.txt',$segment);





        //-------------------------------


        //print_r($segment);

        self::saveByQuery($segment);

        return true;
    }

    private function saveByQuery($sqlArray)
    {
        $conn = mysqli_connect($this->dbHost,$this->dbUser,$this->dbPassword);

        mysqli_select_db( $conn,$this->dbSchema);

        foreach($sqlArray as $sql)
        {



           $conn-> query($sql);
           echo mysqli_error($conn);


        }       
        $conn->close();
    }

    private function findTableName($sqlFlagTree,$tokens,$tokensKey=0,& $tableName = array())
    {



        return false;
    }


    function writeArrayToFile($fileName,$dataArray,$delimiter="\r\n")
    {
        $handle=fopen($fileName, "wb");

        $text = '';

        foreach($dataArray as $data)
        {
            $text = $text.$data.$delimiter;
        }
        fwrite($handle,$text);
    }

    function hello()
    {
        echo 'say hello';
    }
}





 ?>