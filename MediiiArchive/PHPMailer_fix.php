<?php
 $mail->SMTPOptions = array(
    'ssl'=> array(
        'verify_peer'=> false,
        'verify_peer_name'=> false,
        'allow_self_signed'=> true
    )
    );

?>