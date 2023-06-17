<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>Login Form</title>
    <style>
        body{
            padding-top:200px;
            background-color: black;
        
        }
    </style>
  </head>
  <body>
  
    <div class="container">
       
        <div class="row">
         
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                  
                      <div class="panel-heading">
                        <h3 class="panel-title">Potu sign in</h3>
                     </div>
                      <div class="panel-body">
                        <form action="{{url('/backend-check')}}" method="post">
                            @csrf
                        <fieldset>
                              <div class="form-group">
                                <input class="form-control" type="email" placeholder="E-mail" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Password" name="password" type="password" value="">
                            </div>
                           
                            <button class="btn btn-lg btn-success btn-block" type="submit" >Login</button>
                        </fieldset>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>