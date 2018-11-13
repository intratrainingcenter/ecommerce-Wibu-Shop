<div id="chat-pop-up" style="display: none; width: 700px;">
  <div class="product-page product-pop-up">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box-body" id="chat_conten">
          <div class="direct-chat-messages" id="chat">
            <ul id="messages_fill">
            </ul>
          </div>
        </div>
        <div class="box-footer">
          <div class="input-group message-input" uid="{{Auth::guard('pembeli')->id()}}">
            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-primary submit">Send</button>
              </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
