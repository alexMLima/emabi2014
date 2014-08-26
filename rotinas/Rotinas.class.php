<?

Class Rotinas {

    function encrypt($str) {
        $key = "wewillrockyoumanin2012";
        for ($i = 0; $i < strlen($str); $i++) {
            $char = substr($str, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result.=$char;
        }
        return base64_encode($result);
    }

    function decrypt($str) {
        $str = base64_decode($str);
        $result = '';
        $key = "wewillrockyoumanin2012";
        for ($i = 0; $i < strlen($str); $i++) {
            $char = substr($str, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result.=$char;
        }
        return $result;
    }

    public function sendMailNoAuth($para, $de, $mensagem, $assunto, $nome) {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $nome . ' <' . $para . '>' . "\r\n";
        $headers .= 'From: COBEQ-IC 2011 <' . $de . '>' . "\r\n";
        $headers .= 'Cc: ' . $de . "\r\n";

        // Mail it
        return mail($para, $assunto, $mensagem, $headers);
    }

    public function sendMailAuth($para, $de, $mensagem, $assunto, $nome) {
        //DADOS SMTP
        $smtp = "webmail.deq.uem.br";
        $usuario = "cobec-ic2011@deq.uem.br";
        $senha = "dequem2011";

        require_once './smtp/smtp.php';

        $mail = new SMTP;
        $mail->Delivery('relay');
        $mail->Relay($smtp, $usuario, $senha, 25, 'login', false);
        $mail->TimeOut(10);
        $mail->Priority('high');
        $mail->From($de, 'COBEQ-IC 2011');
        $mail->AddTo($para, $nome);
        $mail->Html($mensagem);

        if ($mail->Send(utf8_decode($assunto)))
            return true;
        else
            return false;
    }

}

?>