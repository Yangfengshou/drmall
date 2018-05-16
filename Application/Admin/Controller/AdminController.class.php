<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{
    //加载admin_add页面
    public function admin_add(){
        $this->display();
    }
    //添加管理员的方法
    public function myadd(){
        $add['admin_username']=I('post.username');
        $add['admin_password']=I('post.password');
        $add['admin_name']=I('post.name');
        $add['phone_number']=I('post.phone_number');
        $add['grade']=I('post.grade');
        $add['admin_addtime']=time();
        $data['group_id']=I('post.id');
        if(!($add['admin_username']&&$add['admin_password']&&$add['admin_name']&&$add['phone_number']&&$add['grade'])) {
            echo "<script>alert('请认真填写信息')</script>";
            $this->display('Admin/admin_add');
            exit;
        }elseif($db_username=M('admin')->where("admin_username='{$add['admin_username']}'")->find()) {
            echo "<script>alert('管理员用户名已存在')</script>";
            $this->display('Admin/admin_add');
            exit;
        }
            $add['admin_password']=md5($add['admin_password']);
            $data['uid']=M('admin')->add($add);
            M('auth_group_access')->add($data);
            echo "<script>alert('添加成功')</script>";
            $this->display('Admin/admin_add');
        }
    //分页列表查询功能

    //分页列表
    public function admin_list(){
//        $where = $this->getWhere ();
        $adminlist=M('admin')->select();
        $count=count($adminlist);
        $page_num=5;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $adminlist=array_slice($adminlist,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('adminlist',$adminlist);
        $this->display();
    }
    //修改信息页面
    public function admin_alter(){
        $this->display();
    }
    //单击修改信息
    public function myAlter(){
        $aid=I('get.aid');
        $data['password']=I('post.password');
        $data['password']=md5($data['password']);
        $data['name']=I('post.name');
        $data['phone_number']=I('post.phone_number');
        $save=M('admin')->where("admin_id=$aid")->save($data);
        if($save){
            echo "<script>alert('修改成功')</script>";
        }
        $this->display('admin_alter');
    }
    //点击删除管理员
    public function del(){
        $aid=$_POST['aid'];
        M('admin')->where("admin_id='{$aid}'")->delete();
        $this->display('admin_list');
    }
    //点击启用或禁用
    public function admin_alive()
    {
        $aid = I('post.aid');
        $alive = I('post.alive');
        if ($alive == 1) {
            $data['admin_alive'] = 0;
            $save = M('admin')->where("admin_id=$aid")->save($data);
            if ($save) {
                M('admin')->select();

            }
        } elseif ($alive == 0) {
            $data['admin_alive'] = 1;
            $save = M('admin')->where("admin_id=$aid")->save($data);
            if ($save) {
                $adminlist = M('admin')->select();

            } else {
                $del = M('admin')->where("admin_id=$aid")->delete();
                if ($del) {
                    $adminlist = M('admin')->select();
                }
            }
            $count = count($adminlist);
            $page_num = 5;
            $this->assign('page_num', $page_num);
            $p = new \Think\Page($count, $page_num);
            $adminlist = array_slice($adminlist, $p->firstRow, $p->listRows);
            $page = $p->show();
            $this->assign('page', $page);
            $this->assign('adminlist', $adminlist);
            $this->display();
        }
    }

    //点击查询
    public function admin_select(){
        $adminInfo=I('post.adminInfo');
        $where="admin_username like '%$adminInfo%' or admin_name like '%$adminInfo%'
        or phone_number like '%$adminInfo%'";
        $adminlist = M('admin')->where($where)->select();
        $count = count($adminlist);
        $page_num = 5;
        $this->assign('page_num', $page_num);
        $p = new \Think\Page($count, $page_num);
        $adminlist = array_slice($adminlist, $p->firstRow, $p->listRows);
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('adminlist', $adminlist);
        $this->display();
    }
}