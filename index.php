<?php
    //Variáveis do acesso
    $APIurl = 'https://eu27.chat-api.com/instance194066/';
    $token = 'nijbp88m5fkl2w0r';
    $tgtoken = '1751981497:AAGy7H4TTk99H2Ws48lI6DNNOzyZKYnoWd8';
    //Variáveis da requisição
    $requisicaocod = file_get_contents("php://input");
    $requisicao = json_decode($requisicaocod, TRUE);
    //Variáveis relativas mensagem
    $texto = urlencode($requisicao["messages"][0]["body"]);
    $remetente = $requisicao["messages"][0]["chatId"];
    $formato = $requisicao["messages"][0]["type"];
    $legenda = urlencode($requisicao["messages"][0]["caption"]);
    $minha = $requisicao["messages"][0]["fromMe"];
    $autor = $requisicao["messages"][0]["author"];
    
    //Variável do Id dos grupos
    $arrayGrupos = array("5511948010386-1552934954@g.us"=>array("558393389126-1620470331@g.us", "558393389126-1620470301@g.us", "558399312815-1625320540@g.us"),
                         "553195121104-1601482705@g.us"=>array("558393389126-1620650187@g.us", "558393389126-1620673257@g.us"),
                         "558182315715-1594862914@g.us"=>["558393389126-1611500920@g.us"],
                         "5521976937491-1563408342@g.us"=>["558393389126-1611500945@g.us"],
			 "5522997157745-1517163020@g.us"=>array("558393389126-1620470331@g.us", "558393389126-1620470301@g.us", "558399312815-1625320540@g.us"),
			 "554896839959-1615206812@g.us"=>["558393389126-1625122250@g.us"],
			 "558581334132-1625178388@g.us"=>["558393389126-1625122357@g.us"],
			 "558393389126@c.us"=>["558399711150@c.us"],
			 "5522999380564@c.us"=>["558399711150@c.us"],
			 "5511964529689@c.us"=>["558399711150@c.us"],
			 "5521989117219@c.us"=>["558399711150@c.us"],
			 "5522998194725@c.us"=>["558399711150@c.us"],
			 "558198581691@c.us"=>["558399711150@c.us"],
			 "5521976937491@c.us"=>["558399711150@c.us"],
			 "556281937416@c.us"=>["558399711150@c.us"],
			 "554899794459-1628952770@g.us"=>["558393389126-1618434081@g.us"],
			 "554491652538@c.us"=>["558399711150@c.us"],
			 "5521964017649-1558556432@g.us"=>["558393389126-1623987517@g.us"],
			 "553196304567-1590592969@g.us"=>["558399312815-1625319700@g.us"]);
    //Variável do metodo da mensagem
    $arrayMetodo = array("chat"=>"sendMessage",
                         "image"=>"sendFile",
                         "audio"=>"sendFile",
                         "document"=>"sendFile");
    //Variável do formato da mensagem
    $arrayFormato = array("chat"=>"",
                          "image"=>"&filename=imagem.jpg&caption=",
                          "audio"=>"&filename=audio.oga",
                          "document"=>"&filename=documento.pdf");
    //Repassa mensagem
    $arrayGrupostg = array("5511948010386-1552934954@g.us"=>"-1001297128031",
			   "558393389126-1611500920@g.us"=>"-1001490650472",
			   "554896839959-1615206812@g.us"=>"-1001597606681",
			   "558588015677-1569549853@g.us"=>"-1001348969451",
			   "558393389126-1620650187@g.us"=>"-1001590598261",
			   "558393389126-1620470301@g.us"=>"-1001297128031",
			   "558393389126-1618434081@g.us"=>"-1001431044439",
			   "558393389126-1627983233@g.us"=>"-1001559980846",
			   "558581334132-1610640298@g.us"=>"-1001190771821");
    $arrayMetodotg = array("chat"=>"sendMessage",
                           "image"=>"sendPhoto",
                           "audio"=>"sendAudio",
                           "document"=>"sendDocument");
    $arrayTexto = array("chat"=>"&text=",
			"image"=>"&photo=",
			"audio"=>"&audio=",
			"document"=>"&document=");

    $arrayFormatotg = array("chat"=>"",
			    "image"=>"&caption=",
			    "audio"=>"",
			    "document"=>"&caption=");
	
	foreach($arrayGrupos[$remetente] as $contato){
    $dados = file_get_contents($APIurl.$arrayMetodo[$formato]."?token=".$token."&chatId=".$contato."&body=".$texto.$arrayFormato[$formato].$legenda);
	}
	file_get_contents("https://api.telegram.org/bot".$tgtoken."/".$arrayMetodotg[$formato]."?chat_id=".$arrayGrupostg[$remetente].$arrayTexto[$formato].$texto.$arrayFormatotg[$formato].$legenda);
    if($remetente == "556285499620-1531141213@g.us" and $autor == "553591600006@c.us"){
    	file_get_contents($APIurl.$arrayMetodo[$formato]."?token=".$token."&chatId=558399701240-1626742702@g.us"."&body=".$texto.$arrayFormato[$formato].$legenda);
    }
    if($remetente == "558399711150-1623374236@g.us" and $minha == false){
	$ch = curl_init();
	    
	curl_setopt($ch, CURLOPT_URL,"https://menurfx.herokuapp.com/index.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $requisicaocod);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);

	curl_close ($ch);
    }if($remetente == "558399711150-1625143773@g.us" and $minha == false){
	$ch = curl_init();
	    
	curl_setopt($ch, CURLOPT_URL,"https://menurfx2.herokuapp.com/index.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $requisicaocod);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);

	curl_close ($ch);
    }if($remetente == "558399711150-1629250128@g.us" and $minha == false){
	$ch = curl_init();
	    
	curl_setopt($ch, CURLOPT_URL,"https://menurfx3.herokuapp.com/index.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $requisicaocod);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);

	curl_close ($ch);
    }

?>
