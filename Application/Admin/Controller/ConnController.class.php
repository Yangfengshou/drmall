<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Crypt\Driver\Think;

Class ConnController extends Controller{
    public function _initialize(){
        $admin_id=$_SESSION['aid'];
        if(!isset($admin_id)){
            $this->redirect("Admin/Login/login");exit;
        }

        // 是否是超级管理员 ，UID == 1 的就是 管理员  //管理员允许访问任何页面
        if(($admin_id ==1)){
            // return true;//管理员允许访问任何页面
        }
        //  检测当前页是否有权限访问      // ' admin/index/index'
        $rule  = strtolower(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME);

        static $Auth    =   null;
        if (!$Auth) {
            $Auth       =   new \Think\Auth();
        }

        if(!$Auth->check($rule,$admin_id)){
            $this->error('没有权限访问本页面!',U ( 'Admin/Login/login' ));
        }

    }

    }
?>