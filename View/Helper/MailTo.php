<?php
class MailToHelper extends Helper 
{
    public function createLink($email, $subject = null, $msg = null)
    {
        if ($subject === null) {
            $subject = 'Website%20Email';
        }
        if ($msg === null) {
            $msg = 'Email';
        }
        //build the mailto link
        $unencrypted_link = '<a href="mailto:'.$email.'">'.$msg.'</a>';
        //build this for people with js turned off
        $noscript_link = '<noscript><span style="unicode-bidi:bidi-override;direction:rtl;">'.strrev($msg.' > '.$addr.' <').'</span></noscript>';
        //put them together and encrypt
        $encrypted_link = '<script type="text/javascript">Rot13.write(\''.str_rot13($unencrypted_link).'\');</script>'.$noscript_link;
        return $encrypted_link;
    }
}
