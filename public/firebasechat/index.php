<!DOCTYPE html>
<html lang="en" ng-app="sampleApp">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.6.4/firebase.js"></script>
    <script>
    // This will be generated in the firebase console
    var config = {
      apiKey: "AIzaSyCaQJIqldPHu_dAgFk8s1F3B9zU_ty7TTE",
      authDomain: "wibu-shop-f5875.firebaseapp.com",
      databaseURL: "https://wibu-shop-f5875.firebaseio.com",
      projectId: "wibu-shop-f5875",
      storageBucket: "wibu-shop-f5875.appspot.com",
      messagingSenderId: "926586751495"
    };
    firebase.initializeApp(config);

    var ref = firebase.database().ref().child('messages');

    ref.on("child_added", function(snapshot, prevChildKey) {
      var newPost = snapshot.val();
      console.log("Author: " + newPost.id);
      console.log("Title: " + newPost.level);
      console.log("Previous Post ID: " + prevChildKey);
    });
    </script>

    <script src="firebasechat/app.js"></script>
    <script src="https://cdn.firebase.com/libs/angularfire/2.2.0/angularfire.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body ng-controller="SampleCtrl">
    <br>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">test chat firebase</div>
            <div class="panel-body">
              @if( @{{m.message}} == 123)
              <a href="#"></a>
              @endif
                <p ng-repeat="m in messages"><% m.message %> - <% m.date | date:'medium' %></p>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="USER ID"  ng-model="messageId">
                    <input type="text" class="form-control" placeholder="USER Level"  ng-model="messageLevel">
                    <input type="text" class="form-control" placeholder="Message here..." ng-model="messageText">
                </div>
                <button type="submit" class="btn btn-default" ng-click="send()">Send</button>
            </div>
        </div>
    </div>

</body>
</html>
