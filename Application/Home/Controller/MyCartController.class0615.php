<?php
namespace Home\Controller;
use Think\Controller;
class MyCartController extends Controller {
  //购物车页面
    public function mycart(){
        $mid=$_SESSION['mid'];
        $gid=$_GET['gid'];
        $cart=M('cart')->where("member_id=$mid")->select();
        $cart_id=$cart[0]['cart_id'];
        $cart[0]['goods_detail_id'];
        if($mid&&$_SESSION['mname']){
            if($cart_id>0){
                $sql="select * from dr_goods as g,dr_goods_color as gc,dr_goods_size as gs,dr_cart as c,dr_goods_detail as gd where c.member_id=$mid and c.goods_id=g.goods_id and g.goods_id=gc.goods_id and gs.goods_id=g.goods_id and gd.goods_color_id=gc.goods_color_id and gd.goods_size_id=gs.goods_size_id and gd.goods_detail_id=c.goods_detail_id;";
                $goodsInfo=M()->query($sql);
                $this->assign('goodsInfo',$goodsInfo);
                $this->display();
            }else{
                $this->display();
            }

        }else{
            if($_SESSION['mycart']){
                $gid=$_SESSION['mycart'][$gid]['goods_id'];
                $goodsInfo=M('goods')->where("goods_id=$gid")->select();
                $goodsInfo[0]['goods_buynum']=$_SESSION['mycart'][$gid]['buynum'];
                $gcid=$_SESSION['gcid'];
                $gsid=$_SESSION['gcid'];
                $goods_detail=M('goods_detail')->where("goods_color_id=$gcid and goods_size_id=$gsid")->select();
                $goodsInfo[0]['goods_detail_price']=$goods_detail[0]['goods_detail_price'];
                $where_gcid="goods_id=$gid and goods_color_id=$gcid";
                $where_gsid="goods_id=$gid and goods_size_id=$gsid";
                $color=M('goods_color')->where($where_gcid)->select();
                $size=M('goods_size')->where($where_gsid)->select();
                $goodsInfo[0]['goods_color_name']=$color[0]['goods_color_name'];
                $goodsInfo[0]['goods_size_name']=$size[0]['goods_size_name'];
                $this->assign('goodsInfo',$goodsInfo);
                session('goodsInfo',$goodsInfo);
                $this->display();
            }else{
                $this->display();
            }

        }
    }
    //加入购物车页面
    public function addtocar(){
        $gid=$_GET['gid'];
        $gcid=$_SESSION['gcid'];
        $gsid=$_SESSION['gcid'];
        $where="goods_id=$gid";
        $where_gcid="goods_id=$gid and goods_color_id=$gcid";
        $where_gsid="goods_id=$gid and goods_size_id=$gsid";
        $where_detail="goods_id=$gid and goods_size_id=$gsid and goods_color_id=$gcid";
        $this->addGoods=M('goods')->where($where)->select();
        $this->detail=M('goods_detail')->where($where_detail)->select();
        $this->color=M('goods_color')->where($where_gcid)->select();
        $this->size=M('goods_size')->where($where_gsid)->select();
        $this->cartGoods=M('cart')->where($where)->select();
        $this->display();
    }
    public function Myaddtocar(){
        $mid=$_SESSION['mid'];
        $buynum=$_POST['buynum'];
        $gid=$_POST['gid'];
        $gcid=$_SESSION['gcid'];
        $gsid=$_SESSION['gsid'];

        $where="goods_color_id=$gcid and goods_size_id=$gsid";
        $goods_detail=M('goods_detail')->where($where)->select();
        $goods_detail_id=$goods_detail[0]['goods_detail_id'];
        $addtime=time();
        //登陆状态下
        if($_SESSION['mname']&&$_SESSION['mid']>0){
            $where="member_id=$mid and goods_id=$gid and goods_detail_id=$goods_detail_id";
            $mycart=M('cart');
            $goods=$mycart->where($where)->find();
            if($goods){
                //如果购物车有该商品
                $update['goods_buynum']=$goods['goods_buynum']+$buynum;
                $data=M('cart')->where("$where")->save($update);
                if($data){
                    $this->success('加入购物车成功',U('addtocar',array('gid'=>$gid,'buynum'=>$buynum,'goods_detail_id'=>$goods_detail_id)));
                }
            }else{
                //如果购物车没有该商品
                $cart['goods_id']=$gid;
                $cart['member_id']=$mid;
                $cart['goods_buynum']=$buynum;
                $cart['goods_addtime']=$addtime;
                $cart['goods_detail_id']=$goods_detail_id;
                $res=M('cart')->add($cart);
                $this->success('加入购物车成功',U('addtocar',array('gid'=>$gid,'buynum'=>$buynum,'goods_detail_id'=>$goods_detail_id)));
            }
            //未登录登陆状态下
        }else{
            //如果购物车有该商品
            if($_SESSION['mycart'][$gid]){
                $_SESSION['mycart'][$gid]['buynum']+=$buynum;
                $_SESSION['mycart'][$gid]['addtime']=$addtime;
                $this->success('加入购物车成功',U('addtocar',array('gid'=>$gid,'buynum'=>$buynum)));
            }else{
                //如果购物车没有该商品
                $newgoods['goods_id']=$gid;
                $newgoods['buynum']=$buynum;
                $newgoods['addtime']=$addtime;
                $_SESSION['mycart'][$gid]=$newgoods;
                $this->success('加入购物车成功',U('addtocar',array('gid'=>$gid,'buynum'=>$buynum)));
            }
        }
    }

//购物车删除
    public function delete(){
        $gid=I("post.gid");
        if($_SESSION['mid']>0&&$_SESSION['mname']){
            $res=M('cart')->where("goods_id=$gid")->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
            }else{
                $result['status'] = 0;
                echo json_encode($result);
            }
        }else{
            session('mycart',null);
            $this->display('mycart');
        }
    }
    public function qxdelete(){
        if($_SESSION['mid']>0&&$_SESSION['mname']){
            $res=M('cart')->where("member_id={$_SESSION['mid']}")->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
            }else{
                $result['status'] = 0;
                echo json_encode($result);
            }
        }else{
            session($_SESSION['mycart'],null);
            $this->display('mycart');
        }
    }

    //结算
    public function dosum(){
        if($_SESSION['mid']>0&&$_SESSION['mname']){

            $result['status']=1;
            echo json_encode($result);

        }else{
            $result['status']=2;
            echo json_encode($result);
        }

    }

    //支付页面
    public function pay(){
        $this->display();
    }
    //支付成功页面
    public function paySuccess(){
        $this->display();
    }

}