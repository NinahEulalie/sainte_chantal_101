@extends('layouts.auth')

@section('content')
<style>
    .gradient-bg {
        position: relative;
        background: url("{{ asset('assets/images/background2.jpg') }}") center/cover no-repeat;
    }

/* overlay sombre + blur */
    .gradient-bg::before {
        content: "";
        position: absolute;
        inset: 0;
        backdrop-filter: blur(2px);
        background: rgba(0, 0, 0, 0.4);
    }

/* garder le contenu au-dessus */
    .gradient-bg > * {
        position: relative;
        z-index: 1;
    }
</style>
{{-- <style>
    .gradient-custom-3 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}
</style> --}}
<section class="vh-100 gradient-bg">
  {{-- style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> --}}
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card text-white" style="
            border-radius: 1rem;
            background: linear-gradient(to right, rgb(110, 53, 53), rgb(41, 8, 8));
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            ">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-warning text-center mb-5">Create an account</h2>

              <form action="{{route('register')}}" method="POST">
                @csrf
                

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="name">Your Name</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" value="{{old('name')}}"/>
                  @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="email">Your Email</label>
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" value="{{old('email')}}" />
                  @error('email')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                  @error('password')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="password_confirmation">Repeat your password</label>
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="password_confirmation"/>
                  @error('password')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-primary"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button  type="submit" data-mdb-button-init
                    data-mdb-ripple-init class="btn btn-outline-light btn-lg w-100">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('login')}}"
                    class="fw-bold text-primary"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection