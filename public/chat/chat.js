(function()
{
	'use_strict';
	
	angular
		.module('app.chat',
		[
		 	// Angular Dependencies
		 	'ui.router',
		 	'ngAnimate',
		 	'ui.bootstrap',
		 	
		 	// Components
		 	'chat.com',
			// Services
		 	'app.service'
		])
		.controller('chatController', chatController)
		.config(config);
	
	chatController.$inject = ['$scope', 'AppServiceChat', '$interval'];
	
	function chatController($scope, ChatService, $interval) {
		console.log('Chat Controller');
		$scope.user = {
			id : Date.now() % 1000,
			lastSeenId : 0
		};
		$scope.messages = [];
		
		$interval(function() {
			ChatService.receive($scope.user.id, $scope.user.lastSeenId).success(function(response){
				if (response.newLastSeenId) {
					$scope.user.lastSeenId = response.newLastSeenId
				}
				for (var i=0; i<response.messages.length; i++){
				    $scope.messages.push(response.messages[i]);
				}
			}).error(errorHandler);
		}, 1000);
		
		$scope.send = function() {
			ChatService.send($scope.user.id, $scope.user.msg).success(function(response) {
				$scope.user.msg = '';
			}).error(errorHandler);
		}
		
		function errorHandler(err) {
			console.log(err);
		}
	}
	
	config.$inject = ['$urlRouterProvider'];
	
	function config($urlProvider) {
		$urlProvider.otherwise('/');
	}
})();
		