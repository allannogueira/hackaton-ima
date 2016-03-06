<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Portal do Cidadão</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<meta name="resource-type" content="document" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>    
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-lg-2 logo text-center">
				Portal do Cidadão
			</div>		
			<div class="col-sm-9 col-lg-10 topo text-center">
				<i class="glyphicon glyphicon-th-list"></i>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<!-- COLORS -->
				<div id="yellow">&nbsp;</div>
				<div id="green">&nbsp;</div>
				<div id="red">&nbsp;</div>
				<div id="blue">&nbsp;</div>
				<div id="lightgreen">&nbsp;</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3 col-lg-2 bgMenu hidden-xs">
					<img src="imagens/logo_portaldocidadao.jpg"/>
				<!-- LEFT MAIN MENU -->
				<nav>
						<ul>
							<li onclick="menu('atendimento')"><a href="#"><i class="glyphicon glyphicon-cog"></i> &nbsp;ATENDIMENTOS</a></li>
							<li onclick="menu('protocolo')"><a href="#"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;PROTOCOLOS</a><li>
						</ul>
				</nav>
			</div>
			<div id="maincontent" class="col-sm-9 col-lg-10">
		