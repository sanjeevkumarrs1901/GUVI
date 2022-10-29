var app = angular.module("MyApp", []);
app.controller("UserController", function($scope, $http) {
    $scope.btnName = "Login";
     
    $scope.error = false;
    $scope.success = false;
     
    $scope.login = function() {
        if ($scope.username == null) {
            alert("Please input Username");
        } 
        else if ($scope.password == null) {
            alert("Please input Password");
        }  
        else {
            $scope.btnName = "Logging in...";
            $scope.alert = "Checking Account. Please Wait...";
             
            $http({
                method: 'POST',
                url: 'login.php',
                data:{
                        username:$scope.username, 
                        password:$scope.password
                     }
            }).then(function (data){
                console.log(data)
                if(data.error){
                    $scope.error = true;
                    $scope.success = false;
                    $scope.message = data.data.message;
                    setTimeout(function() {
                        $scope.btnName = "Login";
                        $scope.$apply();
                    }, 3000);
                }
                else{
                    $scope.success = true;
                    $scope.error = false;
                    $scope.message = data.data.message;
                    setTimeout(function()
                    {
                        $scope.username = null;
                        $scope.password = null;
                        $scope.btnName = "Login";
                        $scope.$apply();
                    }, 3000);
                    setTimeout(function() { 
                        window.location.reload();
                    }, 5000);
                }
                 
            },function (error){
                console.log(error, 'USER NAME/PASSWORD IS INCORRECT');
            });
        }
    }
});