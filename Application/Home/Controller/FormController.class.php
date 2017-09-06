<?php 
namespace Home\Controller;
use Think\Controller;

/**
* 
*/
class FormController extends Controller
{
	
	
	function insert()
	{
		$Form=D('Form');
		if ($Form->create()) 
		{
			$result=$Form->add();
			if ($result) 
			{
				$this->success('数据添加成功');
				# code...
			}
			else {
				$this->success('数据添加失败');
			}

			# code...
		}
		else
		{
			$this->error($Form->getError());
		}
	}
	function read($id=0)
	{
		$Form=M('Form');
		$data=$Form->find($id);
		if ($data)
		{
			$this->assign('data',$data);

		}
		else
		{
			$this->error('数据错误');
		}
		$this->display();
	}
	function edit($id=0)
	{
		$Form=M('Form');
		
		$this->assign('vo',$Form->find($id));
		$this->display();
	}

	function update()
	{
		$Form=D('Form');
		if ($Form->create()) 
		{
			$result=$Form->save();
			if ($result) 
			{
				$this->success('数据添加成功');
				# code...
			}
			else {
				$this->success('数据添加失败');
			}

			# code...
		}
		else
		{
			$this->error($Form->getError());
		}
	}


	function all()
	{
		$Form=M('Form');
		$list=$Form->limit(3)->select();
		if ($list)
		{
			$this->assign('list',$list);

		}
		else
		{
			$this->error('数据错误');
		}
		$this->display();
	}
    public function _empty($name='上海'){
        //把所有城市的操作解析到city方法
        $this->city($name);
    }
    //注意 city方法 本身是 protected 方法
    protected function city($name){
        //和$name这个城市相关的处理
         echo '当前城市' . $name;
    }

	
}






 ?>