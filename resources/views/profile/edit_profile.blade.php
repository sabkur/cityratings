@extends ('template')
@section('content')
<div class="container-content">
<div class="content">
			<div class="section2">
				Form Edit Profile
				<hr width="100%">
			</div>
			<div class="container">
				@foreach ($admin as $admins)
					<form action="/edit_profile/{{ $admins->id }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="id" value="{{ $admins->id }}">
							<label>Username :</label>
							<input style="width: 30%;" name="username" onFocus="return konfirmasi_profile()" value="{{ $admins->username }}">
							<br><br>
							<label>Password :&nbsp;</label>
							<input  style="width: 30%;" name="password" onFocus="return konfirmasi_profile()" value="{{ $admins->password }}" type="password">
							<div class="menu-button">
							<ul>
								<li><button type="submit" name="submit">Update</button>
								</li>
								<li><button type="reset" onclick="return confirm('Anda yakin ingin mereset data ini?')">Reset</button> 
								</li>
							</ul>
						</div>
					</form>
				@endforeach	
			</div>
		</div>
</div>
@endsection