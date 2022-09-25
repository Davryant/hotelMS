<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Hotel Pack</title>

    <!-- vendor css -->
    <link href="/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center mg-b-20 tx-24 tx-bold tx-inverse">Beaco <span class="tx-info tx-normal">Resort</span></div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Enter Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            </div><!-- form-group -->
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><!-- form-group -->

            {{-- <div class="form-group">
                <label class="ckbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Checkbox Unchecked</span>
                  </label>

            </div> --}}
              <button type="submit" class="btn btn-info btn-block">Login</button>
        </form>

        <div class="mg-t-40 tx-center">Hotel Pack <a href="" class="tx-info">V 1.02 Alpha</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="/lib/jquery/jquery.js"></script>
    <script src="/lib/popper.js/popper.js"></script>
    <script src="/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
