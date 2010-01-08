<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php
if(array_key_exists('header', $this->data)) {
	echo $this->data['header'];
} else {
	echo 'simpleSAMLphp';
}
?></title>

	<link rel="stylesheet" type="text/css" href="/<?php echo $this->data['baseurlpath']; ?>resources/default.css" />
	<link rel="icon" type="image/icon" href="/<?php echo $this->data['baseurlpath']; ?>resources/icons/favicon.ico" />
</head>
<body>

<div id="wrap">
	
	<div id="header">
		<h1><a style="text-decoration: none; color: white" href="/<?php echo $this->data['baseurlpath']; ?>"><?php 
			echo (isset($this->data['header']) ? $this->data['header'] : 'simpleSAMLphp'); 
		?></a></h1>
		<div id="poweredby">
			<a href="/<?php echo $this->data['baseurlpath']; ?>">
			<img src="/<?php echo $this->data['baseurlpath']; ?>resources/icons/<?php 
				echo (isset($this->data['icon']) ? $this->data['icon'] : 'compass_l.png'); 
			?>" alt="Header icon" /></a></div>
	</div>
	
<?php 

$languages = $this->getLanguageList();
$langnames = array(
	'no' => 'Bokmål',
	'nn' => 'Nynorsk',
	'en' => 'English',
	'de' => 'Deutsch',
	'dk' => 'Dansk',
	'es' => 'Español',
	'fr' => 'Français',
	'nl' => 'Dutch',
	'lu' => 'Luxembourgish',
);

if (empty($_POST) ) {
	$textarray = array();
	foreach ($languages AS $lang => $current) {
		if ($current) {
			$textarray[] = $langnames[$lang];
		} else {
			$textarray[] = '<a href="' . htmlspecialchars(SimpleSAML_Utilities::addURLparameter(SimpleSAML_Utilities::selfURL(), 'language=' . $lang)) . '">' . 
				$langnames[$lang] . '</a>';
		}
	}
	echo join(' | ', $textarray);
}

?>