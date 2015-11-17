<!-- resources/views/auth/login.blade.php -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                @if(count($errors) > 0)
                    <strong>Whoops!</strong> The were some problems with you input.<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{url('/auth/login')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-mail</label>
                        <div class="col-dm-6">
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-dm-6">
                            <input class="form-control" type="password" name="password" id="password">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-dm-6 col-md-offset-4">
                           <div class="checkbox">
                               <input type="checkbox" name="remember"> Remember Me
                           </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-dm-6 col-md-offset-4">
                           <button class="btn btn-primary" type="submit">Login</button>
                            
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

