<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller{
    //分类浏览
    public function cate_list(){
        $catelist=M('cate')->select();
        //分页
        $count=count($catelist);
        $page_num=10;
        $p=new \Think\Page($count,$page_num);
        $catelist=array_slice($catelist,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page_num',$page_num);
        $this->assign('page',$page);
        $this->assign('catelist',$catelist);
        $this->display();
    }

    //添加类别
    public function cate_add(){
        $this->display();
    }
    public function cate_MyAdd(){
        $data['cate_name']=I('post.catename');
        $data['cate_pid']=I('post.cid');
        $fetOne=M('cate')->where("cate_id={$data['cate_pid']}")->select();
        $cate_path=$fetOne[0]['cate_path'];
        $res=M('cate')->add($data);
        $where="";
        $where.=$cate_path;
        $where.=",$res";
        $path['cate_path']=$where;
        M('cate')->where("cate_id=$res")->save($path);
        $this->display("cate_add");
    }

    //分类更新
    public function cate_edit(){
        $cate_id=$_GET[1];
        $this->cateInfo=M('cate')->where("cate_id={$cate_id}")->select();
        $data['cate_name']=I('post.catename');
       /* M("cate")->add($data);//插入表中的返回的id*/
        session('res_id',$cate_id);
        $this->display();
    }
    public function cate_MyEdit(){
        $res_id=$_SESSION['res_id'];
        $res['cate_name']=I('post.catename');
        $cid=I('post.cid');//分类框
        $res_path=M("cate")->where("cate_id='{$cid}'")->select();
        $path=$res_path[0]['cate_path'];
        $path.=",$res_id";
        $res['cate_path']=$path;
        $res['cate_pid']=$cid;
        M('cate')->where("cate_id='{$res_id}'")->save($res);
        $this->display("cate_edit");
    }

    //分类上下架
    public function cate_delete(){
        $cate_id=$_POST['cate_id'];
        $cate_alive=$_POST['cate_alive'];
        $cate_pid=M('cate')->where("cate_id=$cate_id")->select();
        $pid=$cate_pid[0]['cate_pid'];
        if($pid==0){
            if($cate_alive==1){
                $data['active']=0;
                $where="cate_path like '$cate_id%'";
                M('cate')->where($where)->save($data);

            }else{
                $data['active']=1;
                $where="cate_path like '$cate_id%'";
                M('cate')->where($where)->save($data);
            }
        }else {
            if($cate_alive==1){
                $data['active']=0;
                M('cate')->where("cate_id like $cate_id")->save($data);
            }else{
                $data['active']=1;
                M('cate')->where("cate_id like $cate_id")->save($data);
            }
        }
        $catelist=M('cate')->select();
        //分页
        $count=count($catelist);
        $page_num=10;
        $p=new \Think\Page($count,$page_num);
        $catelist=array_slice($catelist,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page_num',$page_num);
        $this->assign('page',$page);
        $this->assign('catelist',$catelist);
        $this->display();
     /*
     //方法二：
     $cate_id=$_GET[1];
        $cate_pid=M('cate')->where("cate_id=$cate_id")->select();
        $pid=$cate_pid[0]['cate_pid'];
        $active=$cate_pid[0]['active'];
            if($pid==0){
                if($active==1){
                    $data['active']=0;
                    $where="cate_path like '$cate_id%'";
                    M('cate')->where($where)->save($data);
                }else{
                    $data['active']=1;
                    $where="cate_path like '$cate_id%'";
                    M('cate')->where($where)->save($data);
                }
            }else{
                if($active==1){
                    $data['active']=0;
                    M('cate')->where("cate_id like $cate_id")->save($data);
                }else{
                    $data['active']=1;
                    M('cate')->where("cate_id like $cate_id")->save($data);
                }
            }*/

    }

    //搜索功能
public function cate_serch(){
   $cate_name=trim($_POST['cate_name']);
   $cate_pid=$_POST['parent'];
   $active=$_POST['opt'];
   $where="cate_name='{$cate_name}' and cate_pid='{$cate_pid}' and active='{$active}'";
   $catelist=M('cate')->where("$where")->select();
   $this->assign("catelist",$catelist);
   $this->display();
}






















}