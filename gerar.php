<?php
// Define por header que ser� gerado um JPG, mas pode ser GIF e PNG, neste caso utilizaremos o JPG, se for utilizar GIF, troque por "image/jpeg", e se for PNG coloque "image/png"
header("Content-type: image/jpeg");
function normaliza($string){

        $url = $string;
        $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
        $url = trim($url, "-");
        $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
        return $url;
}


if(isset($_POST['enviar'])){
$mensagem = (wordwrap($_POST['dataniver'], 35, "\n", 1));
$nome = $_POST['nome'];
$horaini = $_POST['horaini'];
$horafim = $_POST['horaend'];

$_arquivo = normaliza($nome.$mensagem). ".jpg";
$_dir = "";
// Criamos uma imagem de 400x120 Pixels
$imagem = imagecreatefromjpeg("kidverde.jpg");
// Quando utilizamos o imagecolorallocate() pela primeira vez, ele assume essa cor como fundo da imagem, ou seja o background
$fundo = imagecolorallocate($imagem, 166, 0, 0);
// Definimos aqui a cor do Texto, lembrando que as cores s�o especificadas em padrao RBG
$texto = imagecolorallocate($imagem, 80, 40, 1);
// Com o comando imagestring() escrevemos os textos, neste comando especificamos os parametros da imagem, o tamanho da fonte que neste caso vai de 1 a 5, a posi��o X e Y, o texto, e a cor (que definimos acima)
imagettftext($imagem, 16, 0,480, 340, $texto, "font/trebucbd.ttf", $nome);
imagettftext($imagem,24, 0, 360, 190, $texto, "font/HelvNeu37ThiCon.ttf", $horaini);
imagettftext($imagem,24, 0, 480, 190, $texto, "font/HelvNeu37ThiCon.ttf", $horafim);
imagettftext($imagem, 24, 0, 390, 140, $texto, "font/HelvNeu37ThiCon.ttf", $mensagem);
// Neste caso como utlizamos o JPG, usamos o comando imagejpeg() especificando a imagem em quest�o, e a qualidade de compacta��o do JPG. Se for utilizar GIF substitua pelo comando imagegif($imagem), e se for PNG pelo imagepng($imagem)
$_dir = "convite/". $_arquivo;

		
imagejpeg( $imagem, $_dir, 80 );

// Limpamos a mem�ria utilizada
imagedestroy($imagem);


header("location:conv.php?imagem=$_dir&nome=$nome");
}
?>
