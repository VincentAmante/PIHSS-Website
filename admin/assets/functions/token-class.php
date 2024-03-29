<?php

    // Used for verifying accounts
    class Token {
        private $token;
        private $expiryDate;

        public function __construct()
        {
            $this->token = bin2hex(random_bytes(8));
            $this->expiryDate = strtotime('+1 day', time());
        }

        public function getToken(){
            return $this->token;
        }

        public function getTokenData(){
            $tokenData = (object)[
                'token' => password_hash($this->token, PASSWORD_BCRYPT),
                'expirationDate' => $this->expiryDate
            ];
            return $tokenData;
        }
    }
?>