<link rel="stylesheet" href="files/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="files/my.css" type="text/css">

<div class="background2">

    <div class="container-fluid">
        <form method="post" action="/submit-ans">
            @csrf
            <div class="row" style="padding-top: 25vh; color: #fff;">
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    
                    <h2>Q{{ Session::get('nextq') }} : {{ $question->question }}</h2>
                    <input value="a" name="answer" type="radio"> (A) <small>{{ $question->a }}</small><br>
                    <input value="b" name="answer" type="radio"> (B) <small>{{ $question->b }}</small><br>
                    <input value="c" name="answer" type="radio"> (C) <small>{{ $question->c }}</small><br>
                    <input value="d" name="answer" type="radio"> (D) <small>{{ $question->d }}</small><br>
                    <input value="e" name="answer" type="radio"> (E) <small>{{ $question->e }}</small><br>
                    <input value="{{ $question->answer }}" value="" style="visibility: hidden" name="dbans">
                </div>
                <div class="col-md-3"></div>
            </div>
    
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" style="float: right">Next</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    </div>

</div>



<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>

