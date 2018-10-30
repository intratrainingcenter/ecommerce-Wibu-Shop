var app = angular.module('sampleApp', ["firebase"]);

app.controller("SampleCtrl", function($scope, $firebaseArray, $location, $anchorScroll) {
  var ref = firebase.database().ref().child("messages");
  // download the data into a local object
  $scope.messages = $firebaseArray(ref);
  // putting a console.log here won't work, see below
  $scope.send = function() {
      $scope.messages.$add({
          id: '123',
          level: 'admin',
          message: $scope.messageText,
          date: Date.now()
      })
      $scope.messageText = "";
      $anchorScroll();
      $location.hash('bottom');
  }

});
