 <?php
       include ("class.phpmailer.php");
        include ("conecta.php");
 
            //Campos para envio da mensagem
 
            $de = utf8_decode('Convite');
            $para = utf8_decode('atendimento@mginez.com.br');
            $assunto = utf8_decode('teste envio convite');
            
$html = (file_get_contents('conv.php'));
 
            $tabela = "contatos";
 
       // CAMPOS UTILIZADOS PARA A CONSULTA
        $campos = "id, nome, email, codstatus";
 
          // NUMERO MÃXIMO DE ENVIO
       $quant = 2;
 
            // TEMPO ENTRE UM PROCESSO DE ENVIO E OUTRO
         $seg = 5;
 
            // CONECTA COM O SERVIDOR MYSQL
          mysql_connect($host,$login,$senha);
 
            // SELECIONA O BANCO
         mysql_select_db($db);
 
            // RESGATA O VALOR DA GLOBAL INICIO
            $inicio = $_GET["inicio"];
 
            // ATRIBUI O RESULTADO DA SOMA ENTRE INICIO E QUANT
          $fim = $inicio + $quant;
 
            // VERIFICA SE FOI ATRIBUIDO VALOR A VARIAVEL "INICIO"
           if($inicio == ""){
 
            // ATRIBUI O VALOR 0 CASO NÃƒO EXISTA VALOR ATRIBUIDO
            $inicio = 0;
           }else{
 
            // ATRIBUI O VALOR DA GLOBAL INICIO CASO JA EXISTA VALOR ATRIBUIDO
            $inicio = $_GET["inicio"];
            }
 
            // EXECUTA A CONSULTA OU INFORMA UM ERRO CASO OCORRA
         $sql = mysql_query("SELECT ". $campos ." FROM ". $tabela ." WHERE codstatus = 0 LIMIT ". $inicio .",". $quant)or die(mysql_error());
 
            // VERIFICA SE AINDA EXISTEM EMAILS A SEREM ENVIADOS
           if(mysql_num_rows($sql) == 0){
 
            // ALTERANDO O VALOR DO CAMPO CODSTATUS PARA 0
            @mysql_query("UPDATE ". $tabela ." SET codStatus = 0");
 
            // INFORMO O TÃ‰RMINO DO PROCESSO
            echo "Fim do processo de envio!";
           }else{
 
            // CONTINUA EFETUANDO O ENVIO
            header("refresh:".$seg.";URL=?inicio=".$fim."");
           //echo "<meta http-equiv=\"refresh\" content=\"" . $seg . ",URL=?inicio=". $fim ."\">";
            }
 
            // CRIA O LAÃ‡O REPETITIVO
           while($r = mysql_fetch_array($sql)){
 
            // ADICIONAMOS OS PADRÃ•ES DE DESTINATRIO
            $para = $r["email"];
 
            //Criando a classe PHPMailer para envio de newsletter
 
            $mail = new PHPMailer();
			$mail->IsSMTP = ('smtp');
            $mail->Mailer = ('mail');
            $mail->SMTPSecure = 'ssl';
            
            $mail->Host = "smtp.kidbeerutabuffet.com.br"; // SMTP servers
			$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticaÃƒÂ§ÃƒÂ£o
			$mail->Port = 587;
            $mail->Username = 'contato@kidbeerutabuffet.com.br'; // SMTP username
			$mail->Password = 'Mudar123456'; // SMTP password
            $mail->Sender = ('contato@kidbeerutabuffet.com.br');
            $mail->From = ('contato@kidbeerutabuffet.com.br');
            $mail->FromName = $de;
            $mail->AddAddress ($para);
            $mail->AddReplyTo = ('contato@kidbeerutabuffet.com.br');
            $mail->Wordwrap = 50;
            $mail->Subject = ($assunto);
            $mail->IsHTML = (true);
			$result = '';

			$result .= $mail->HeaderLine("Organization" ,kidbeerutabuffet); 
			$result .= $mail->HeaderLine("Content-Transfer-encoding" , "8bit");
			$result .= $mail->HeaderLine("Message-ID" , "<".md5(uniqid(time()))."@{$_SERVER['SERVER_NAME']}>");
			$result .= $mail->HeaderLine("X-MSmail-Priority" , "Normal");
			$result .= $mail->HeaderLine("X-Mailer" , "Microsoft Office Outlook, Build 11.0.5510");
			$result .= $mail->HeaderLine("X-MimeOLE" , "Produced By Microsoft MimeOLE V6.00.2800.1441");
			$result .= $mail->HeaderLine("X-Sender" , $mail->Sender);
			$result .= $mail->HeaderLine("X-AntiAbuse" , "This is a solicited email for - ".SITE." mailing list.");
			$result .= $mail->HeaderLine("X-AntiAbuse" , "Servername - {$_SERVER['SERVER_NAME']}");
			$result .= $mail->HeaderLine("X-AntiAbuse" , $mail->Sender);
			 
            $texto = 'Ola isso Ã© um teste de envio de convite!';
 
            $mail->Body = $html;
            $mail->AltBody = $texto;
 
            if($mail->Send()){
                echo "<hr />Mensagem enviada para: ". $para ."<br />";
 
                //Altero o cÃ³digo para 1 para parar o envio do loop
 
                @mysql_query("UPDATE". $tabela ."SET codStatus = 1 WHERE id = 1".$id);
 
            } else {
                echo "Mensagem nÃ£o enviada para: ". $para ."<br />";
            }
            }
 
    ?>