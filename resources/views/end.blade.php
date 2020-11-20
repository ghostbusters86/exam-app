<link rel="stylesheet" href="files/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="files/my.css" type="text/css">

<div class="container-fluid" style="padding-top: 40vh">
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-4">
            <label for="">Correct: <small>{{ Session::get('correctans') }}</small></label><br>
            <label for="">Incorrect: <small>{{ Session::get('wrongans') }}</small></label><br>
            <label for="">Result: <small>{{ Session::get('correctans') }}/{{ Session::get('correctans') + Session::get('wrongans') }}</small></label>
            <br>
            <a href="/"><button class="btn btn-primary" style="margin-left: 10%">FInish Quiz</button></a>
            <a href="/">Back to Home</a>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>



<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>

