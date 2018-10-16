
var app = angular.module('sampleApp', ["firebase"]);

app.controller("SampleCtrl", function($scope, $firebaseArray, $location, $anchorScroll) {
  var ref = firebase.database().ref().child("messages");
  // download the data into a local object
  $location.hash('bottom');
  $anchorScroll();
  $scope.messages = $firebaseArray(ref);
  $scope.send = function() {
      $scope.messages.$add({
          id: '123',
          level: 'user',
          message: $scope.messageText,
          date: Date.now()
      })
      $scope.messageText = "";
      $anchorScroll();
      $location.hash('bottom');
  }

});
