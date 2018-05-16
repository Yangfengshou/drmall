<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{
    //登陆
    public function login()
    {
       session('act',$_GET['act']);
        //print_r($_SESSION['act']);
        $this->display();
    }

    //退出
    public function loginOut(){
        session("mname",null);
        session("mid",null);
        if(!$_SESSION['mname']){
            $this->success('退出成功',U('Index/index'));
        }
    }


    public function loginMy()
    {//登陆的时候走这里
        $username = I('post.username');
        $password = I('post.password');
        $password = md5($password);
        $data['member_lastloginTime'] = time();
        $res = M('member')->where("member_name='$username' and member_password='$password'")->select();//检测出来的是二维数组
        if ($res) {
            M('member')->where("member_name='$username' and member_password='$password'")->save($data);//更新最后登录的时间
            //查询本用户的userid  将userid 存session
            session('mid', $res[0]['member_id']);
            session('mname', $res[0]['member_name']);

            if($_SESSION['act']==2){
                $result['status'] = 2;
                $result['info'] = "登陆成功";
                echo json_encode($result);
                exit;
            }else{
                if($_SESSION['act']==3){
                    //这里   把session[cart]里面的信息  加入数据库
                    //如果购物车有该商品
                    $goodsInfo=$_SESSION['mycart'];
                    $mid=$_SESSION['mid'];
                    $i=0;
                     foreach($goodsInfo as $v){
                         foreach($v as $v1){
                             $res[$i]=$v1;
                             $goods_id=$res[$i]['goods_id'];
                             $goods_detail_id=$res[$i]['goods_detail_id'];
                             $where="member_id=$mid and goods_id=$goods_id and goods_detail_id=$goods_detail_id";
                             $mycart=M('cart');
                             $goods[]=$mycart->where($where)->find();
                             $i++;
                         }
                     }
                    $conut=count($goods['goods_id']);
                     if($conut>0){
                         $goodsInfo=$_SESSION['mycart'];
                         $i=0;
                         foreach($goodsInfo as $v){
                             foreach($v as $v1){
                                 $res[$i]=$v1;
                                 $buynum=$res[$i]['goods_buynum'];
                                 $goods_id=$res[$i]['goods_id'];
                                 $goods_detail_id=$res[$i]['goods_detail_id'];
                                 $where="member_id=$mid and goods_id=$goods_id and goods_detail_id=$goods_detail_id";
                                 $mycart=M('cart');
                                 $goods[]=$mycart->where($where)->find();
                                 $i++;
                                 $update['goods_buynum']=$goods[$i]['goods_buynum']+$buynum;
                                 $data1[]=M('cart')->where($where)->save($update);
                             }
                         }
                         if($data1){
                             $result['status'] = 3;
                             $result['info'] = "登陆成功";
                             echo json_encode($result);
                         }
                     }else{
                         //如果购物车没有该商品
                         $goodsInfo=$_SESSION['mycart'];
                         $mid=$_SESSION['mid'];
                         $addtime=time();
                         $i=0;
                         foreach($goodsInfo as $v){
                             foreach($v as $v1){
                                 $res[$i]=$v1;
                                 $buynum=$res[$i]['goods_buynum'];
                                 $goods_id=$res[$i]['goods_id'];
                                 $goods_detail_id=$res[$i]['goods_detail_id'];
                                 $where="member_id=$mid and goods_id=$goods_id and goods_detail_id=$goods_detail_id";
                                 $mycart=M('cart');
                                 $goods[]=$mycart->where($where)->find();
                                 if($goods[$i]['goods_buynum']){
                                     $update['goods_buynum']=$goods[$i]['goods_buynum']+$buynum;
                                     $data1[]=M('cart')->where($where)->save($update);
                                 }else{
                                     $gdetail[]=M('cart')->add(array(
                                         'goods_id'=>$res[$i]['goods_id'],
                                         'member_id'=>$mid,
                                         'goods_buynum'=>$res[$i]['goods_buynum'],
                                         'goods_addtime'=>$addtime,
                                         'goods_detail_id'=>$res[$i]['goods_detail_id']));
                                 }
                                 $i++;
                             }
                         }

                         if($gdetail){
                             $result['status'] = 3;
                             $result['info'] = "登陆成功";
                             echo json_encode($result);
                             exit;
                         }
                     }
                }else{
                    $result['status'] = 1;
                    $result['info'] = "登陆成功";
                    echo json_encode($result);
                    exit;
                }
            }

        } else {
            $result['status'] = 0;
            $result['info'] = "账号或密码有误，请重试";
            echo json_encode($result);
            exit;
        }
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    //注册
    public function register()
    {
        $this->display();
    }

    public function registerMy()
    {
        $data['member_name']=I('post.username');
        $data['member_pwd']=I('post.password');
        $data['member_password']=md5(I('post.password'));
        $data['member_lastlogine']=time();
        $data['member_registerTime']=time();
        $verify= I('post.verify');
        $res = $this->check_verify($verify, 1);
       //验证验证码：
        if (!$res) {
            $result['status'] = 0;
            $result['info'] = '验证码不正确';
            echo json_encode($result);
            exit;
        }
       //验证该用户是否存在：
        $resu = M('member')->where("member_name='{$data['member_name']}'")->select();
        if ($resu) {
            $result['status'] = 0;
            $result['info'] = '用户已存在，请重新注册!';
            echo json_encode($result);
            exit;
        } else {
            //将用户插入数据库：
            $res1 = M('member')->add($data);
            if ($res1) {
                //查询本用户的userid  将userid 存session
                session('mid', $res1['member_id']);
                session('mname', $res1['member_name']);
                $result['status'] = 1;
                $result['info'] = "注册成功";
                echo json_encode($result);
                exit;
            } else {
                $result['status'] = 0;
                $result['info'] = "注册失败";
                echo json_encode($result);
                exit;
            }
        }
    }

    //添加密保：
    public function safepwdMy(){
        $data['member_question']=I('post.question');
        $data['member_answer']=I('post.answer');
        $mid=I('post.mid');
        $res=M('member')->where("member_id=$mid")->save($data);
        if($res){
            $result['status'] = 1;
            $result['info'] = "保存成功";
            echo json_encode($result);
            exit;
        }else{
            $result['status'] = 0;
            $result['info'] = "保存失败";
            echo json_encode($result);
            exit;
        }

    }

    //找回密码(密保找回)：
    public function serchpwdMy(){
        $data['member_question']=I('post.question');
        $data['member_answer']=I('post.answer');
        $data['member_name']=I('post.username');
        $verify= I('post.verify');
        $res = $this->check_verify($verify, 1);
        //验证验证码：
        if (!$res) {
            $result['status'] = 0;
            $result['info'] = '验证码不正确';
            echo json_encode($result);
            exit;
        }
        //查找该用户：
        $resu=M('member')->where("member_name='{$data['member_name']}' and member_answer='{$data['member_answer']}' and member_question='{$data['member_question']}'")->select();
        if($resu){
            $result['status'] = 1;
            $result['info']=$resu[0]['member_pwd'];
            echo json_encode($result);
            exit;
        }else{
            $result['status'] = 0;
            $result['info']="未取得该密码！";
            echo json_encode($result);
            exit;
        }
    }

    //找回密码(邮箱找回)：
    public function mailpwd(){
        $this->display();
    }
    public function mailpwd1(){
        $answer=I('post.answer');
        $randnum=$_SESSION['randnum'];
        if($randnum==$answer){
            //跳到修改新密码页面
            $status['res']=1;
            $status['info']="验证码正确!";
            echo json_encode($status);
        }else{
            $status['res']=0;
            $status['info']="验证码不正确!";
            echo json_encode($status);
        }
    }
    public function pwd(){
        $mname=$_SESSION['member_name'];
        $pwd=I('post.pwd');
        $pwd1=I('post.pwd1');
        if($pwd){
            if($pwd==$pwd1){
                $data['member_password']=md5($pwd);
                $res=M('member')->where("member_name='$mname'")->save($data);
                if($res){
                    echo "<script>alert('修改成功')</script>";
                    $_SESSION['member_name']='';
                    $this->display('Login/login');
                }
            }else{
                echo "<script>alert('密码不一致')</script>";
                $this->display();
            }

        }else{
            $this->display();
        }
    }
    //点击发送按钮走这里
    public function addmail(){
        $mail=I('post.mail');
        $name=I('post.username');
        $num=mt_rand(1000,9999);
        session('randnum',$num);
        $member=M('member')->where("member_name='$name' and member_mail='$mail'")->find();
        session("member_name",$member['member_name']);
        if($member){
            $title="宅客易购";
            $content="尊敬的用户:".$member['member_name']."您好，你的邮箱验证码为：".$num;
            if(SendMail($mail,$title,$content)){
                $status['info']="发送成功!";
                echo json_encode($status);
            }else{
                $status['info']="发送失败!";
                echo json_encode($status);
            }
        }else{
            $status['info']="用户名或者邮箱不存在!";
            echo json_encode($status);
        }

    }


}

