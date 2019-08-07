<?php
require("tpl/header.php")
?>

<?php
    $key = $_POST['api'];
    $order = $_POST['order'];
    // var_dump($key);
    // var_dump($order);
    //php post数据到onenet平台 
    $api_url = 'http://api.heclouds.com/mqtt?topic=app_topic';//*****处填写自己的设备ID号
    $api_header[]="api-key:".$key; //填写自己的api-key号=EcOAc91HsQhnT70c3TlCChb1=s=
    $api_content = "$order";//向OneNET发送的数据JSON格式
    // var_dump($api_header);
    // var_dump($api_content);
    function post($url, $header, $content)
    {
    $ch= curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//TRUE-->将curl_exec()获取的信息以字符串返回，而不是直接输出。
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);  //启用时会将头文件的信息作为数据流输出
    curl_setopt($ch, CURLOPT_POST, true);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样
    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
    if(curl_error($ch) === false) //curl_error()返回当前会话最后一次错误的字符串
        {
                die("Curlerror: ".curl_error($ch));
        }
    $response = curl_exec($ch);//获取返回的文件流
    curl_close($ch);
    return $response;
    }

    
    $output = post($api_url,$api_header,$api_content);
    $output_array = json_decode($output,true);
    //print_r($output_array);
    if($output_array['errno'] == 0){
      echo("警报发送成功!");
      header("refresh:2;url='web.php'");
    } 
    else{
      echo $output_array['error'];
    }
?>

<?php
  require_once('tpl/footer.php');
?>