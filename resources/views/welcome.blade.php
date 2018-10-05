<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
        <script src="https://www.gstatic.com/firebasejs/live/3.1/firebase.js"></script>
    </head>
    <body>
        <pre id="object"></pre>
        <button type="button" name="button" onclick="writeUserData()">click</button>
        <button type="button" name="button" onclick="writeNewPost('uid', 'username', 'picture', 'title', 'body')">click</button>
    </body>

    <script src="js/app2.js" charset="utf-8"></script>
    <script type="text/javascript">
    function writeUserData() {
      firebase.database().ref('object/users3/masage/customer').set({
        text2: 'wihh',
      });
    }

    function writeNewPost(uid, username, picture, title, body) {
      // A post entry.
      var postData = {
        author: username,
        uid: uid,
        body: body,
        title: title,
        starCount: 0,
        authorPic: picture
      };

      // Get a key for a new Post.
      var newPostKey = firebase.database().ref().child('posts').push().key;

      // Write the new post's data simultaneously in the posts list and the user's post list.
      var updates = {};
      updates['/posts/' + newPostKey] = postData;
      updates['/user-posts/' + uid + '/' + newPostKey] = postData;

      return firebase.database().ref().update(updates);
    }
    </script>
</html>
