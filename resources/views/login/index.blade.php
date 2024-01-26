<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

    <div class="container align-items-center d-flex justify-content-center" style="height: 100vh;">
        <div class="w-50">
            <div class="card border-0 shadow rounded">
                <form action="{{ route('login.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body d-flex justify-content-center flex-column align-items-center">
                        <h2>SMPN 4 SUBANGJAYA</h2>
                        <div class="mb-3 w-75 mt-4">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3 w-75">
                            <label for="exampleFormControlInput2" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleFormControlInput2" placeholder="********">
                        </div>
                        <button type="submit" class="btn btn-md btn-success w-75 mb-3">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{session()->has('success')}}

    <script>
        @if(session()->has('success'))
            toastr.success('{{session('success')}}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{session('error')}}', 'GAGAL!');
        @endif
    </script>

</body>

</html>