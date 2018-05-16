<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller{
    public function order_list(){
        $sql="select order_status,m.member_id,m.member_name,order_number,order_id,order_status,order_addtime,goods_price,s.order_status_name,s.admin_option from dr_member as m,dr_order as o,dr_order_status as s where o.member_id=m.member_id and o.order_status=s.order_status_id order by order_addtime desc;";
        $res=M()->query($sql);
        /*print_r($res);*/
        //分页
      /*  print_r($res);*/
        $count=count($res);
        $page_num=10;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $res=array_slice($res,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('res',$res);
        $this->display();
    }
    public function order_1(){
        $sql="select order_status,m.member_id,m.member_name,order_number,order_id,order_status,order_addtime,goods_price,s.order_status_name,s.admin_option from dr_member as m,dr_order as o,dr_order_status as s where o.member_id=m.member_id and o.order_status=s.order_status_id order by order_addtime desc;";
        $res=M()->query($sql);
        /*print_r($res);*/
        //分页
        /*  print_r($res);*/
        $count=count($res);
        $page_num=10;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $res=array_slice($res,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('res',$res);
        $this->display();
    }
    public function state(){
    $id=I('post.id');//状态id
    $sid=I('post.oid');//订单id
        if($id==4){
            $result['status'] = 0;
            $result['info']='订单已完成';
            echo json_encode($result);
        exit;
        }else

    $data['order_status']=$id+1;
        $res=M('order')->where("order_id=$sid")->save($data);
    if($res){
        $result['status'] = 1;
        $result['info']='操作成功';
        echo json_encode($result);
        exit;
    }else{
        $result['status'] = 0;
        $result['info']='操作已完成';
        echo json_encode($result);
        exit;
    }
    $this->display();
}


    public function delete(){
        $id=I('post.id');
        $res=M('order')->where("order_id=$id")->delete();
        if($res){
            $result['status']=1;
            $result['info']='删除成功';
            echo json_encode($result);
            exit;
        }else{
            $result['status']=0;
            $result['info']='删除失败';
            echo json_encode($result);
            exit;
        }
        $this->display();
    }
}