<html>
    <head>
        <title>Formuláře</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet/less" type="text/css" href="styles.less">
        <script src="less.js" type="text/javascript"></script>
        <style>
    body {
     text-align: center;
     background-image: url(<?php echo base_url();?>images/images.jpg);
    }
    </style>
    </head>
    <body style="background-color:lightblue;">
        <div class="container">
            <div><br>&nbsp</div>
            <div class="row">
                <div class="col-3">
                    
                </div>
                
                <div class="col-10">
                    <div class="jumbotron" style="background-color:#C0C0C0">
                        <div class="text-center" style="color:black">
                            <h2><b>Seznam jednotlivých formulářů</b></h2>
                        </div>
                    <div><br>&nbsp</div>
                    <button type="button" class="btn btn-blue btn-block">
                    <a class="nav-link text-dark" href="zamestnanci">Vše o zaměstnancích</a>
                    </button>
                    <button type="button" class="btn btn-blue btn-block">
                    <a class="nav-link text-dark" href="zakaznici">Vše o zákaznících</a>
                    </button>
                    <button type="button" class="btn btn-blue btn-block">
                    <a class="nav-link text-dark" href="opravy">Veškeré opravy</a>
                    </button>
                    </div>
                </div>
                <div class="col-3">
                    
                </div>
            </div>
        </div>
        
</div>
            </div>
            </div>
    </body>
</html>