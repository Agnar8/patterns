<?php
interface SendSms
{
    public function send();
}

class BaseSendSms implements SendSms
{
    public function send()
    {
        echo "I send sms \n";
    }
}

// Add counter by send sms
class BaseSendSmsProxy implements SendSms
{
    public function send()
    {
        (new BaseSendSms())->send();
        $this->incrementCounter();
    }

    private function incrementCounter()
    {
        echo "I add counter by send sms \n";
    }
}

function sendSmsClient(SendSms $sendSmsObj)
{
    $sendSmsObj->send();
}

sendSmsClient(new BaseSendSms());
sendSmsClient(new BaseSendSmsProxy());