<?php include("header.php"); ?>
<div ng-app="MyApp">
	<div ng-controller="PostsCtrl">
			<div class="jumbotron">
				<form class="form-inline">
					<div class="form-group">
						<label for="nomeRegiao">Qual o número do atendimento: </label>
						<input type="text" class="form-control"   ng-model="searchFilter"/>
					</div>
					<button ng-click="consultar()" class="btn btn-primary">Pesquisar</button>
				</form>
			</div>
			
			<ul ng-repeat="dado in dados  | filter: searchFilter" class="list-group listaTodos" id="id{{dado.id}}">
				<li class="list-group-item active"><label>Numero do Atendimento:</label> <span class="badge"> {{dado.id}} </span></li>
				<li class="list-group-item"><label>Nome Regional:</label> {{dado.nomeRegional}}</li>
				<li class="list-group-item" ><label>Secretaria:</label> {{dado.secretaria}}</li>
				<li class="list-group-item"><label>Bairro:</label> {{dado.nomeBairro}}</li>
				<li class="list-group-item"><label>Assunto:</label> {{dado.descricaoAssunto}}</li>
				<li class="list-group-item"><label>Ano Solicitação:</label> {{dado.anoSolicitacao}}</li>
				<li class="list-group-item"><label>Tipo Solicitação:</label> {{dado.descricaoTipoSolicitacao}}</li>
				<li class="list-group-item"><label>Status:</label> {{dado.descricaoStatus}}</li>
				<li class="list-group-item"><label>Data Cadastro:</label> {{dado.dataCadastro}}</li>
				<li class="list-group-item"><label>Data Previsão:</label> {{dado.dataPrevisaoResposta}}</li>
				<li class="list-group-item"><label>Data Atendimento:</label> {{dado.dataAtendimento}}</li>
				<li class="list-group-item"><label>Data Conclusão:</label> {{dado.dataConclusao}}</li>
			</ul>
			
			
			<ul  class="list-group umRegistro" id="id{{dados.id}}">
				<li class="list-group-item active"><label>Numero do Atendimento:</label> <span class="badge"> {{dados.id}} </span></li>
				<li class="list-group-item"><label>Nome Regional:</label> {{dados.nomeRegional}}</li>
				<li class="list-group-item" ><label>Secretaria:</label> {{dados.secretaria}}</li>
				<li class="list-group-item"><label>Bairro:</label> {{dados.nomeBairro}}</li>
				<li class="list-group-item"><label>Assunto:</label> {{dados.descricaoAssunto}}</li>
				<li class="list-group-item"><label>Ano Solicitação:</label> {{dados.anoSolicitacao}}</li>
				<li class="list-group-item"><label>Tipo Solicitação:</label> {{dados.descricaoTipoSolicitacao}}</li>
				<li class="list-group-item"><label>Status:</label> {{dados.descricaoStatus}}</li>
				<li class="list-group-item"><label>Data Cadastro:</label> {{dados.dataCadastro}}</li>
				<li class="list-group-item"><label>Data Previsão:</label> {{dados.dataPrevisaoResposta}}</li>
				<li class="list-group-item"><label>Data Atendimento:</label> {{dados.dataAtendimento}}</li>
				<li class="list-group-item"><label>Data Conclusão:</label> {{dados.dataConclusao}}</li>
			</ul>
			
			<button id="btnBuscarMais" class="btn btn-primary hide" ng-click="buscarMais()">BUSCAR MAIS</button>
		
	</div>
	
</div>
<?php
	include("footer.php");
?>
<script type='text/javascript'>
	var app = angular.module("MyApp", []);
	var offset = 0;
	var limite = 10;
	var urlGet = "";
	
	app.controller("PostsCtrl", function($scope, $http, $location){
		$http.defaults.headers.get = {'client_id' : 'kcrjzDgxydgi', 'Accept' : 'application/json', 'Cross-origin' : '*'};
		this.id = $location.search().id;
		
		if(this.id == undefined){
			this.params = "?offset="+offset+"&limit="+limite;//lista todos
			urlGet = 'http://api.ima.sp.gov.br/v1/atendimento/'+this.params;
			$(".umRegistro").remove();
		}else{
			urlGet = 'http://api.ima.sp.gov.br/v1/atendimento/'+this.id;
			
			$(".listaTodos").remove();
		}
		
		$scope.consultar = function(){
			$http.get(urlGet).
				success(function(data, status, headers, config) {
					$scope.dados = data;
					$("#btnBuscarMais").removeClass("hide");
				}).
				error(function(data, status, headers, config) {
					// log error
				});
		}
		
		$scope.buscarMais = function(){
			if(offset >= 0){ 
				limite += 10;
				this.consultar();
			}
		}
		
		$scope.consultar();
	});
</script>
