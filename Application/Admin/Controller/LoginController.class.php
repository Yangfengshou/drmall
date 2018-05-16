<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    //加载登陆页面
    public function login(){
        $this->display();
    }
    //判断验证码
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    //点击退出后台页面到登陆页面
    public function loginOut(){
        session("aname",null);
        if(!$_SESSION['aname']){
            $this->success('退出成功',U('Login/login'));
        }
    }
    //点击登陆方法
    public function myLogin(){
        $username=I('post.username');
        $password=I('post.password');
        $verify=strtolower(I('post.verify'));
        $res=$this->check_verify($verify,1);
        if(!$res){
            $result['status']=0;
            $result['info']="验证码不正确";
            echo json_encode($result);
            exit;
        }
        $password=md5($password);
        $adminInfo=M('admin')->where("admin_username='{$username}' and admin_password='{$password}'")->select();
        if ($adminInfo) {
            session('lastTime',$adminInfo[0]['lastlogin_time']);
            session('lastIp',$adminInfo[0]['lastlogin_ip']);
            session('aid',$adminInfo[0]['admin_id']);
            session('aname',$adminInfo[0]['admin_username']);
            $result['status'] = 1;
            $result['info'] = "登录成功";
            echo json_encode($result);
            exit;
        } else {
            $result['status'] = 0;
            $result['info'] = "用户名或密码有误，请重试";
            echo json_encode($result);
            exit;
        }
    }
}