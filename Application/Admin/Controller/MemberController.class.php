<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller
{
    //删除
    public function member_list()
    {
        $member = M('member')->select();
        $this->assign('member', $member);
        if ($member) {
            $result['status'] = 1;
            $result['info'] = "删除成功";
        } else {
            $result['status'] = 0;
            $result['info'] = "删除失败";
        }
        $this->display();
    }

    //查询
    public function member_select()
    {
        $memberInfo = I('post.member_name');
//        print_r($memberInfo);
        $where = "member_name like '%$memberInfo%' or member_tname like '%$memberInfo%'
        or member_phone like '%$memberInfo%'";
        $memberList = M('member')->where($where)->select();
        print_r($memberList);
        $count = count($memberList);
        $page_num = 5;
        $this->assign('page_num', $page_num);
        $p = new \Think\Page($count, $page_num);
        $memberList = array_slice($memberList, $p->firstRow, $p->listRows);
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('memberList', $memberList);
        $this->display();
    }

    //删除
    public function member_delete()
    {//JQ代码放置页面
        $member_id = I('post.member_id');//通过I方法获得post传递过来的member_id 赋值给变量$member_id
        if ($member_id) {//用if语句做判断，如果$member_id有值  就执行下面的代码
            //删除语句   用$res来接受执行语句的返回值  根据这个返回值  用if语句做判断  如果有值=成功   没有值=失败
            if ($res = M('member')->where("member_id=$member_id")->delete()) {
                //查询语句   因为用的是AJAX局部刷新   执行完删除语句之后  我们要再次查询一下数据库  然后把返回的值渲染到页面  在对面页面遍历输出以后   通过JQ代码    把新查到内容覆盖到原来位置  从而实现页面不动   局部内容变化
                $member = M('member')->select();
                //注意  这里查询语句的返回值的变量名   也就是$member  要和HTML页面里面  遍历输出时用到的变量名字一样
                $this->assign('member', $member);
            }
        }
        $this->display();
    }

    //添加
    public function member_add()
    {
        if ($_POST) {
            $username = I('post.username');
            $data['member_name'] = I('post.username');
            $data['member_pwd'] = I('post.password');
            $data['member_password'] = md5(I('post.password'));
            $data['member_phone'] = I('post.phone');
            $data['member_lastlogine'] = time();
            $data['member_registerTime'] = time();
//        print_r($_POST);//打印出获得的值
//        exit;
            //验证用户是否已经存在
            $res = M('member')->where("member_name='$username'")->select();
            if ($res) {
                echo "<script>alert('用户名已存在!')</script>";
                $this->display();
            } else {
                if ($data['member_phone']) {
                    $res1 = M('member')->add($data);
                    if ($res1) {
                        session('mid', $res1['member_id']);
                        session('mname', $res1['member_name']);
                        session('mphone', $res1['member_phone']);
                        echo "<script>alert('添加成功!')</script>";
                        $this->display();
                    } else {
                        echo "<script>alert('添加失败!')</script>";
                        $this->display();
                    }
                } else {
                    echo "<script>alert('内容填写不完整!')</script>";
                    $this->display();
                }
            }
        } else {
            $this->display();
        }
    }

    //加载修改页面
    public function member_redact()
    {
        $this->display();
    }
    //点击修改
    public function myRedact(){
        $mid = I('post.mid');
        $member['member_name'] = I('post.username');
        $member['member_password'] = I('post.password');
        $member['member_phone'] = I('post.phone');
        $member['member_registerTime'] = time();
        $res= M('member')->where("member_id=$mid")->save($member);
            if($res) {
                echo "<script>alert('用户修改成功');</script>";
                $this->display('member_redact');
            } else {
                echo "<script>alert('用户修改失败');</script>";
                $this->display('member_redact');
            }
    }
    //点击冻结或激活
    public function member_alive(){
        $mid=I('post.mid');
        $alive=I('post.alive');
        if($alive==1){
            $data['member_alive']=0;
            $save=M('member')->where("member_id=$mid")->save($data);
            if($save) {
                $memberList = M('member')->select();
                $count = count($memberList);
                $page_num = 5;
                $this->assign('page_num', $page_num);
                $p = new \Think\Page($count, $page_num);
                $memberList = array_slice($memberList, $p->firstRow, $p->listRows);
                $page = $p->show();
                $this->assign('page', $page);
                $this->assign('memberList', $memberList);
            }
        }else{
            $data['member_alive']=1;
            $save=M('member')->where("member_id=$mid")->save($data);
            if($save){
                $memberList=M('member')->select();
                $count=count($memberList);
                $page_num=5;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $memberList=array_slice($memberList,$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('memberList',$memberList);
            }
        }
        $this->display();
    }
}