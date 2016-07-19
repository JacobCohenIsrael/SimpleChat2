(function()
{
	'use_strict';

	angular
		.module('app.service.chat', [])
		.factory('AppServiceChat', service);
	
	service.$inject = ['$http'];
	
	function service($http)
	{
		var chat = {
				send : function(userId, msg) {
					return $http.post('/Messages/Send',{
						userId	: userId,
						msg : msg
					});
				},
				receive : function(userId, lastSeenId) {
					return $http.post('/Messages/Receive',{
						userId	: userId,
						lastSeenId : lastSeenId
					});
				}
		};
		return chat;
	}
})();
