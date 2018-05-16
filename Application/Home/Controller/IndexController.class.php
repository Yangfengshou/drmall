<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //主页
    public function index(){
        header("Content-type: text/html; charset=utf-8");
        //php的时间是以秒算。js的时间以毫秒算
        date_default_timezone_set('PRC');
        //date_default_timezone_set("Asia/Hong_Kong");//地区
        //html 页面里面写sql语句
        //查询category表里面的各级分类
        //搜索框下面的商品   点击量
        $this->bannerArr=M('banner')->field('banner_pic')->where("banner_alive=1")->select();
        $LH="select goods_nickname,goods_id from dr_goods where goods_id in(select goods_id from dr_click)";
        $clicklist=M('')->query($LH);
        /*echo "<pre>";
        print_r($clicklist);exit;*/
        $this->assign('clicklist',$clicklist);
        //推荐商品
        //顶级分类
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        //1楼女装
        $this->catename1=M('cate')->where('cate_id=13')->select();
        $this->goodsArr1=M('goods')->where('cate_id=13')->select();
        //限时秒杀商品
        $sql="select goods_name,goods_alive,goods_price,lg.goods_id,goods_marketprice,limit_goodsprice,limit_goodspic from dr_goods g,dr_limit_goods lg where lg.goods_id=g.goods_id limit 0,10";
        $this->limitGoods=M()->query($sql);
        //print_r($catename1);

        $timestr = "2017-6-20 11:41:00";//倒计时时间
        $time = strtotime($timestr);//时间戳
        $nowtime = time();//当前时间戳
        if ($time>=$nowtime){
            $sql="update dr_goods as g,dr_limit_goods as lg set goods_alive=2 where lg.goods_id=g.goods_id";
            $alive=M()->execute($sql);//多表更新用execute
            $overtime = $time-$nowtime; //实际剩下的时间（单位/秒）

        }else{
            $overtime=0;
            $data['goods_alive']=1;
            $where="goods_alive=2";
            $alive=M('goods')->where($where)->save($data);
        }
        $this->assign('overtime',$overtime);

        $this->display();
    }
    function getWhere($where = '') {
        //
        $where = '';
        $name = isset ( $_POST ['serch'] ) ? $_POST ['serch'] : '';//
        $admin_pwd = isset ( $_POST ['admin_pwd'] ) ? $_POST ['admin_pwd'] : '';//''
        if ($name) {
            if ($where) {$where .= 'AND';}
            $where .= "(goods_name like '%$name%')";//admin_name like '%niuyize%'
        }
        if ($admin_pwd) {
            if ($where)
                $where .= 'AND';//admin_name like '%niuyize%' and
            $where .= "(admin_pwd='$admin_pwd')";//admin_name like '%niuyize%' and  admin_pwd='123456'
        }
        if (! $where){
            $where = '1=1';
        }

        return $where;//admin_name like '%niuyize%' and  admin_pwd='123456'
    }

    //搜索页面
    public function shopserch(){
        //拼接where条件
        $where = $this->getWhere ();
        //顶级分类
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        $sql="select * from dr_goods where $where";
        $res=M('')->query($sql);
        $cate_id=$res[0]['cate_id'];
        $this->cataname=M('cate')->where("cate_id=$cate_id")->field('cate_name')->find();
        //print_r($cataname);
        //分页
        $count=count($res);
        $page_num=4;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $res=array_slice($res,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('res',$res);
        $this->display();
    }
    //商城活动
    public function mallActive(){
        if($_SESSION['mid']>0 && $_SESSION['mname']){
            $mid=$_SESSION['mid'];
            //顶级分类
            $this->cateArr1=M('cate')->where('cate_pid=0')->select();
            //会员积分
            $this->data=M('vip')->where("member_id=$mid")->select();
            $this->display();
        }
        $this->display();
    }
    //积分商城
    public function shopGradeActive(){
        if($_SESSION['mid']>0 && $_SESSION['mname']){
            $mid=$_SESSION['mid'];
            //顶级分类
            $this->cateArr1=M('cate')->where('cate_pid=0')->select();
            //会员积分
            $this->data=M('vip')->where("member_id=$mid")->select();
            $this->display();
        }
        $this->display();
    }
    //品牌
    public function shopBrand(){
        //顶级分类
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        $this->display();
    }
    //热卖
    public function serchShop(){
        //顶级分类    browserecord
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        $this->display();
    }
    //服饰
    public function shopCostume(){
        $cate_id=$_GET['cate_id'];
        //服饰的二级分类和三级分类
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        $this->catename1=M('cate')->where("cate_pid=$cate_id")->select();
        $this->display();
    }
    //食品
    public function shopFood(){
        $cate_id=$_GET['cate_id'];
        //食品的二级分类和三级分类
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        $this->catename1=M('cate')->where("cate_pid=$cate_id")->select();
        $this->display();
    }
    //家用
    public function shopHouse(){
        $cate_id=$_GET['cate_id'];
        //家用的二级分类和三级分类
        $this->cateArr1=M('cate')->where('cate_pid=0')->select();
        $this->catename1=M('cate')->where("cate_pid=$cate_id")->select();
        $this->display();
    }
    public function shop_1(){
        $id=I('post.cate_id');
        $pid=I('post.cate_id');
        //查询语句  查id=4   pid=4   catename
        $this->catename=M('cate')->where("cate_id=$id")->field('cate_name')->select();
        $this->catename2=M('cate')->where("cate_pid=$pid")->select();
        $this->display();
    }
    public function shop_2(){
        //分页
        $pid1=I('post.cate_pid');
        $goodsArr=M('goods')->where("cate_id=$pid1")->select();
        $count=count($goodsArr);
        $page_num=1;
        $this->assign('page_num',$page_num);
        $this->assign('pid1',$pid1);
        $p=new \Think\Page($count,$page_num);
        $lists=array_slice($goodsArr,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('id',$pid1);
        $this->assign('lists',$lists);
        $this->display();
    }

    public function index1(){
        //不在html页面里面写sql语句   只是在html里面定义变量

        //查询category表里面的各级分类
        //顶级id
        $cateArr1=M('cateone')->where('cate_tid=0')->select();
        //二级id
        $cateArr2=M('catetwo')->select();
        //把查询到的结果  用封装的二维数组转三维数组   转换一下
        $cateArr2=getIndexCateArr($cateArr2,'cate_tid',1);
        //三级id
        $cateArr3=M('catethree')->select();
        $cateArr3=getIndexCateArr($cateArr3,'cate_sid',1);
        $this->assign('cateArr1',$cateArr1);
        $this->assign('cateArr2',$cateArr2);
        $this->assign('cateArr3',$cateArr3);
        $this->display();
    }
    public function mallActive_1()  {
        $sql = "select goods_name,goods_alive,goods_price,lg.goods_id,goods_marketprice,limit_goodsprice,limit_goodspic from dr_goods g,dr_limit_goods lg where lg.goods_id=g.goods_id limit 0,10";
        $this->limitGoods = M()->query($sql);
        $this->display();
    }
}