<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends Controller{
    public function brand_list(){
        $brandlist=M('brand')->select();
        //分页
        $count=count($brandlist);
        $page_num=4;
        $this->assign('page_num',$page_num);
        $p=new \Think\Page($count,$page_num);
        $brandlist=array_slice($brandlist,$p->firstRow,$p->listRows);
        $page=$p->show();
        $this->assign('page',$page);
        $this->assign('brandlist',$brandlist);
        $this->display();
    }
    public function brand_serch(){
        $serch=I('post.serch');
        $sql="select * from dr_brand where brand_name like '%$serch%'";
        $brandlist=M('')->query($sql);
        if($brandlist){
            $count=count($brandlist);
            $page_num=4;
            $this->assign('page_num',$page_num);
            $p=new \Think\Page($count,$page_num);
            $brandlist=array_slice($brandlist,$p->firstRow,$p->listRows);
            $page=$p->show();
            $this->assign('page',$page);
            $this->assign('brandlist',$brandlist);
            $this->display();
        }else{
            $brandlist=M('brand')->select();
            $count=count($brandlist);
            $page_num=4;
            $this->assign('page_num',$page_num);
            $p=new \Think\Page($count,$page_num);
            $brandlist=array_slice($brandlist,$p->firstRow,$p->listRows);
            $page=$p->show();
            $this->assign('page',$page);
            $this->assign('brandlist',$brandlist);

            $this->display();
            echo "<script>layer.msg('查询失败',{icon:5});</script>";
        }
    }
    public function brand_active(){
        $brand_id=I('post.brand_id');
        $brand_active=I('post.brand_active');
        if($brand_active==0) {//goods_alive['goods_alive']==1
            $data['brand_active'] = 2;
            $res = M('brand')->where("brand_id=$brand_id")->save($data);
            if ($res) {
                $brandlist=M('brand')->select();
                //分页
                $count=count($brandlist);
                $page_num=4;
                $this->assign('page_num',$page_num);
                $p=new \Think\Page($count,$page_num);
                $brandlist=array_slice($brandlist,$p->firstRow,$p->listRows);
                $page=$p->show();
                $this->assign('page',$page);
                $this->assign('brandlist',$brandlist);
            }
        }
        $this->display();
    }
    public function brand_add(){
        $data['cate_id']=I('post.cid');
        $data['brand_name']=I('post.brandname');
        $name=I('post.brandname');
        if($data['cate_id']&&$data['brand_name']){
            $res=M('brand')->where("brand_name='$name'")->find();
            if($res){
                echo "<script>alert('该品牌已存在!');</script>";
            }else{
                if($res1=M('brand')->add($data)){
                    $picarr=upload('Public/upload');
                    //把所有的图片放到新表中，主图的路径放到主-表中
                    //图片入库
                    foreach($picarr as $v){
                        if($v['filename']){
                            thumb('Public/upload'."/{$v['filename']}",300,'Public/upload'.'/300');
                            thumb('Public/upload'."/{$v['filename']}",50,'Public/upload'.'/50');
                        }
                    }
                    $data2['brand_pic']=$picarr[0]['filename'];
                    $res2=M('brand')->where("brand_id=$res1")->save($data2);
                    if($res2){
                        echo "<script>alert('添加成功!');</script>";
                    }else{
                        echo "<script>alert('添加失败!');</script>";
                    }

                }
            }
        }
        $this->display();
    }
    public function brand_edit(){
        $bid=$_GET['bid'];
        if(!$bid){
            //print_r($bid);
            $bid1=I('post.bid1');
            $res=M('brand')->where("brand_id=$bid1")->find();
            $this->assign("res",$res);
            $data['cate_id']=I('post.cid');
            $data['brand_id']=I('post.bid1');
            $data['brand_name']=I('post.brandname');
            $picarr=upload('Public/upload');
            //把所有的图片放到新表中，主图的路径放到主-表中
            //图片入库
            foreach($picarr as $v){
                if($v['filename']){
                    thumb('Public/upload'."/{$v['filename']}",300,'Public/upload'.'/300');
                    thumb('Public/upload'."/{$v['filename']}",50,'Public/upload'.'/50');
                }
            }
            if($data['cate_id']&&$data['brand_name']){
                if($data['cate_id']==$res['cate_id']&&$data['brand_name']==$res['brand_name']&&!$picarr[0]['filename']){
                    echo "<script>alert('您没有做出修改!');</script>";
                    $this->display();
                }else{
                    if($picarr[0]['filename']==''){
                        echo "<script>alert('没有动图片!');</script>";
                        $res1=M('brand')->where("brand_id=$bid1")->save($data);
                        if($res1){
                            echo "<script>alert('修改成功!');</script>";
                            $this->res=M('brand')->where("brand_id=$bid1")->find();
                            $this->display();
                        }else{
                            echo "<script>alert('修改失败!');</script>";
                            $this->display();
                        }
                    }else{
                        echo "<script>alert('动图片了!');</script>";
                        $data['brand_pic']=$picarr[0]['filename'];
                        $res1=M('brand')->where("brand_id=$bid1")->save($data);
                        if($res1){
                            echo "<script>alert('修改成功!');</script>";
                            $this->res=M('brand')->where("brand_id=$bid1")->find();
                            $this->display();
                        }else{
                            echo "<script>alert('修改失败!');</script>";
                            $this->display();
                        }
                    }
                }
            }else{
                echo "<script>alert('操作有误!');</script>";
                $this->display();
            }
        }else{
            $this->res=M('brand')->where("brand_id=$bid")->find();
            $this->display();
        }

    }
}