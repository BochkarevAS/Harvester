<?php

namespace Example\Mailer;

class Harvester {

    private $pdo;

    private $smtpMailer;

    public function __construct(\PDO $pdo, SmtpInterface $smtpMailer) {
        $this->pdo = $pdo;
        $this->smtpMailer = $smtpMailer;
    }

    public function emailFriends() {
        $sql = 'SELECT * FROM users LIMIT 1';

        foreach ($this->pdo->query($sql) as $row) {
            $this->smtpMailer->sendMessage($row['email'], 'Yay!',
                sprintf(<<<EOF
                    Hi %s!
EOF
                    , $row['id']),
                'Friend@SendMoney.com'
            );
        }
    }

}