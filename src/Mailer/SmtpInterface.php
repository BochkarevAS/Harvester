<?php

namespace Example\Mailer;

interface SmtpInterface {
    function sendMessage($recipientEmail, $subject, $message, $from);
}