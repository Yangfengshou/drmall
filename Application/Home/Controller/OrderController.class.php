<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    //我的订单页面
    public function myorder(){
        if($_SESSION['mname']&&$_SESSION['mid']){
            $this->display();
        }else{
            $this->display('Login/login');
        }
    }
    //创建订单
    public function orderGoodsGrade(){
        $act=$_GET['act'];
        $member_id=$_SESSION['mid'];
        $order_addtime=$_SESSION['order_addtime'];
        //有总价的时候购买的
        if($act==1){
            $sql="select * from dr_order as o,dr_order_goods as og,dr_goods_color as gc,dr_goods_size as gs,dr_goods as g,dr_goods_detail as gd where o.goods_detail_id=gd.goods_detail_id and o.order_id=og.order_id and og.goods_color_id=gc.goods_color_id and og.goods_size_id=gs.goods_size_id and og.goods_id=g.goods_id and o.member_id=$member_id and o.order_addtime='$order_addtime'";
            $res=M()->query($sql);
            $this->assign('res',$res);
            $sum="";
            foreach($res as $k=>$v){
              $sum+=$v['goods_detail_price']*$v['goods_buynum'];
            }
            $this->sum=$sum;
            $this->site=M('site')->where("member_id=$member_id")->select();
        }else{
            $gcid=$_SESSION['gcid'];
            $gsid=$_SESSION['gsid'];
            session('gid',$_POST['gid']);
            if($_SESSION['mname']&&$_SESSION['mid']>0){
                $data['order_number']=date('Ymd').substr(uniqStr(),0,10);
                $data['member_id']=$_SESSION['mid'];//用户id
                $data['order_price']=$_POST['price']*$_POST['buynum'];//总价
                $good_id=M('goods')->where("goods_id={$_POST['gid']}")->select();
                $data['goods_price']=$good_id[0]['goods_id'];//商品单价
                $data['order_addtime']=time();     /* session('order_addtime',$data['order_addtime']);*/
                $goods_detail_id=M('goods_detail')->where("goods_color_id='{$gcid}' and goods_size_id='{$gsid}'")->select();
                $data['goods_detail_id']=$goods_detail_id[0]['goods_detail_id'];
                $res=M('order')->add($data);//返回的是插入数据后的id   就是order_id
                if($res){
                $color=M('goods_color')->where("goods_color_id={$gcid}")->select();
                $size=M('goods_size')->where("goods_size_id={$gsid}")->select();
                    $order['order_id']=$res;
                    $order['goods_size_id']=$size[0]['goods_size_id'];
                    $order['goods_color_id']=$color[0]['goods_color_id'];
                    $order['goods_id']=$_POST['gid'];
                    $order['order_goods_addtime']=$data['order_addtime'];
                    $order['goods_buynum']=$_POST['buynum'];
                    M('order_goods')->add($order);
                }
                $sql="select * from dr_order as o,dr_order_goods as og,dr_goods_color as gc,dr_goods_size as gs,dr_goods as g,dr_goods_detail as gd where o.goods_detail_id=gd.goods_detail_id and o.order_id=og.order_id and og.goods_color_id=gc.goods_color_id and og.goods_size_id=gs.goods_size_id and og.goods_id=g.goods_id and o.member_id={$_SESSION['mid']} and o.order_id=$res";
                $res=M()->query($sql);
                $this->assign('res',$res);
                //算总价：
                $sum="";
                foreach($res as $k=>$v){
                    $sum=$v['goods_detail_price']*$v['goods_buynum'];
                }
                $this->sum=$sum;
            }else{
                session('gid',$_POST['gid']);
                session('act',2);
                $this->display('Login/login');
            }
        }
        $this->site=M('site')->where("member_id=$member_id")->select();
        $this->display();
    }

    public function topay(){
        $goods[0]=$_POST;
        $goods1['order_addtime']=time();
        session('order_addtime',$goods1['order_addtime']);
        foreach ($goods[0] as $k=>$v){
            foreach($v as $k1=>$v1)
                $result[$k1][$k]=$v1;
        }
        foreach($result as $key=>$val){
            $goods_id=$val['hobby'];
            session('goods_id',$goods_id);
            if($goods_id){
                $res=M('goods')->where("goods_id={$goods_id}")->select();
                $goods1['goods_price']=$res[0]['goods_price'];
                $goods1['member_id']=$_SESSION['mid'];
                $goods1['order_price']=$val['goods_price']*$val['buynum'];
                $goods1['goods_id']=$val['hobby'];
                $goods1['goods_detail_id']=$val['goods_detail_id'];
                $goods1['order_number']=date('Ymd').substr(uniqStr(),0,10);
                $res_id=M('order')->add($goods1);
                $where="goods_id=$goods_id and goods_detail_id='{$goods1['goods_detail_id']}'";
                M('cart')->where($where)->delete();
                if($res){
                    $order['order_id']=$res_id;
                    $order['goods_id']=$goods_id;
                    $order['order_goods_addtime']=time();
                    $order['goods_buynum']=$val['buynum'];
                    $res=M('goods_detail')->where("goods_id=$goods_id and goods_detail_id={$val['goods_detail_id']}")->select();
                    $order['goods_color_id']=$res[0]['goods_color_id'];
                    $order['goods_size_id']=$res[0]['goods_size_id'];
                    $order['goods_buynum']=$val['buynum'];
                    M('order_goods')->add($order);
                }
            }
        }
    }


    //支付页面
    public function pay(){
        $sid=I('post.site_id');
        session('site_id',$sid);
        $this->display();
    }
    //支付成功页面
    public function paySuccess(){
        $mid=$_SESSION['mid'];//4
        $order_time=$_SESSION['order_addtime'];//1497886509
    /*    print_r($_SESSION);
        exit;*/
        $gid=$_SESSION['goods_id'];//1
        $FinishTime=time();
        $data['order_finishtime']=$FinishTime;//int(1497940518)
        $res=M('order')->where("order_addtime='$order_time'")->save($data);
        if($res){
            echo "<script>alert(321);</script>";
            $sql="SELECT * from dr_order as o, dr_order_goods as og,dr_goods_color as gc,dr_goods_size as gs,dr_goods as g where o.order_addtime=og.order_goods_addtime and o.member_id=$mid and g.goods_id=$gid and og.goods_color_id=gc.goods_color_id and og.goods_size_id=gs.goods_size_id and o.order_finishtime='$FinishTime' and og.order_id=o.order_id";
            $orderInfo=M('')->query($sql);

            /*d单价 不要写了
                foreach($orderInfo as $val){
                $goods_detail_id=$val['goods_detail_id'];
                $detail[]=M('goods_detail')->where("goods_detail_id='$goods_detail_id'")->select();
            }
            $this->assign('detail',$detail);*/


            $this->assign("orderInfo",$orderInfo);
            $sid=$_SESSION['site_id'];
            $this->site=M('site')->where("member_id=$mid and site_id='$sid'")->find();
           //$site=M('site')->where("member_id=$mid and site_id='$sid'")->select();
           /* print_r($site);
            exit;*/
            $this->display();
            session($order_time,null);
            session($gid,null);
        }else{
            echo "<script>alert(123);</script>";
        }

    }



    /**
     * 登录操作
     *
     * @author xd<20100721>
     */
    public function login()
    {
        // 发送验证码//点击发送短信验证码
        if ($_POST[sendSms] == 1) {

            $range_num = range_num(4);//生成4位随机数


            $tel = $_POST[username];//前台提交过来的电话号码
            $messageContent = "您的验证码：" . $range_num . "【宅客易购】";
            sendMessageHuaXin($messageContent, $tel,$range_num);
            //生成的4位随机数存到session里
            session("range_num","$range_num");
            exit();
        }
        //点击登陆按钮
        if ($_POST['dosubmit']==1) {
            $this->Exec_Login();
        }
    }
    /*
     * 处理用户登录操作 @param @return @author fyf 20150619
     */
    function Exec_Login()
    {

        // 验证验证码
        if ($_POST['yanzhengma'] && $_SESSION['range_num']) {
            if ($_POST['yanzhengma'] != $_SESSION['range_num']) {
                $yanzhengma=$_SESSION['range_num'];
                $result[status] = 0;
                $result[content] = "短信验证码不正确";//
                echo json_encode($result);
                exit();
            }else{
                $yanzhengma=$_SESSION['range_num'];
                $result[status] = 1;
                $result[content] = "支付成功";//!
                echo json_encode($result);
                exit();
            }
//http://sh2.cshxsp.com/smsJson.aspx?action=send&userid=&account=wa15&password=a456465&mobile=17737781096,13527576163&content=您的验证码：1234【宅客易购】&sendTime=&extno=
//'http://sh2.cshxsp.com/smsJson.aspx?action=send&userid=&account=wa15&password=a456465&mobile=' . 17737781096 . '&content=' . 您的验证码：1234【宅客易购】 . '&sendTime=&extno='
            //查找用户和密码是否正确

        }else{
            $result[status] = 0;
            $result[content] = "请重新获取手机验证码!";
            echo json_encode($result);
            exit();
        }
    }

    public function order(){
        $this->display();
    }

}