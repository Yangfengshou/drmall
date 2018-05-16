<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function loginMy()
    {
        $config = array(
            'fontSize' => 18, //验证码字体大小
            'length' => 4,// 验证码位数
            'useNoise' => true, // 关闭验证码杂点
        );
        $verify = new \Think\Verify($config);
        $verify->entry($_GET['id']);
    }
}
