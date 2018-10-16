<div id="chat-pop-up" style="display: none; width: 700px;">
  <div class="product-page product-pop-up">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="box-body" id="chat_conten">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages" id="chat">
            <div class="top">
              <ul ng-repeat="m in messages">
                <!-- Message to the right -->
                <div class="direct-chat-msg right" ng-if="m.id == '123' && m.level == 'user'">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp pull-left"><p>@{{ m.date | date:'medium' }}</p></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="{{asset('template/dist/img/user3-128x128.jpg')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <p>@{{ m.message }}</p>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message. Default to the left -->
                <div class="direct-chat-msg" ng-if="m.id == '123' && m.level == 'admin'">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp pull-right"><p>@{{ m.date | date:'medium' }}</p></p></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="{{asset('template/dist/img/user1-128x128.jpg')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <p>@{{ m.message }}</p>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </ul>
            </div>
            <div class="bottom" style="padding-top: 50px;">
              <a id="bottom" >123</a>
            </div>
          </div>
          <!--/.direct-chat-messages-->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <form ng-submit="send()">
            <div class="input-group" id="send">
              <input type="text" name="message" placeholder="Type Message ..." class="form-control" ng-model="messageText" required>
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary">Send</button>
                </span>
            </div>
          </form>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
  </div>
</div>
