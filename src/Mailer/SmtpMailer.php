<?php

namespace Example\Mailer;

class SmtpMailer implements SmtpInterface {

    private $hostname;
    private $user;
    private $pass;
    private $port;

    public function __construct($hostname, $user, $pass, $port) {
        $this->hostname = $hostname;
        $this->user = $user;
        $this->pass = $pass;
        $this->port = $port;
    }

    public function sendMessage($recipientEmail, $subject, $message, $from) {
        $logPath = __DIR__ . '/../../logs/mail.log';
        $logLines = [];
        $logLines[] = sprintf(
            '[%s][%s:%s@%s:%s][From: %s][To: %s][Subject: %s]',
            date('Y-m-d H:i:s'),
            $this->user,
            $this->pass,
            $this->hostname,
            $this->port,
            $from,
            $recipientEmail,
            $subject
        );
        $logLines[] = '---------------';
        $logLines[] = $message;
        $logLines[] = '---------------';
        $fh = fopen($logPath, 'a');
        fwrite($fh, implode("\n", $logLines)."\n");
    }

}