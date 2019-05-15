<?php

class MailSender {

    /**
     * Method to send email.
     *
     * @param $to
     * @param $from
     * @param $subject
     * @param $message
     * @return bool
     */
    function send_mail($to, $from, $subject, $message) {
        $headers = $from . "\r\n";
        return mail($to, $subject, $this->prepare_message($message), $headers);
    }

    /**
     * Method to prepare message.
     *
     * @param string $message
     * @return string
     */
    protected function prepare_message(string $message) {
        $message = wordwrap($message, 70, "\r\n");
        $message = htmlspecialchars($message);
        return $message;
    }
}
