var app = angular.module('sampleApp', ["firebase"]);
// app.controller("SampleCtrl", function($scope, $firebaseArray) {
//   var ref = firebase.database().ref().child("messages");
//   // create a synchronized array
//   // click on `index.html` above to see it used in the DOM!
//   $scope.messages = $firebaseArray(ref);
// });
app.controller("SampleCtrl", function($scope, $firebaseArray) {
  var ref = firebase.database().ref().child("messages");
  // download the data into a local object
  $scope.messages = $firebaseArray(ref);
  // putting a console.log here won't work, see below
});
