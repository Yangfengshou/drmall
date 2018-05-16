<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller{
   /* public function index(){
        $adminInfo=M('admin');
        $aid=$_SESSION['aid'];
        if($aid){
            $data['lastlogin_time']=time();
            $data['lastlogin_ip']=$_SERVER['REMOTE_ADDR'];
            $adminInfo->where("admin_id=$aid")->save($data);
            $this->display();
        }else{
            $this->display('Login/login');
        }
    }*/
    public function index(){
        $this->display();
    }
    public function main(){
        $this->display();
    }

   //highchart图表
    public function all_price_2017(){
        header('Content-type: application/json;charset=utf-8');
        $sql="select DATE_FORMAT(date_addtime,'%m') months,sum(order_price) all_price from dr_order GROUP BY months";
        $order_all_price=M()->query($sql);
        foreach($order_all_price as $k=>$v){
            $new_arr[$k]=(int)$v['all_price'];
        }
        $result[0]['data']=$new_arr;
        echo json_encode($result);
        exit;
    }

//left菜单遍历
    public function left(){
        static $Auth    =   null;
        if (!$Auth) {
            $Auth       =   new \Think\Auth();
        }
        $admin_id=$_SESSION['aid'];
        $menu=M('menu')->where("menu_pid=0")->select();
        foreach($menu as $key=>$val){
            $rule=$val['menu_path'];
            if(!$Auth->check($rule,$admin_id)){
                unset($menu[$key]);
            }else {
                $where="menu_pid={$val['menu_id']}";
                $menu2 = M('menu')->where($where)->select();
                foreach ($menu2 as $k=>$v) {
                    $rule2 = $v['menu_path'];
                    if(!$Auth->check($rule2,$admin_id)){
                        unset($menu2[$k]);
                    }else{
                        $menu[$key]['child'] = $menu2;
                    }
                }
            }
        }
        $this->assign("menu",$menu);
        $this->display();
    }
}
