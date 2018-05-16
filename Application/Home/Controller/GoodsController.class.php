<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goodsdetail(){
        if(session('gid')){
            $gid=session('gid');
            session('gid',null);
        }else{
            $gid=$_GET['gid'];
        }
        $mid=$_SESSION['mid'];
      /*  $_SESSION['gid']=$_GET['gid'];*/
        //插入浏览记录表
        $add['member_id']=$mid;
        $add['goods_id']=$gid;
        $add['addtime']=time();
        $where="goods_id='$gid'and member_id='$mid'";
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        //根据gid查商品信息
        $this->goodsArr=M('goods')->where("goods_id=$gid")->select();
        $this->picArr=M('pic')->where("goods_id=$gid")->select();
        $this->colorArr=M('goods_color')->where("goods_id=$gid")->select();
        $this->sizeArr=M('goods_size')->where("goods_id=$gid")->select();
        $this->priceArr=M('goods_detail')->where("goods_id=$gid")->select();
        $this->limitArr=M('limit_goods')->field('limit_goodsprice')->where("goods_id=$gid")->find();
        //查询浏览记录
        if($_SESSION['mname']&&$_SESSION['mid']>1){
            $sql="select goods_name,goods_pic from dr_goods g,dr_browse b where g.goods_id=b.goods_id and b.member_id='{$mid}' order by addtime desc limit 10";
            $browsegoods=M('browse')->where($where)->select();
            //如果记录为空插入数据
            if($browsegoods==null){
                M('browse')->add($add);
                //如果记录不为空则更新数据
            }else{
                M('browse')->where($where)->save($add);
            }
        }else{
            $sql="select goods_name,goods_pic from dr_goods g,dr_browse b where b.goods_id=$gid and g.goods_id=b.goods_id";
        }
        $this->browseInfo=M()->query($sql);
        //$this->browseInfo=M()->query($sql);

        //商品点击量
        $res=M('click')->where("goods_id=$gid")->select();
        //如果存在   就更新click_num   不存在就新增一条
        if($res){
            $data['click_num']=$res[0]['click_num']+1;
            M('click')->where("goods_id=$gid")->save($data);
        }else{
            $data['click_num']=1;
            $data['goods_id']=$gid;
            M('click')->add($data);
        }


        $this->display();
    }

    //获取对应规格的价格
    public function goodsprice(){
        $gcid=I('post.gcid');
        $gsid=I('post.gsid');
        $gid=I('post.gid');
        session('gcid',$gcid);
        session('gsid',$gsid);
        $priceArr=M('goods_detail')->where("goods_id=$gid and goods_color_id=$gcid and goods_size_id=$gsid")->field('goods_detail_price')->find();
         if($priceArr){
             echo json_encode($priceArr);
         }
    }

    //商品收藏
    public function colet(){
        $data['goods_id']=I('post.gid');
        $data['store_addtime']=time();
        $data['member_id']=$_SESSION['mid'];
        if(session('mid')>0&&session('mname')){
            $where="goods_id={$data['goods_id']} and member_id={$data['member_id']}";
            $res=M('store')->where($where)->select();
            if(!$res){
                M('store')->add($data);
                $result['status']=1;
                echo json_encode($result);
            }else{
                M('store')->where($where)->delete();
                $result['status']=0;
                echo json_encode($result);
            }
        }else{
            $result['status']=2;
            echo json_encode($result);
        }

    }
}
