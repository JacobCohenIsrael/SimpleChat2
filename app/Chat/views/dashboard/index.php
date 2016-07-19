<!DOCTYPE html>
<html lang="en" ng-app="app.chat">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chat</title>
		<script src="/com/jquery/dist/jquery.min.js?v=1"></script>
		<script src="/com/angular/angular.min.js?v=1"></script>
		<script src="/com/angular-ui-router/release/angular-ui-router.min.js?v=1"></script>
		<script src="/com/bootstrap/dist/js/bootstrap.min.js?v=1"></script>
		<script src="/com/angular-bootstrap/ui-bootstrap.min.js?v=1"></script>
		<script src="/com/angular-bootstrap/ui-bootstrap-tpls.min.js?v=1"></script>
		<script src="/com/angular-animate/angular-animate.min.js?v=1"></script>
		<link rel="stylesheet" type="text/css" href="/com/bootstrap/dist/css/bootstrap.min.css?v=1">
		<link rel="stylesheet" type="text/css" href="/chat/chat.css?v=5">
	</head>
	<body>
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-md-12">
    				<div ng-controller="chatController">
    				    <h1>Hello User {{user.id}}</h1>
    				    <table class="table">
    				        <tr>
    				            <th>User</th>
    				            <th>Message</th>
    				            <th>Sent At</th>
    				        </tr>
    				        <tr ng-repeat="message in messages">
    				            <td>User {{message.user_id}}</td>
    				            <td>{{message.message}}</td>
    				            <td>{{message.created_at}}</td>
    				        </tr>
    				    </table>
        				<input type="text" ng-model="user.msg">
        				<button ng-click="send()">Send</button>
    				</div>
				    <div ui-view="">
			 
			    	</div>
				</div>
			</div>
		</div>
		<script src="/scripts.js"></script>
	</body>
</html>