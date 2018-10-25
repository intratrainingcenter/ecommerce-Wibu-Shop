@extends('Backend.Layout.master')
@extends('Backend.Messages.additional')

@section('title', 'Messages')


@section('content')
<div class="content-wrapper">
  <div id="frame">
  	<div id="sidepanel">
  		<div id="profile">
  			<div class="wrap">
  				<img id="profile-img" src="{{asset('images/W.jpg')}}" class="online" alt="" />
  				<p>Mike Ross</p>
  				<div id="status-options">
  					<ul>
  						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
  						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
  						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
  						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
  					</ul>
  				</div>
  			</div>
  		</div>
  		<div id="search">
  			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
  			<input type="text" placeholder="Search contacts..." />
  		</div>
      <!-- chat list -->
  		<div id="contacts">
  			<ul>
  				<li class="contact">
  					<div class="wrap">
  						<img src="{{asset('images/Y.png')}}" alt="" />
  						<div class="meta">
  							<p class="name">Louis Litt</p>
  							<p class="preview">You just got LITT up, Mike.</p>
  						</div>
  					</div>
  				</li>
  				<li class="contact active">
  					<div class="wrap">
  						<span class="contact-status busy"></span>
  						<img src="{{asset('images/V.jpg')}}" alt="" />
  						<div class="meta">
  							<p class="name">Harvey Specter</p>
  							<p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
  						</div>
  					</div>
  				</li>
  			</ul>
  		</div>
  	</div>

    <!-- Chat Box content -->
  	<div class="content">
  		<div class="contact-profile">
  			<img src="{{asset('images/V.jpg')}}" alt="" />
  			<p>NAME USER CHAT</p>
  		</div>
  		<div class="messages">
  			<ul>
  				<li class="sent">
  					<img src="{{asset('images/W.jpg')}}" alt="" />
  					<p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
  				</li>
  				<li class="replies">
  					<img src="{{asset('images/V.jpg')}}" alt="" />
  					<p>When you're backed against the wall, break the god damn thing down.</p>
  				</li>
  			</ul>
  		</div>
  		<div class="message-input">
  			<div class="wrap">
  			<input type="text" placeholder="Write your message..."/>
  			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
  			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
  			</div>
  		</div>
  	</div>
  </div>
</div>

@endsection
