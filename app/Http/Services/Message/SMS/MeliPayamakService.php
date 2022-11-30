<?php

namespace App\Http\Services\Message\SMS;

use Illuminate\Support\Facades\Config;


class MeliPayamakService
{
    private $username;
    private $password;

    public function __construct()
    {
        $this->username = Config::get('sms.username');
        $this->password = Config::get('sms.password');
    }

    public function sendSmsSoapClient($from, array $to, $text, $isFlash = true)
    {
        //GitHub نمونه کدهای

//        $username = 'username';
//        $password = 'password';
//        $api = new MelipayamakApi($username,$password);
//        $sms = $api->sms('soap');
//        $to = '09123456789';
//        $from = '5000...';
//        $text = 'تست وب سرویس ملی پیامک';
//        $isFlash = false;
//        $smsRest->send($to,$from,$text,$isFlash);

//بدون نیاز به پکیج گیت هاب Procedural PHP نمونه کدهای

//        ini_set("soap.wsdl_cache_enabled",0);
//        $sms = new SoapClient("http://api.payamak-panel.com/post/Send.asmx?wsdl",array("encoding"=>"UTF-8"));
//        $data = array("username"=> $this->username ,
//            "password"=> $this->password,
//            "to"=>array($to),
//            "from"=>$from,
//            "text"=>$text,
//            "isflash"=>true);
//        $result = $sms->SendSimpleSMS($data)->SendSimpleSMSResult;

        // turn off the WSDL cache
        ini_set("soap.wsdl_cache_enabled","0");
        try {
            $client = new \SoapClient('http://api.payamak-panel.com/post/Send.asmx?wsdl', array('encoding' => 'UTF-8'));
            $parameters['username'] = $this->username;
            $parameters['password'] = $this->password;
            $parameters['from'] = $from;
            $parameters['to'] = $to;
            $parameters['text'] = $text;
            $parameters['isflash'] = $isFlash;
            $parameters['udh'] = "";
            $parameters['recId'] = array(0);
            $parameters['status'] = 0x0;
            $GetCreditResult = $client->GetCredit(array("username" => $this->username, "password" => $this->password))->GetCreditResult;
            $sendSmsResult = $client->SendSms($parameters)->SendSmsResult;

            if($GetCreditResult == 0 && $sendSmsResult == 1){
                return true;
            }
            else{
                return false;
            }

        } catch (\SoapFault $ex) {
            echo $ex->faultstring;
        }
    }
}
