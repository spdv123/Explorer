<?php
require("smtp.php");
// Email address verification
function isEmail($email) {
    return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
}

if($_POST) {

    $clientEmail = addslashes(trim($_POST['email']));
    $message = addslashes(trim($_POST['message']));

    $array = array('emailMessage' => '','messageMessage' => '');
    if(!isEmail($clientEmail)){
        $array['emailMessage']='Invalid email！';
    }
    if($message == ''){
        $array['messageMessage']='Invalid message！';
    }
    $array['ok']=0;
    if(isEmail($clientEmail)&& $message != '') {
        $array['ok']=1;
        // Send email
        $smtpserver = "smtp.163.com";
        $smtpserverport = 25;
        $smtpusermail = "admin@yourmail.com";
        $smtpuser = "username";
        $smtppass = "password";
        // mail theme
        $mailsubject = $clientEmail;
        // mail content
        $mailbody = $message;
        // mail format
        $mailtype = "TXT";
        // mail receiver
        $smtpemailto = $smtpusermail;

        $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
        // Send to myself
        $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
        // Send to client
        $mailsubject = "Explorer";
        $mailbody = "我们已收到您的来信，非常感谢您对我们的支持与建议！！";
        $smtpemailto = $clientEmail;
        $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
    }
    echo json_encode($array);
}

?>
