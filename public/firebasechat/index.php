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
    </script>

    <script src="/firebasechat/app.js"></script>
    <script src="https://cdn.firebase.com/libs/angularfire/2.2.0/angularfire.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style media="screen">
      .content {
        height: 300px;
        overflow: scroll;
      }
    </style>

</head>
<body ng-controller="SampleCtrl">
    <br>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">test chat firebase</div>
            <div class="panel-body">
              <div class="content">
                <table>
                  <tr ng-repeat="m in messages">
                    <td style="text-align:right;">
                      <p ng-if="m.id == '123' && m.level == 'admin'">=> {{ m.message }}</p>
                    </td>
                    <td>
                      <p ng-if="m.id == '123' && m.level == 'user'">{{ m.message }} <=</p>
                    </td>
                  </tr>
                </table>
                <a id="bottom">awdwwda</a>
              </div>
              <form ng-submit="send()">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Message here..." ng-model="messageText" required>
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
</body>
</html>
