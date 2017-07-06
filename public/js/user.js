'use strict';
var app = angular.module('thutor',['ngRoute']);

app.config(function($routeProvider, $locationProvider){
   
	$locationProvider.html5Mode({
	  enabled: true,
	  requireBase: false
	});

	 $locationProvider.hashPrefix('');

    $routeProvider
    .when('/', {
        templateUrl : '/usuarios',
        controller     : 'pessoaController',
    })
    .when('/telamensagens/:userId', {
        templateUrl : '/telamensagens',
        controller  : 'mensagemController'
    })
   .otherwise ({ redirectTo: '/' });
});

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
		getEndereco: function(cep){		
			return $http.get('https://viacep.com.br/ws/'+cep+'/json')
		}
	}
});

// Service
app.factory('messageService',function($http) {
	return {
		lista: function(id){			
			return $http.get('/api/mensagens/'+id);
		}
		,listaTodos: function(){			
			return $http.get('/api/mensagens/');
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

	$scope.carregaEndereco = function(data){	
		data.logradouro = '';
		data.bairro = '';
		data.uf	 = '';


		userService.getEndereco(data.cep).then(function(res){
			data.logradouro = res.data.logradouro;
			data.bairro = res.data.bairro;
			data.uf = res.data.uf;
			data.cidade = res.data.localidade;

			console.log('res');
			console.log(res);
		});		
	}	

});

// Controller
app.controller('mensagemController', function($scope,$routeParams, messageService) {


	$scope.mensagem = {'mensagem_text':'','pessoas_id':$routeParams.userId};

	$scope.listar = function(){
		messageService.lista($routeParams.userId).then(function(data){
			$scope.mensagens = data.data;
		});
	}	

	$scope.listarTodos = function(){
		console.log('abriu');
		messageService.listaTodos().then(function(data){
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