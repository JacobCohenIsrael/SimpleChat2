(function()
{
	'use strict';
	
	angular
		.module('chat.com.header', [])
		.directive('AppComHeader', directive);
	
	function directive() {
		return {
			scope				: {},
			restrict			: 'E',	
			controller			: ctrl,
			controllerAs		: 'vm',
			bindToController	: true,
			replace				: true,
			templateUrl			: '/chat/com/header/header.html'
		};
		
	};
	
	function ctrl() {
		console.log('Header Controller');
		var vm = this;
		
	}
})();