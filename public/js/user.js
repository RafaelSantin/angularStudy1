'use strict';
var app = angular.module('thutor',[]);

app.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

// Service
app.factory('userService',function($http) {
	return {
		lista: function(){
			return $http.get('/api/pessoas');
		},
		cadastra: function(data){
			return $http.post('/api/pessoas', data);
		},
		edita: function(data){
			var id = data.id;
			delete data.id;
			return $http.put('/api/pessoa/'+id, data);
		},
		exclui: function(id){
			return $http.delete('/api/pessoa/'+id)
		},
		abreTelaMensagens: function(){
			window.location.assign('/telamensagens');
		}
	}
});

// Service
app.factory('messageService',function($http) {
	return {
		lista: function(){
			return $http.get('/api/mensagens');
		},
		cadastra: function(data){
			return $http.post('/api/mensagens', data);
		}
	}
});

// Controller
app.controller('pessoaController', function($scope, userService) {
	$scope.listar = function(){
		userService.lista().then(function(data){
			$scope.pessoas = data.data;
		});
	}

	$scope.editar = function(data){
		$scope.pessoa = data;
		$('#myModal').modal('show');
	}

	$scope.salvar = function(){
		if($scope.pessoa.id){
			userService.edita($scope.pessoa).then(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}else{
			userService.cadastra($scope.pessoa).then(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}
	}

	$scope.excluir = function(data){
		if(confirm("Tem certeza que deseja excluir?")){
			userService.exclui(data.id).then(function(res){
				$scope.listar();
			});
		}
	}	

	$scope.abreTelaMensagens = function(){
		console.log('lalala');
		userService.abreTelaMensagens();
	}
});

// Controller
app.controller('mensagemController', function($scope, messageService) {
	$scope.listar = function(){
		messageService.lista().then(function(data){
			$scope.mensagens = data.data;
		});
	}
	$scope.salvar = function(){		
		messageService.cadastra($scope.mensagem).then(function(res){
			$scope.listar();
			$('#myModal').modal('hide');
		});		
	}

	$scope.voltarTelaPessoas = function(){		
		window.location.assign('/');
	}
});