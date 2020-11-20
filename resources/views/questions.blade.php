<link rel="stylesheet" href="files/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="files/my.css" type="text/css">

<h3 style="text-align: center;">Online Quiz Examination</h3>
<br>
<br>

<br>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach

            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php Session::forget('success'); ?>
            @endif
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-1"><h2>Users <b></b></h2></div>
                    <div class="col-sm-7">
                        <Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button>
                        <a href="/">Back to Home</a>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">

                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question <i class="fa fa-sort"></i></th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->question }}</td>

                            <td>
                                <a href="#" class="text-warning" data-toggle="modal" data-target="#Modal_update{{ $item->id }}">Update</a>
                                <a href="#" class="text-danger" data-toggle="modal" data-target="#Modal_delete{{ $item->id }}">Delete</a>
                            </td>
                        </tr>

                        <!-- Modal-Update -->
                        <div class="modal fade" id="Modal_update{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="/update-question">
                                        @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="padding: 10px">
                                            <h5>Question: </h5>
                                        </div>
                                        <input style="visibility: hidden" name="id" value="{{ $item->id }}">
                                        <div class="row" style="padding: 10px">
                                            <input name="question" value="{{ $item->question }}" type="text" class="form-control">
                                        </div>
                                        <div class="row" style="padding: 10px">
                                            <div class="col-md-6">A: <input value="{{ $item->a }}" name="opa"></div>
                                            <div class="col-md-6">B: <input value="{{ $item->b }}" name="opb"></div>
                                        </div>
                                        
                                        <div class="row" style="padding: 10px">
                                            <div class="col-md-6">C: <input value="{{ $item->c }}" name="opc"></div>
                                            <div class="col-md-6">D: <input value="{{ $item->d }}" name="opd"></div>
                                        </div>

                                        <div class="row" style="padding: 10px">
                                            <div class="col-md-6">E: <input value="{{ $item->e }}" name="ope"></div>
                                            <div class="col-md-6"></div>
                                        </div>

                                        <div class="row" style="padding: 10px">
                                            <div class="col-md-3"><label>Answer: </label>
                                                <select name="answer" class="form-control">
                                                    <option value="{{ $item->answer }}">{{ $item->answer }}</option>
                                                    <option value="a">A</option>
                                                    <option value="b">B</option>
                                                    <option value="c">C</option>
                                                    <option value="d">D</option>
                                                    <option value="e">E</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Question</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal-Delete -->
                        <div class="modal fade" id="Modal_delete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="/delete-question">
                                        @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input style="visibility: hidden" name="id" value="{{ $item->id }}">
                                        <h5><b>Are you sure want to delete this question?</b></h5>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    

                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>


<!-- Modal-Add -->
<div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="/add-question">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="padding: 10px">
                    <h5>Question: </h5>
                </div>
                <div class="row" style="padding: 10px">
                    <input name="question" type="text" class="form-control" required>
                </div>
                <div class="row" style="padding: 10px">
                    <div class="col-md-6">A: <input name="opa" required></div>
                    <div class="col-md-6">B: <input name="opb" required></div>
                </div>
                
                <div class="row" style="padding: 10px">
                    <div class="col-md-6">C: <input name="opc" required></div>
                    <div class="col-md-6">D: <input name="opd" required></div>
                </div>

                <div class="row" style="padding: 10px">
                    <div class="col-md-6">E: <input name="ope" required></div>
                    <div class="col-md-6"></div>
                </div>

                <div class="row" style="padding: 10px">
                    <div class="col-md-3"><label>Answer: </label>
                        <select name="answer" class="form-control">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                            <option value="e">E</option>
                        </select>
                    </div>
                    <div class="col-md-9"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Question</button>
            </div>
            </form>
        </div>
    </div>


</div>


<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>