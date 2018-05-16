<?php
/**
 * 邮件发送函数
 */
function sendMail($to, $title, $content) {
    Vendor('PHPMailer.PHPMailerAutoload');
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->Port=465; //smtp服务器的名称（这里以QQ邮箱为例） 原始是 587    qq(465)  994说是163的
    $mail->SMTPSecure ='ssl';
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return $mail->send();
    /* if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent';
    }
    exit;
    */
}

/**
 *
 * @param string $messageContent  短信模板
 * @param string $mobile   手机号码
 * @return unknown
 */
function sendMessageHuaXin($messageContent = "null", $mobile = "null", $range_num)
{
    if ($messageContent == "null" || $mobile == "null") {
        exit("error");
    }
    ////http://sh2.cshxsp.com/smsJson.aspx?action=send&userid=&account=wa15&password=a456465&mobile=17737781096,13527576163&content=您的验证码：1234【宅客易购】&sendTime=&extno=
    $url = 'http://sh2.cshxsp.com/smsJson.aspx?action=send&userid=&account=wa15&password=a456465&mobile=' . $mobile . '&content=' . $messageContent . '&sendTime=&extno='; // 求的数据接口URL
    $params = "";

    cookie("validcode", $range_num); // 将动态验证码保存cookie中
    cookie("validcode_time", date('Y-m-d H:i:s', strtotime('+30 minutes', time()))); // 将动态验证码过期时间
    cookie("validcode_tel", $mobile); // 用户电话


    $content = http_curl($url, $params, 1);//模拟通过浏览器打开你的链接地址
    if ($content) {
        $result = json_decode($content, true);

        // 误码判断
        $error_code = $result['returnstatus'];
        if ($error_code == 'Success') {
            // 据所需读取相应数据
            $result_new['content'] = "短信已发送!"; // $result['reason'];
            $result_new['status'] = 1;
            echo json_encode($result_new);
        } else {
            $result_new['status'] = 0;
            $result_new['content'] = $error_code . ':' . $result['message'];
            echo json_encode($result_new);
        }
    }
}

/**
 * **请求接口，返回JSON数据 **@url:接口地址 **@params:传递的参数 **@ispost:是否以POST提交，默认GET
 */
function http_curl($url, $params = false, $ispost = 0)
{
    $httpInfo = array();
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {

        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }

    $response = curl_exec($ch);
    if ($response === FALSE) {
        // cho "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);

    return $response;
}
/**
 * 随机生成数位数字
 *
 * @return array 字段的分类
 * @author fyf<2014.07.31>
 */
function range_num($num)
{
    // $range_num是随机产生的$num位数字
    $single_num = range(0, 9);
    for ($i = 0; $i < $num; $i ++) {
        $arr_num[] = array_rand($single_num);
    }
    $range_num = join("", $arr_num);
    return $range_num;
}