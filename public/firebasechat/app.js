var app = angular.module('sampleApp', ["firebase"], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});
app.controller("SampleCtrl", function($scope, $firebaseArray) {
  var ref = firebase.database().ref().child("messages");
  // create a synchronized array
  // click on `index.html` above to see it used in the DOM!
  $scope.messages = $firebaseArray(ref);


  $scope.send = function() {
      $scope.messages.$add({
          id: $scope.messageId,
          level: $scope.messageLevel,
          message: $scope.messageText,
          date: Date.now()
      })
  }
});
