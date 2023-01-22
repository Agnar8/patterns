<?php
class BaseSendSms
{
    public function send()
    {
        echo "I send sms \n";
    }
}

// Add counter by send sms
class BaseSendSmsProxy extends BaseSendSms
{
    public function send()
    {
        parent::send();
        $this->incrementCounter();
    }

    private function incrementCounter()
    {
        echo "I add counter by send sms \n";
    }
}

function sendSmsClient(BaseSendSms $sendSmsObj)
{
    $sendSmsObj->send();
}

sendSmsClient(new BaseSendSms());
sendSmsClient(new BaseSendSmsProxy());