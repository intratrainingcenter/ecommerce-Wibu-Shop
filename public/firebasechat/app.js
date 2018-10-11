var app = angular.module('sampleApp', ["firebase"]);

app.controller("SampleCtrl", function($scope, $firebaseArray) {
  var ref = firebase.database().ref().child("messages");
  // download the data into a local object
  $scope.messages = $firebaseArray(ref);
  // putting a console.log here won't work, see below
  ref.on("child_added", function(snapshot, prevChildKey) {
    var newPost = snapshot.val();
    // console.log("Author: " + newPost.id);
    // console.log("Title: " + newPost.level);
    // console.log("Previous Post ID: " + prevChildKey);
    console.log(newPost);
  });
  $scope.send = function() {
      $scope.messages.$add({
          id: '123',
          level: 'admin',
          message: $scope.messageText,
          date: Date.now()
      })
      $scope.messageText = "";
  }

});
