<?php

$REPdeBASE='/public/l3dlp.net/suivi/';

echo '
<html>
<head>
		<title>L3DLP - Suivi/</title>
		<link rel="stylesheet" type="text/css" href="/.suivi/liste.css" />
		<link rel="stylesheet" type="text/css" href="/.suivi/opensans/opensans.css" />
</head>
<body>

<h1>
'.$retour.'
suivi de projets <font color="#979797">l3dlp</font>
</h1>

<div id="Contenu">
<ul>
';

$rep=dir($REPdeBASE);
$bj=0;
while($fichier=$rep->read())
        {
        $VARtabtemp[$bj]=$fichier;
        $bj++;
        }
asort($VARtabtemp);

$vaff='';
$code='';
$codeB='';
$bj=0;
while(list($c,$v)=each($VARtabtemp)) {
        if (substr($v,0,1)!='.' && $v!='..' && !empty($v)) {
		if (is_dir($REPdeBASE.'/'.$v)) {
                        echo '<li class="repertoire">';
			echo '<a href="http://suivi.l3dlp.net/'.$v.'/">';
                        echo ucfirst(str_replace('_', ' ', $v));
                        echo '</a>';
			echo '</li>';
		} else if (substr($v,strlen($v)-3,3)!='php') {
			$code.='<li class="fichierB">';
                        $code.='<a href="/'.$v.'">';
                        $code.='<b>'.$v.'</b>';
                        $code.='</a>';
                        $code.='</li>';
		}
        }
}

if ($bj<2) {
	$code=str_replace('n°1', 'principal', $code);
} else {
	echo '<br/><br/>';
}


echo '<br/><br/><br/>'.$code.'
<br/><br/></ul>
</div>

';


?>

</body>
</html>
