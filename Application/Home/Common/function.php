<?php

/*
 * 得到首页导航栏要用的  以上级分类/pid/为分组依据的三维数组
 * @param $pre_arr 要转化的数组
 * @param $pid_start 要转化的数组的pid起始值
 *
 *
 *
 *
 */


function getIndexCateArr($pre_arr,$pid_name,$pid_start=1){

    $a =$pid_start;
    $b =0;
    foreach($pre_arr as $k=>$v){
        if($v[$pid_name]==$a){
            $res_arr[$v[$pid_name]][$b] = $v;
            $b++;
        }else{
            $b = 0;
            $res_arr[$v[$pid_name]][$b] = $v;
            $b ++;
            $a = $v[$pid_name];
        }
    }
    return $res_arr;

}
/**将上传的文件数组统一为二维索引数组
 * @return array
 */
function getFilesArr(){
    $i=0;
    foreach($_FILES as $file){
        if(is_string($file['name'])){
            $arr[$i]=$file;
            $i++;
        }elseif(is_array($file['name'])){
            foreach($file['name'] as $k=>$v){
                $arr[$i]['name']=$file['name'][$k];
                $arr[$i]['type']=$file['type'][$k];
                $arr[$i]['tmp_name']=$file['tmp_name'][$k];
                $arr[$i]['error']=$file['error'][$k];
                $arr[$i]['size']=$file['size'][$k];
                $i++;
            }
        }
    }
    return $arr;
}
/**文件上传
 * @param string $uploadDir  上传的目录名
 * @param int $maxSize       上传文件的最大值
 * @param array $allowType   上传文件类型的范围
 * @return array
 */
function upload($uploadDir,$maxSize=1048576,$allowType=array('jpg','jpeg','png','gif')){
    //$maxSize=1048576??   字节？？  msg  什么东西  0777又是什么
    $files=getFilesArr();
    foreach($files as $k=>$file){
        $name=$file['name'];
        $size=$file['size'];
        $tmp=$file['tmp_name'];
        $error=$file['error'];
        if($error==UPLOAD_ERR_OK){
            //$maxSize=1048576;
            // $allowType=array('jpg','jpeg','png','gif');

            //判断文件是否超过大小限制
            if($size>$maxSize){
                $res[$k]['msg']='文件超过了网站要求的最大限制';
                continue;
            }
            //判断图片类型是否允许
            $fileExt=getFileExt($name);
            if(!in_array($fileExt,$allowType)){
                $res[$k]['msg']='上传的文件类型不允许';
                continue;
            }
            //验证是否为http-post方式上传
            if(!is_uploaded_file($tmp)){
                $res[$k]['msg']='文件不是以http-post方式上传';
                continue;
            }
            //创建上传目录
            // $uploadDir='./upload';
            if(!file_exists($uploadDir)){
                mkdir($uploadDir,0777,true);
                chmod($uploadDir,0777);
            }
            //生成文件名
            $filename=uniqStr().'.'.$fileExt;
            if(move_uploaded_file($tmp,$uploadDir.'./'.$filename)){
                $res[$k]['filename']= $filename;
            }
        }else{
            switch($error){
                case 1:
                    $msg='文件大小超过配置文件上传最大限制';
                    break;
                case 2:
                    $msg='文件大小超过MAX_FILE_SIZE最大限制';
                    break;
                case 3:
                    $msg='文件部分被上传';
                    break;
                case 4:
                    $msg='没有选择上传的文件';
                    break;
                case 6:
                    $msg='没有临时目录';
                    break;
                case 7:
                    $msg='临时目录没有写权限';
                    break;
                default:
                    $msg='未知错误';
            }
            $res[$k]['msg']=$msg;
        }
    }
    return $res;
}

/**
 * 缩略图
 * @param
 * @param
 * return img
 */
function thumb($src,$w,$dir='images',$delSrc=false){
//由已知图片创建图像资源
//获取大图资源
    $srcInfo=getimagesize($src);
    $srcType=image_type_to_extension($srcInfo[2],false);
    $fun='imagecreatefrom'.$srcType;
    $srcImg=$fun($src);
//创建缩略图资源
    $scale=$srcInfo[0]/$srcInfo[1];
    $h=$w/$scale;
    $thumbImg=imagecreatetruecolor($w,$h);
    imagecopyresampled($thumbImg,$srcImg,0,0,0,0,$w,$h,$srcInfo[0],$srcInfo[1]);
//输出图像到指定目录,如果目录不存在则自动创建该目录
    $output='image'.$srcType;
    if(!file_exists($dir)){
        mkdir($dir);
    }
    $output($thumbImg,$dir.'./thumb_'.$w.'_'.basename($src));
//销毁图像资源
    imagedestroy($srcImg);
    imagedestroy($thumbImg);
//删除原图
    if($delSrc){
        unlink($src);
    }
}

//获取文件扩展名
function getFileExt($filename){
    return pathinfo($filename,PATHINFO_EXTENSION);
}
//生成唯一字符串
function uniqStr(){
    return md5(uniqid(microtime(true)));
}
//生成指定长度的随机字符串
function getRandString($type=1,$length=4){
    switch($type){
        case 1:
            $str=join('',range(0,9));
            break;
        case 2:
            $str=join('',array_merge(range('a','z'),range('A','Z')));
            break;
        case 3:
            $str=join('',array_merge(range('a','z'),range('A','Z'),range(0,9)));
            break;
    }
    $str=str_shuffle($str);
    return substr($str,0,$length);
}

