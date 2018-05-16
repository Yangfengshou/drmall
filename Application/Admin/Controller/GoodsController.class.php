<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function goods_list(){
        $goodslist=M('goods')->select();
        //分页
        $count=count($goodslist);
        $page_num=4;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $goodslist=array_slice($goodslist,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('goodslist',$goodslist);
        $this->display();
    }
    public function goods_serch(){
        $serch=I('post.serch');
        $sql="select * from dr_goods where goods_name like '%$serch%'";
        $goodslist=M('')->query($sql);
        if($goodslist){
            print_r($goodslist);
            $count=count($goodslist);
            $page_num=4;
            $this->assign('page_num',$page_num);
            $p=new \Think\Page($count,$page_num);
            $goodslist=array_slice($goodslist,$p->firstRow,$p->listRows);
            $page=$p->show();
            $this->assign('page',$page);
            $this->assign('goodslist',$goodslist);
            $this->display();
        }else{
            $goodslist=M('goods')->select();
            $count=count($goodslist);
            $page_num=4;
            $this->assign('page_num',$page_num);
            $p=new \Think\Page($count,$page_num);
            $goodslist=array_slice($goodslist,$p->firstRow,$p->listRows);
            $page=$p->show();
            $this->assign('page',$page);
            $this->assign('goodslist',$goodslist);
            $this->display();
            echo "<script>layer.msg('查询失败',{icon:5});</script>";
        }

    }
    public function goods_alive(){
        $goods_id=I('post.goods_id');
        $goods_alive=I('post.goods_alive');
        if($goods_alive==1) {//goods_alive['goods_alive']==1
            $data['goods_alive'] = 0;
            $res = M('goods')->where("goods_id=$goods_id")->save($data);
            if ($res) {
                $goodslist=M('goods')->select();
                //分页
                $count=count($goodslist);
                $page_num=4;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $goodslist=array_slice($goodslist,$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('goodslist',$goodslist);
            }
        }else{
            $data['goods_alive'] = 1;
            $res = M('goods')->where("goods_id=$goods_id")->save($data);
            if ($res) {
                $goodslist=M('goods' )->select();
                //分页
                $count=count($goodslist);
                $page_num=4;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $goodslist=array_slice($goodslist,$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('goodslist',$goodslist);
            }
        }
        $this->display();
    }
    public function goods_add(){
        //自动验证一定得做！！！  不做也有办法   表里面必要的字段  全部设置不能为空   一种笨的验证方法
        $goods['goods_name']=I('post.goodsname');//商品名字
        $goods['goods_nickname']=I('post.goods_nickname');//别名
        $goods['cate_id']=I('post.cid');//上级分类
        $goods['goods_marketprice']=I('post.marketprice');//市场价格
        $goods['goods_mobileprice']=I('post.mobileprice');//手机价格
        //$goods['goods_detail']=I('post.detail');//商品详情
        $goods['goods_addtime']=time();
        $data2['color']=I('post.color');//颜色
        $data2['size']=I('post.size');//大小
        $gcgoods1=I('post.gcgoods');//Array ( [0] => c [1] => e [2] => w )
        $gsgoods1=I('post.gsgoods');
        $detail_num=I('post.detail_num');//数量
        $detail_price=I('post.detail_price');//价格

        /*echo "<pre>";
        echo "<br>";
        print_r($gdetail);exit;*/
        if($_POST){
            if($goods['cate_id']){
                $res=M('goods')->add($goods);
                if(!$res){
                    echo "<script>alert('商品添加失败，请重新添加');</script>";
                }
                $picarr=upload('Public/upload');
                //把所有的图片放到新表中，主图的路径放到主表中
                //图片入库
                foreach($picarr as $v){
                    if($v['filename']){
                        $data1['goods_id']=$res;
                        $data1['pic_name']=$v['filename'];
                        M('pic')->add($data1);
                        thumb('Public/upload'."/{$v['filename']}",800,'Public/upload'.'/800');
                        thumb('Public/upload'."/{$v['filename']}",300,'Public/upload'.'/300');
                        thumb('Public/upload'."/{$v['filename']}",50,'Public/upload'.'/50');
                    }
                }
                //添加goods_color表的信息 得出gcid  Array ( [0] => 13 [1] => 14 [2] => 15 )
                foreach($gcgoods1 as $v){
                    $gcgoods['goods_id']=$res;
                    $gcgoods['goods_color_name']=$v;
                    $gcid[]=M('goods_color')->add($gcgoods);
                }
                //添加goods_size表的信息
                foreach($gsgoods1 as $v){
                    $gsgoods['goods_id']=$res;
                    $gsgoods['goods_size_name']=$v;
                    $gsid[]=M('goods_size')->add($gsgoods);
                }
                $i=0;
                foreach($gcid as $gcid1){
                    foreach($gsid as $gsid1){
                        $gdetail[]=M('goods_detail')->add(array(
                            'goods_color_id'=>$gcid1,
                            'goods_size_id'=>$gsid1,
                            'goods_detail_sum'=>$detail_num[$i],
                            'goods_detail_price'=>$detail_price[$i],
                            'goods_id'=>$res));
                        $i++;
                    }
                }
                $data2['goods_pic']=$picarr[0]['filename'];
                $res1=M('goods')->where("goods_id=$res")->save($data2);//返回的是商品id
                if($res1){
                    echo "<script>alert('商品添加成功，请继续添加');</script>";
                }else{
                    echo "<script>alert('商品添加失败，请重新添加');</script>";
                }
            }else{
                echo "<script>alert('操作有误!');</script>";
            }

        }
        $this->display();
    }
    public function goods_edit(){
        $gid=$_GET['gid'];
        if(!$gid){
            $gid1=I('post.gid1');
            /*$res=M('goods')->where("goods_id=$gid1")->find();*/
            $goods['cate_id']=I('post.cid');
            $goods['goods_name']=I('post.goodsname');
            $goods['goods_nickname']=I('post.goods_nickname');
            $goods['goods_marketprice']=I('post.marketprice');
            $goods['goods_mobileprice']=I('post.mobileprice');
            $goods['goods_addtime']=time();
            if($goods) {
                $res1 = M('goods')->where("goods_id=$gid1")->save($goods);
                if ($res1) {
                    echo "<script>alert('修改成功!');</script>";
                    $this->res = M('goods')->where("goods_id=$gid1")->find();
                    $this->pic = M('pic')->where("goods_id=$gid1")->select();
                    $this->display();
                } else {
                    echo "<script>alert('修改失败!');</script>";
                    $this->res = M('goods')->where("goods_id=$gid1")->find();
                    $this->pic = M('pic')->where("goods_id=$gid1")->select();
                    $this->display();
                }
            }else{
                echo "<script>alert('操作有误!');</script>";
                $this->display();
            }
        } else{
            $this->res=M('goods')->where("goods_id=$gid")->find();
            $this->pic=M('pic')->where("goods_id=$gid")->select();
            $this->display();
        }
    }
}