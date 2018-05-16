<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller {


 //个人资料：
    public function info(){
        //这个只查询   注意   注意   有调用页面
        $mname=I('post.username');
        if($mname){
            $data['member_tname']=I('post.tname');
            $data['member_sex']=I('post.sex');
            $data['member_age']=I('post.age');
            $data['member_mail']=I('post.mail');
            $data['member_phone']=I('post.phone');
            $picArr=upload('Public/upload/info');
            $data['member_pic']=$picArr[0]['filename'];
            $res=M('member')->where("member_name='{$mname}'")->save($data);
            if($res){
                $goodsInfo=M('member')->where("member_name='{$mname}'")->find();
                $this->assign('value',$goodsInfo);
                $this->display();
                echo "<script>layer.msg('更新成功！',{icon:6});</script>";
            }else{
                echo "<script>layer.msg('更新失败！',{icon:5});</script>";
            }
        }else{
            $mname=session('mname');
            $goodsInfo=M('member')->where("member_name='{$mname}'")->find();
            $this->assign('value',$goodsInfo);
            $this->display();
        }

}

    /*修改密码*/
    public function xgpwd(){
        $mname=session('mname');
        $password=I('post.password');
        $data['member_password']=md5($password);
        $res=M('member')->where("member_name='$mname'")->save($data);
        if($res){
           $result['status'] = 1;
           $result['info'] = "修改成功";
           echo json_encode($result);
           exit;
          }else{
           $result['status'] = 0;
           $result['info'] = "修改失败，请重试";
           echo json_encode($result);
           exit;
        }
    }

    public function cart(){
        $mid=$_SESSION['mid'];
        $cart=M('cart')->where("member_id='{$mid}'")->select();
        $cart_id=$cart[0]['cart_id'];
        $cart[0]['goods_detail_id'];
        if($mid&&$_SESSION['mname']){
            if($cart_id>0){
                $sql="select * from dr_goods as g,dr_goods_color as gc,dr_goods_size as gs,dr_cart as c,dr_goods_detail as gd where c.member_id=$mid and c.goods_id=g.goods_id and g.goods_id=gc.goods_id and gs.goods_id=g.goods_id and gd.goods_color_id=gc.goods_color_id and gd.goods_size_id=gs.goods_size_id and gd.goods_detail_id=c.goods_detail_id";
                $goodsInfo1=M()->query($sql);
                $goodsInfo[]=$goodsInfo1;
                //分页
                $count=count($goodsInfo[0]);
                $page_num=1;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $goodsInfo=array_slice($goodsInfo[0],$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('goodsInfo',$goodsInfo);
                $this->display();
            }else{
                $this->display();
            }

        }else{
            if($_SESSION['mycart']){
                $num=$_SESSION['num'];
                $goodsInfo=$_SESSION['mycart'];
                //分页
                $count=count($goodsInfo[$num]);
                $page_num=1;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $goodsInfo=array_slice($goodsInfo[$num],$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('goodsInfo',$goodsInfo);
                $this->display();
            }else{
                $this->display();
            }

        }
    }

//我的订单：
    public function myorder(){
        //通过mid查order表  得出订单信息  order_id   order_price  order_status
        //联合查询  需要的内容是 goods_name  goods_buynum  goods_pic  goods_mobileprice   order_price  order_status_name  颜色和尺码最后再说
        $mid=$_SESSION['mid'];
        $tid=1;
        $this->one=M('order')->field('count(order_id),order_status')->where("order_status=1 and member_id=$mid")->select();
        $this->two=M('order')->field('count(order_id),order_status')->where("order_status=2 and member_id=$mid")->select();
        $this->three=M('order')->field('count(order_id),order_status')->where("order_status=3 and member_id=$mid")->select();
        $this->foue=M('order')->field('count(order_id),order_status')->where("order_status=4 and member_id=$mid")->select();
       // $sql="select g.goods_id,o.order_price,o.goods_price,og.goods_buynum,order_status_name,g.goods_name,goods_pic,gd.goods_detail_id from dr_order as o,dr_order_goods as og,dr_order_status,dr_goods as g,dr_goods_detail as gd where o.order_status=$tid and member_id=$mid and order_status_id=o.order_status and o.order_id=og.order_id and g.goods_id=og.goods_id and o.goods_detail_id=gd.goods_detail_id";
        $sql="select * from dr_order as o,dr_order_goods as og,dr_order_status,dr_goods as g,dr_goods_detail as gd,dr_goods_color as gc,dr_goods_size as gs where o.order_status=$tid and member_id=$mid and order_status_id=o.order_status and o.order_id=og.order_id and g.goods_id=og.goods_id and o.goods_detail_id=gd.goods_detail_id and gd.goods_color_id=gc.goods_color_id and gs.goods_size_id=gd.goods_size_id and gc.goods_id=gs.goods_id";
        $res = M()->query($sql);

        $this->assign('res',$res);
        $this->display();
    }

    public function myorder_1(){
        $tid=I('post.tid');
        $mid=$_SESSION['mid'];
        if($tid) {
            $sql="select g.goods_id,o.order_price,o.goods_price,og.goods_buynum,order_status_name,g.goods_name,goods_pic from dr_order as o,dr_order_goods as og,dr_order_status,dr_goods as g where o.order_status=$tid and member_id=$mid and order_status_id=o.order_status and o.order_id=og.order_id and g.goods_id=og.goods_id";
            $res = M()->query($sql);
            $this->assign('res',$res);
        }
        $this->display();
    }



    //会员积分：
    public function vip(){
        $mid=$_SESSION['mid'];
        $this->data=M('vip')->where("member_id=$mid")->select();
       // $this->res=M('member')->where("member_id=$mid")->field('member_lastloginTime')->select();
        $this->display();
    }
    public function vipadd(){
        $mid=$_SESSION['mid'];
        $data=M('vip')->where("member_id=$mid")->select();
        $day=$data[0]['vip_day'];
        $data['vip_day']=I('post.day')+$day;
        $vipday=I('post.vipday');
        session('vipday',$vipday);
        $data['vip_num']=$data['vip_day']+$data['vip_num'];
        if($_SESSION['vipday']>=1){
            $result['status']=2;
            $result['info']='您已经签到过了。';//也可以让签到变灰色   不让点击  这样就不用弹了
            echo json_encode($result);
            exit;
        }else{
            $res=M('vip')->where("member_id=$mid")->save($data);
            if($res){
                $result['status']=1;
                $result['info']='签到成功';
                echo json_encode($result);
                exit;
            }else{
                $result['status']=0;
                $result['info']='网络忙，请稍后重试';
                echo json_encode($result);
                exit;
            }
        }

    }

    public function vip_1(){
        $mid=$_SESSION['mid'];
        $data=M('vip')->where("member_id=$mid")->select();
        $this->assign ( 'data', $data );
        $this->display();
    }



//管理收货地址：
    public function shouhuo(){
        $this->count=M('site')->field("count('site_id')")->select();
        $this->site=M('site')->select();
        $this->display();

    }
    public function skip(){
        $id=$_GET['id'];
        $_SESSION['sid']=$id;
        if($id>0){
            $this->success('跳转中',U('Member/shouhuo',array('id'=>$id)));
        }
    }
    //更改收货地址
    public function Myalter()
    {
        $id = $_SESSION['sid'];
        $mid = $_SESSION['mid'];
        $data['site_ads']=I('post.address');
        $data['site_pc']=I('post.postcode');
        $data['site_name']=I('post.username');
        $data['site_mobile']=I('post.mobile');
        $data['site_area']=I('post.s_province');
        $data['site_area'].=I('post.s_city');
        $data['site_area'].=I('post.s_county');
        $data['site_addtime']=time();
        $data['member_id'] = $mid;
        M('site')->where("site_id=$id and member_id=$mid")->save($data);
        $this->success('修改成功',U('Order/orderGoodsGrade'));
    }
    //我的收货地址
    public function Myreceipt(){
        header("content-type:text/html; charset=utf8");
            $id=$_SESSION['mid'];
            $data['site_ads']=I('post.address');
            $data['site_area']=I('post.add');
            $data['site_pc']=I('post.postcode');
            $data['site_name']=I('post.username');
            $data['site_mobile']=I('post.mobile');
            $data['site_area']=I('post.s_province');
            $data['site_area'].=I('post.s_city');
            $data['site_area'].=I('post.s_county');
            $data['site_addtime']=time();
            $data['member_id']=$id;
            M('site')->add($data);
            $this->success('保存成功');
    }
    //收货地址的删除
    public function del(){
        header("content-type:text/html; charset=utf8");
        $id=$_POST['id'];
        $mid=$_SESSION['mid'];
        $res=M('site')->where("site_id=$id and member_id=$mid")->delete();
        if($res){
            $result['status'] = 1;
            $result['info'] = "删除成功";
            echo json_encode($result);
            exit;
        }else{
            $result['status'] = 0;
            $result['info'] = "删除失败";
            echo json_encode($result);
            exit;
        }

    }
    public function mail(){
        $this->display();
    }

//商品收藏浏览
    public function collectShop(){
        $sql = "select * from dr_goods g,dr_store s where g.goods_id=s.goods_id and s.member_id='{$_SESSION['mid']}'";
        $goods = M()->query($sql);
        $this->assign('goods', $goods);
        $this->display();
    }

//浏览记录
    public function lookHistory(){
        $sql="select * from dr_goods g,dr_browse b where g.goods_id=b.goods_id and b.member_id='{$_SESSION['mid']}'";
        $goods=M()->query($sql);
        $this->assign('goods',$goods);
        $this->display();

    }

//购买记录
    public function  record(){
        $id=$_SESSION['mid'];
        $sql="select g.goods_id,o.order_number,o.order_addtime,o.order_id,o.order_price,o.goods_price,og.goods_buynum,member_option,g.goods_name,goods_pic from dr_order as o,dr_order_goods as og,dr_order_status,dr_goods as g where o.order_status=4 and member_id=$id and order_status_id=o.order_status and o.order_id=og.order_id and g.goods_id=og.goods_id";
        $res=M()->query($sql);
        $this->assign('res',$res);
        $this->display();
    }
}