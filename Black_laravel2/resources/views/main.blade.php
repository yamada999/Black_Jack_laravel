<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ブラックジャック</title>
        <!--CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <!--JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="/yamada_laravel_test/public/css/black.css" rel="stylesheet">
        <script type=text/javascript src="public/js/convert.js" charset="UTF-8"></script>
        
        <script src=""></script>
    </head>
    <body class="bg-light">
        <form method="get" action="{{ action('GameController@start') }}">
            <div class="container">
                <div class="py-5 text-center">
                    
                    <div id="main">
                        <h1 id="mainTitle">Black Jack</h1>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Name">N a m e</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="lastName">p a s s</label>
                      <input type="password" class="form-control" id="lastName" placeholder="" value="" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div id="main">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">S I G N U P</button>
                        </div>
                        <div class="invalid-feedback">    
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div id="main">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">L O G I N</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
