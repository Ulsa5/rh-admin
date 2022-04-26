<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>

    <!-- Font Awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <!-- Tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Sweet Alert
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    @yield('styles')

    <title>RH Admin</title>
  </head>
  <body>
      @yield('content')

      <!-- Footer -->
      <div class="container" style="display: flex; align-items:center; justify-content:center;">
        <div class="form-group mt-4">

          <table class="table" style="width: 2px;">
                <tr class="">
                    <td style="width: 2px;">
                        <h5>
                            <a target="_blank" href="{{url('https://facebook.com/corporacionasi1')}}">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </h5>
                    </td>
                    <td style="width: 2px;">
                        <h5>
                            <a target="_blank" href="{{url('https://twitter.com/corporacion_asi')}}">
                                <i class="text-info fa-brands fa-twitter"></i>
                            </a>
                        </h5>
                    </td>
                    <td style="width: 2px;">
                        <h5>
                            <a target="_blank" href="{{url('https://www.instagram.com/corporacion_asi')}}">
                                <i class="text-warning fa-brands fa-instagram "></i>
                            </a>
                        </h5>
                    </td>
                    <td style="width: 2px;">
                        <h5>
                            <a target="_blank" href="{{url('https://www.github.com/Ulsa5/')}}">
                                <i class="text-black fa fa-code"></i>
                            </a>
                        </h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- End Footer -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    @yield('scripts')

    </body>
</html>
