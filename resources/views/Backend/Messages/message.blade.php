@extends('Backend.Layout.master')
@extends('Backend.Messages.additional')

@section('title', 'Messages')


@section('content')
<div class="content-wrapper" >
  <div id="frame">
  	<div id="sidepanel">
      <!-- chat list -->
  		<div id="contacts">
  			<ul id="messages_list">
          @forelse($table as $data)
  				<li class="contact" uid="{{ $data->id }}">
  					<div class="wrap">

  						<img src="{{asset('images/W.jpg')}}" alt="" />
  						<div class="meta">
  							<p class="name">{{ $data->nama_pembeli }}</p>
  							<p class="preview" uid="{{ $data->id }}" >Loading...</p>
  						</div>
  					</div>
  				</li>
          @empty
          @endforelse
  			</ul>
  		</div>
  	</div>

    <!-- Chat Box content -->
    <div class="content_message">
  		<div class="contact-profile" style="display: none;">
  			<img src="{{asset('images/W.jpg')}}" alt="" />
  			<p id="nick_user"></p>
  		</div>
  		<div class="messages">
  			<ul id="messages_fill">
          <!-- messages fill -->
  			</ul>
  		</div>
  		<div class="message-input" style="display: none;">
  			<div class="wrap">
  			<input type="text" placeholder="Write your message..."/>
  			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
  			</div>
  		</div>
  	</div>
    <div class="content_image"></div>
  </div>
</div>

@endsection
