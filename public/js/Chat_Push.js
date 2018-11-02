var app = angular.module('sampleApp', ["firebase"]);

app.controller("SampleCtrl", function($scope, $firebaseArray, $location, $anchorScroll) {
  var ref = firebase.database().ref().child("messages");
  // download the data into a local object
  $location.hash('bottom');
  $anchorScroll();
  $scope.messages = $firebaseArray(ref);
  $scope.send = function(uid, level) {
      $scope.messages.$add({
          id: uid,
          level: level,
          message: $scope.messageText,
          date: Date.now()
      })

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: location.origin+"/sendToUser",
        data: {message: $scope.messageText},
        success: function (data) {
        }
      });

      $scope.messageText = "";
      $anchorScroll();
      $location.hash('bottom');

  }

});
