var app = angular.module("MyApp", []);
app.controller("UserController", function($scope, $http) {
    $scope.message;
    $scope.sendData = function() {
            $http({
                method: 'POST',
                url: 'login.php',
                data:
                {
                   username:$scope.email, 
                   password:$scope.password
                }
            }).then(function (response){
                if(response.data.error){
                    alert("Email/Password is Incorrect!");
                    window.location="index.html";
                    $scope.message = response.data.message;
                }
                else{
                    $scope.message = response.data.message;
                    window.location="welcome.php";
                }
            });
        };
    $scope.registerData=function(){
          $http({
               method:'POST',
               url:'register.php',
               data:
               {
                   name:$scope.name,
                   username:$scope.email, 
                   password:$scope.password
               }
           }).then(function (response){
               if(response.data.error)
               {
                    alert("Email already Exist!");
               }
               else
               {
                    alert("You have Registered Successfully");
               }
               window.location="index.html";
       });
    };         
});