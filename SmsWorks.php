<?php
    // $username = "test";         //�ʺ�
    // $password = "111" ;         //����
    // $mobiles  = "13939393939";  //����
    // $content  = "������Ϣ";     //���� 

$username=urlencode(trim($_REQUEST["username"]));
$password=urlencode(trim($_REQUEST["pwd"]));
$mobiles=trim($_REQUEST["mobiles"]);
//$content=urlencode(iconv( "UTF-8", "gb2312//IGNORE" , trim($_REQUEST["contents"])));
$content=urlencode(mb_convert_encoding(trim($_REQUEST["contents"]),"gb2312" , "utf-8"));

SendSms($username, $password,$mobiles, $content);
    //���Ͷ���
function SendSms($username, $password,$mobiles, $content)
{
	
     $fp=Fopen("http://api.sms1086.com/api/Send.aspx?username=$username&password=$password&mobiles=$mobiles&content=$content","r");
     $ret = fgetss($fp,255);
     echo urldecode($ret);
     Fclose($fp);
}
   //�޸�����
function ChgPwd($username, $password,$new_password)
{
  $fp=Fopen("http://api.sms1086.com/api/ChgPwd.aspx?username=$username&password=$password&newpws=$new_password","r");
     $ret = fgetss($fp,255);
     echo urldecode($ret);
     Fclose($fp);
}
  //��ѯ���
function Query($username, $password)
{
  $fp=Fopen("http://api.sms1086.com/apiQuery.aspx?username=$username&password=$password","r");
     $ret = fgetss($fp,255);
     echo urldecode($ret);
     Fclose($fp);
}
?>
