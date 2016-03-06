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
				<li class="list-group-item active"><label>Nome da Região:</label> {{dado.nomeRegiao}}  <span class="badge"> {{dado.id}} </span></li>
				<li class="list-group-item"><label>Nome do Bairro</label> {{dado.nomeBairro}}</li>
				<li class="list-group-item"><label>Secretaria Expediente</label> {{dado.secretariaExpediente}}</li>
				<li class="list-group-item"><label>Sigla Expediente</label> {{dado.siglaExpediente}}</li>
				<li class="list-group-item"><label>Assunto</label> {{dado.descricaoAssunto}}</li>
				<li class="list-group-item"><label>Ano Processo</label> {{dado.anoProcesso}}</li>
				<li class="list-group-item"><label>Ponto Cadastrado</label> {{dado.nomePontoCadastramento}}</li>
				<li class="list-group-item"><label>Data Cadastro</label> {{dado.dataCadastro}}</li>
				<li class="list-group-item"><label>Data Atendimento</label> {{dado.dataAtendimento}}</li>
				<li class="list-group-item"><label>Data Cancelamento</label> {{dado.dataCancelamento}}</li>
			</ul>
			
			<ul  class="list-group umRegistro" id="id{{dados.id}}">
				<li class="list-group-item active"><label>Nome da Região:</label> {{dados.nomeRegiao}}  <span class="badge"> {{dados.id}} </span></li>
				<li class="list-group-item"><label>Nome do Bairro</label> {{dados.nomeBairro}}</li>
				<li class="list-group-item"><label>Secretaria Expediente</label> {{dados.secretariaExpediente}}</li>
				<li class="list-group-item"><label>Sigla Expediente</label> {{dados.siglaExpediente}}</li>
				<li class="list-group-item"><label>Assunto</label> {{dados.descricaoAssunto}}</li>
				<li class="list-group-item"><label>Ano Processo</label> {{dados.anoProcesso}}</li>
				<li class="list-group-item"><label>Ponto Cadastrado</label> {{dados.nomePontoCadastramento}}</li>
				<li class="list-group-item"><label>Data Cadastro</label> {{dados.dataCadastro}}</li>
				<li class="list-group-item"><label>Data Atendimento</label> {{dados.dataAtendimento}}</li>
				<li class="list-group-item"><label>Data Cancelamento</label> {{dados.dataCancelamento}}</li>
			</ul>
			
			<button id="btnBuscarMais" class="btn btn-primary hide" ng-click="buscarMais()">BUSCAR MAIS</button>
		</div>
</div>

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
			urlGet = 'http://api.ima.sp.gov.br/v1/protocolo/'+this.params;
			$(".umRegistro").remove();
		}else{
			urlGet = 'http://api.ima.sp.gov.br/v1/protocolo/'+this.id;
			
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
		alert("ok");
			if(offset >= 0){ 
				limite += 10;
				this.consultar();
			}
		}
		
		$scope.consultar();
	});
</script>
<?php include("footer.php"); ?>