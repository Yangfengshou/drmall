<?php
namespace Admin\Controller;
use Think\Controller;
class MallController extends Controller {
    //商城轮播图列表
    public function banner(){
        $bannerList=M('banner')->select();
        $count=count($bannerList);
        $page_num=8;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $bannerList=array_slice($bannerList,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('bannerList',$bannerList);
        $this->display();
    }
    //添加轮播图页面
    public function banner_add(){
        $this->display();
    }
    //点击添加轮播图
    public function myAdd(){
        $bannerpicName=I('post.name');
        $picarr=upload('Public/home/upload/banner');
        //把所有的图片放到新表中，主图的路径放到主表中
        //图片入库
                $data['banner_name']=$bannerpicName;
                $data['banner_pic']=$picarr[0]['filename'];
                $data['banner_addtime']=time();
                $add=M('banner')->add($data);
        if($add){
            echo "<script>alert('添加成功');</script>";
        }else{
            echo "<script>alert('添加失败');</script>";
        }

        $this->display('banner_add');
    }
    //点击启用或禁用
    public function banner_alive(){
        $bid=I('post.bid');
        $alive=I('post.alive');
        //屏蔽banner图
        if($alive==1){
            $data['banner_alive']=0;
            $save=M('banner')->where("id=$bid")->save($data);
            if($save) {
                $bannerList=M('banner')->select();
                $count=count($bannerList);
                $page_num=8;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $bannerList=array_slice($bannerList,$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('bannerList',$bannerList);
            }
            //显示banner图
        }elseif($alive==0){
            $data['banner_alive']=1;
            $save=M('banner')->where("id=$bid")->save($data);
            if($save) {
                $bannerList=M('banner')->select();
                $count=count($bannerList);
                $page_num=8;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $bannerList=array_slice($bannerList,$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('bannerList',$bannerList);
                }
            //删除banner图
        }else{
            $del=M('banner')->where("id=$bid")->delete();
            if($del){
                $bannerList=M('banner')->select();
                $count=count($bannerList);
                $page_num=8;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $bannerList=array_slice($bannerList,$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('bannerList',$bannerList);
                }
            }
            $this->display();
        }
    //修改轮播图页面
    public function banner_alter(){
        $this->display();
    }
    public function myAlter(){
        $bid=I('get.bid');
        $data['banner_name']=I('post.name');
        $data['banner_pic']=I('post.pic');
        $save=M('banner');
        $save->where("id=$bid")->save($data);
        echo "<script>alert('修改成功');</script>";
        $this->display('banner_alter');
    }
    //轮播图点击查询
    /*public function banner_select(){
        $bannerInfo=I('post.bannerInfo');
        $where="banner_name like '%$bannerInfo%' or banner_pic like '%$bannerInfo%'";
        $bannerList = M('banner')->where($where)->select();
        $count = count($bannerList);
        $page_num = 5;
        $this->assign('page_num', $page_num);
        $p = new \Think\Page($count, $page_num);
        $bannerList = array_slice($bannerList, $p->firstRow, $p->listRows);
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('bannerList', $bannerList);
        $this->display();
    }*/


}