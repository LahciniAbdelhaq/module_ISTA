<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    @include('layouts.header_links')
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <title>Register</title>
</head>
<body class="mask bg-image gradient-custom-3" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> 
    <section class="vh-100">
  <div class="mask d-flex align-items-center h-100 ">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body">
              <h2 class="text-uppercase text-center mb-2">Create an account</h2>

              <form>

                <div class="form-outline mb-2">
                    <label class="form-label" for="form3Example1cg">Your Name</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-2">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="passwordInput">Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                      </div>
                      <input type="password" id="passwordInput" class="form-control form-control-lg" >
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                          <i class="fas fa-eye"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-5">
                    <label class="form-label" for="passworconfirm">Repeat your password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                      </div>
                      <input type="password" id="passworconfirm" class="form-control form-control-lg">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                          <i class="fas fa-eye"></i>
                        </button>
                      </div>
                    </div>
                  </div> 
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('layouts.footerjs')
<script>
    $(document).ready(function() {
      $('#togglePassword').click(function() {
        const passwordInput = $('#passwordInput');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#togglePasswordConfirm').click(function() {
        const passwordInput = $('#passworconfirm');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
      });
    });
  </script>
</body>
</html>
