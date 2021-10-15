<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('judul')</title>
        
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}" />
        <script src="{{asset('js/toastr.min.js')}}"></script>
        <script src="{{asset('js/jquery.js')}}"></script>
    </head>
    <body>
        @yield('content')
        <script type="text/javascript">    
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        </script>
        <script src="{{asset('js/jquery.mask.min.js')}}"></script>
        <script src="{{asset('assets/assets/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/assets/sweetalert2.all.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/assets/bootstrap-confirmation.min.js')}}" type="text/javascript"></script>
    </body>
</html>