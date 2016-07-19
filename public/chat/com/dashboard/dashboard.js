(function()
{
	'use strict';
	
	angular
		.module('app.com.dashboard', [])
		.directive('AppComDashboard', directive)
		.config(config);
	
	function directive() {
		return {
			scope				: {},
			restrict			: 'E',	
			controller			: ctrl,
			controllerAs		: 'vm',
			bindToController	: true,
			replace				: true,
			templateUrl			: '/chat/com/dashboard/dashboard.html'
		};
		
	};
	function ctrl() {
		console.log('Dashboard Controller');
		
		var vm = this;
	}


	config.$inject = ['$stateProvider'];
	
	function config($sp) {
		$sp
		.state('dashboard', {
			url : '/',
			template : '<app-com-dashboard></app-com-dashboard>'
		});	
	}
})();