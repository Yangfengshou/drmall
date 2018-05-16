<?php
namespace Admin\Controller;
use Think\Controller;
class LimitController extends Controller
{

/* 权限 */
    //权限列表
    public function limit_list()
    {
        $sql = "select * from dr_auth_rule as ar,dr_menu as m where ar.name=m.menu_path";
        $auth_arr= M()->query($sql);
        $count=count($auth_arr);
        $page_num=10;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $auth_arr=array_slice($auth_arr,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign("auth_arr", $auth_arr);
        $this->display();

    }

    //权限添加
    public function limit_add()
    {
        $auth_id=$_GET['auth_id'];
        if ($auth_id) {
            $auth_arr = M("auth_rule")->where("id={$auth_id}")->select();
            $this->assign("title", $auth_arr[0]['title']);
            if (IS_POST) {
                $auth = $_POST;
                $auth['module'] = "Admin";
                $auth['type'] = 1;
                $auth['status'] = 1;
                $auth['condition'] = "";
                $auth_sql = M("auth_rule")->add($auth);
                if ($auth_sql) {
                    $json[0] = 1;
                } else {
                    $json[0] = 0;
                }
                echo json_encode($json);
                exit;
            }
        } else {
            if (IS_POST) {
                $auth = $_POST;
                $auth['module'] = "Admin";
                $auth['type'] = 1;
                $auth['status'] = 1;
                $auth['condition'] = "";
                $auth_sql = M("auth_rule")->add($auth);
                if ($auth_sql) {
                    $json[0] = 1;
                } else {
                    $json[0] = 0;
                }
                echo json_encode($json);
                exit;
            }
        }
        $this->display();
    }

    //权限编辑
    public function limit_edit()
    {
        $auth_id = $_GET['auth_id'];
        if ($auth_id) {
            $auth_arr = M("auth_rule")->where("id='{$auth_id}'")->select();
            $this->assign("auth_arr", $auth_arr[0]);
            if (IS_POST) {
                $menu=M("auth_rule")->where("id='{$auth_id}'")->save($_POST);
                if ($menu) {
                    $json[0] = 1;
                } else {
                    $json[0] = 0;
                }
                echo json_encode($json);
                exit;
            }
        }
        $this->display();
    }


    //权限删除
    public function limit_delt(){
        $auth_id=$_POST['auth_id'];
        $res=M('auth_rule')->where("id='{$auth_id}'")->delete();
        if($res){
            $json['status']=1;
            $json['info']="删除成功！";
            echo json_encode($json);
            exit;
        }else{
            $json['status']=0;
            $json['info']="删除失败！";
            echo json_encode($json);
            exit;
        }
    }

    //权限查询
    public function limit_serch()
    {   $auth_title=trim($_POST['name']);
        $auth_name=trim($_POST['rule']);
        $where = "title='{$auth_title}' and name='{$auth_name}'";
        $auth_arr=M('auth_rule')->where($where)->select();
        if($auth_arr){
            $this->assign('auth_arr',$auth_arr);
            $this->display();

        }else{
            $sql = "select * from dr_auth_rule as ar,dr_menu as m where ar.name=m.menu_path";
            $auth_arr= M()->query($sql);
            $count=count($auth_arr);
            $page_num=10;
            $this->assign('page_num',$page_num);
            $p=new \Think\Page($count,$page_num);
            $auth_arr=array_slice($auth_arr,$p->firstRow,$p->listRows);
            $page=$p->show();
            $this->assign('page',$page);
            $this->assign("auth_arr", $auth_arr);
            echo "<script>layer.msg('查询失败',{icon:5});</script>";
            $this->display();
        }

    }



/* 管理组 */
    //管理组权限列表
    public function group_list()
    {
        $group=M('auth_group')->select();
        foreach($group as $k=>$v){
            $sql="select ga.uid,ga.group_id,a.admin_username from dr_auth_group_access as ga LEFT JOIN dr_admin as a on ga.uid=a.admin_id";
            $adminid=M()->query($sql);
            foreach ($adminid as $k1=>$v1){
                if($v['id']==$v1['group_id']){
                    $group["$k"]["admin_username"][]=$v1['admin_username'];
                }
            }
        }
        $count=count($group);
        $page_num=3;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $group=array_slice($group,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('group_arr',$group);
        $this->display();
    }

//管理组权限添加
    public function group_rule(){
        $group_id=I("group_id");
        $this->assign("group_id",$group_id);
        if($_POST['allot']==1){
            $rule_id=I("rule_id");
            $data['rules']=implode(",",$rule_id);
            $res=M("auth_group")->where("id=$group_id")->save($data);
            if($res){
                $this->success("操作成功");
            }else{
                $this->error("操作失败");
            }
        }

        $tree=$this->build_tree(0);
        $this->assign("tree",$tree);
        memory_get_usage();
        $this->display();
    }

    public  function findChild(&$arr,$id){
        $childs=array();
        foreach ($arr as $k => $v){
            if($v['pid']== $id){
                $childs[]=$v;
            }
        }
        return $childs;
    }
    public function build_tree($root_id){
        $rows=M("auth_rule")->select();
        $childs=$this->findChild($rows,$root_id);
        if(empty($childs)){
            return null;
        }
        foreach ($childs as $k => $v){
            $rescurTree=$this->build_tree($v[id]);
            if( null !=   $rescurTree){
                $childs[$k]['childs']=$rescurTree;
            }
        }
        return $childs;
    }


    //管理组添加
    public function group_add(){
        $res=M('auth_group')->add($_POST);
        if($res){
            $json['status']=1;
            $json['info']="添加成功！";
            echo json_encode($json);
            exit;
        }else{
            $json['status']=0;
            $json['info']="添加失败！";
            echo json_encode($json);
            exit;
        }

    }

//管理组编辑
    public function group_edit()
    {
        $group_id = $_GET['group_id'];
        if ($group_id) {
            $group_arr = M("auth_group")->where("id='{$group_id}'")->select();
            $this->assign("group_arr", $group_arr[0]);
            if (IS_POST) {
                $group_arr=M("auth_group")->where("id='{$group_id}'")->save($_POST);
                if ($group_arr) {
                    $json[0] = 1;
                } else {
                    $json[0] = 0;
                }
                echo json_encode($json);
                exit;
            }
        }
        $this->display();
    }

//管理组删除
    public function group_delt(){
        $group_id=$_POST['group_id'];
        $res=M('auth_group')->where("id='{$group_id}'")->delete();
        if($res){
            $json['status']=1;
            $json['info']="删除成功！";
            echo json_encode($json);
            exit;
        }else{
            $json['status']=0;
            $json['info']="删除失败！";
            echo json_encode($json);
            exit;
        }
    }


//管理组查询
public function group_serch()
{
    $group_title=trim($_POST['group_name']);
    $where="title='{$group_title}'";
    $group_arr=M('auth_group')->where($where)->select();
    if($group_arr){
        $this->assign('group_arr',$group_arr);
        $this->display();

    }else{
        $group=M('auth_group')->select();
        foreach($group as $k=>$v){
            $sql="select ga.uid,ga.group_id,a.admin_username from dr_auth_group_access as ga LEFT JOIN dr_admin as a on ga.uid=a.admin_id";
            $adminid=M()->query($sql);
            foreach ($adminid as $k1=>$v1){
                if($v['id']==$v1['group_id']){
                    $group["$k"]["admin_username"][]=$v1['admin_username'];
                }
            }
        }
        $count=count($group);
        $page_num=3;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $group=array_slice($group,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign("group_arr", $group);
        echo "<script>layer.msg('查询失败',{icon:5});</script>";
        $this->display();
    }
}


 public function manger_add(){
        $group_id=I("group_id");
        $admin_name=I("user_name");
        $admin_pwd=I("user_pwd");
        //md5加密
        $admin_pwd=md5($admin_pwd);
        if($admin_name){
            $data=array("admin_name"=>$admin_name,"admin_pwd"=>$admin_pwd);

            $admin=M("admin")->add($data);
            if($admin){
                $admin_id=$admin;
                foreach($group_id as $k=>$v){
                    $arr=array("uid"=>$admin_id,"group_id"=>$v);
                    M("auth_group_access")->add($arr);
                }
            }

            $this->success('添加成功');
        }else{
            $this->error("添加失败");
        }
    }





}


