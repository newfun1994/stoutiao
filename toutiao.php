<?php
/**
 * Created by PhpStorm.
 * User: newfun
 * Date: 15/9/20
 * Time: 下午3:29
 */
header("Content-Type:text/html;charset=utf-8");
$key = $_GET['key'];
$title = $_GET['title'];
$detail = $_GET['detail'];
if(!$key&&!$title&&!$detail){
    $img = "img2.gif";
    $key = "高振华";
    $title = "高振华90后屌丝宅男成功赢取南大女神";
    $detail = "南京理工大学紫金学院12级计算机高振华同学，作为一个90后屌丝宅男,经过不懈的努力,终于用自己的真心打动了女神，成功赢取南大女神";
}
elseif($key=="刘放"&&!$title&&!$detail){
    $img = "img3.gif";
    $key = "刘放";
    $title = "刘放成功破解百度新闻";
    $detail = "在过去的8小时内，刘放同学彻夜未睡，经过了整整8个小时的艰苦奋斗，终于成功破解了百度新闻后台，并且实现了人人都能上头提的梦想";
}
else {
    $img = "img1.gif";

}
$url = "http://news.baidu.com/ns?word=".$key;

$str0 = "<div class=\"result\" id=\"1\">";
$str1 = "
<div class=\"result\" id=\"0\">
<h3 class=\"c-title\">
<a href=\"http://www.inewfun.com/toutiao.html\" data-click=\"{
      'f0':'77A717EA',
      'f1':'9F63F1E4',
      'f2':'4CA6DE6E',
      'f3':'54E3343F',
      't':'1442736603'
      }\" target=\"_blank\">$title</a>
      </h3>
      <div class=\"c-summary c-row c-gap-top-small\">
      <div class=\"c-span6\"><img class=\"c-img c-img6\" src=$img></div>
      <div class=\"c-span18 c-span-last\">
      <p class=\"c-author\">中国无该网&nbsp;&nbsp;3小时前</p>$detail...<span class=\"c-info\"><a href=\"http://www.inewfun.com/toutiao.html\" class=\"c-more_link\" data-click=\"{'fm':'sd'}\">2条相同新闻</a>
      &nbsp;&nbsp;-&nbsp;&nbsp;
      <a href=\"http://www.inewfun.com/toutiao.html\" data-click=\"{'fm':'sc'}\" target=\"_blank\" class=\"c-cache\">百度快照</a></span></div></div></div>
      <div class=\"result\" id=\"1\">";

$str1 = str_replace($key,"<em>".$key."</em>",$str1);
$code =  file_get_contents($url);
$code =  str_replace("百度新闻搜索_".$key,$title,$code);
$code =  str_replace($str0,$str1,$code);
echo $code;

//str_replace(目标,替换内容,源)