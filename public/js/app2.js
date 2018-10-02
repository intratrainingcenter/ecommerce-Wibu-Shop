(function() {
  var config = {
    apiKey: "AIzaSyCaQJIqldPHu_dAgFk8s1F3B9zU_ty7TTE",
    authDomain: "wibu-shop-f5875.firebaseapp.com",
    databaseURL: "https://wibu-shop-f5875.firebaseio.com",
    projectId: "wibu-shop-f5875",
    storageBucket: "wibu-shop-f5875.appspot.com",
    messagingSenderId: "926586751495"
  };
  firebase.initializeApp(config);

  const preObject = document.getElementById('test');

  const dbRefObject = firebase.database().ref().child('test');

  dbRefObject.on('value', snap => console.log(snap.val()));



}());
