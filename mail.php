<?php
if($_POST){
  $Name = $_POST['Name'];
  $Number = $_POST['Number'];
  //$object = $_POST['objet'];
  $Message = $_POST['Message'];
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "From: $Name <$Number>\r\nReply-to : $Name <$Number>\nX-Mailer:PHP";
  $subject="Contact depuis mon site";
  $destinataire="symody119@gmail.com";
  $body="$Message";
  if(mail($destinataire,$subject,$body,$headers)) {
    $response['status'] = 'success';
    $response['msg'] = 'Message envoyé';
  } else {
    $response['status'] = 'error';
    $response['msg'] = 'echec envoi';
  }
  echo json_encode($response);
}
?>