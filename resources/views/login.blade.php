<html>

<head>
    <meta charset="utf-8" http-equiv="encoding" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login | ROR</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet" />

    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);

    </style>

    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Log in to ROR</h3>
                <div class="card-text">
                    @if (session('message'))

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ session('message') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('#exampleModal').modal('toggle');

                        </script>
                    @endif
                    <form method="post" action="{{ url('login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email"
                                value="{{ old('email') }}" aria-describedby="emailHelp" required autocomplete="email"
                                autofocus />
                            {{-- @error('email')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">BISH</div> 
                          @enderror --}}
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>

                            <input type="password" class="form-control form-control-sm " id="password" name="password"
                                required autocomplete="current-password" />
                            {{-- @error('password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">BISH</div> 
                          @enderror --}}

                            {{-- <a href="changepassword" style="float: right; font-size: 12px;">Forgot password?</a> --}}
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" value="">
                            Login
                        </button>
                        <div class="sign-up">
                            New here? <a href="register">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
