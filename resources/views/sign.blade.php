
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GestClient</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" projet de soutenance Master">
    <meta name="author" content=" Koffi Kassi Eric ; kassieric60@gmail.com; (+225 47 79 22 09)">


    <link rel="stylesheet" href="{{asset('cssAcceuilModal.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>



    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});

        });
    </script>
    <style type="text/css">


        body
        {
            background: url('images/font.jpg');
        }
        .container
        {
            max-width: 2000px;
            padding-left: 90px;
            padding-top: 75px;
        }


        .img
        {
            position: relative;
            padding-left: 150px;

        }



        .btn-default:hover, .btn-default:focus
        {
            background-color: #5cb85c;
            border-color: #5cb85c;
            color: white;
        }





        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover {
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>



    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
           <strong><span class="navbar-brand" ><span class="fa fa-paper-plane"></span>  GestClient</span></strong>

            <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>


    <div class="container">





        <div class="row">
            <img src="{{asset('images/logo2.png')}}" height="50px" width="200px" style="margin-right:30px;position: relative;bottom:80px;margin-left:10px"  >
            <img src="{{asset('images/username.png')}} " class="img-responsive img-circle img-thumbnail" height="180px;" width="180px;" style="margin-left: 180px;">
            <div class="" style="bottom: 50%;">
                <h2 style="margin-left: 910px;position: relative; bottom: 200px" class=" img-circle responsive img-thumbnail" >Bon à Savoir</h2>
                <div class="buttons" style="margin-left: 1000px;position: relative; bottom: 200px" >

                    <div id="five" class="button btn btn-primary" ><strong ><i class="glyphicon glyphicon-hand-right"></i>Lire</strong></div>

                </div>
            </div>

        </div>

            <div class="row " style="position: relative;bottom: 150px; margin-right: 20px">




                @yield('content')


            </div>









    <div id="modal-container">
        <div class="modal-background">
            <div class="modal">
               <strong><h1>A propos de l'application '<strong style="color: darkblue">Gest<span style="color: darkorange">Client</span></strong>'
               </h1> Réalisée par KOFFI Kassi Eric / <strong style="color: darkblue"> kassieric60@gmail.com </strong>  /.
               <hr></strong>
             <p>  <strong>GestClient</strong> est composé de trois différents profils à savoir :<br>

               - Le profil <strong style="color: darkred"> COMMERCIAL : </strong>il aura la possibilité d’enregistrer <i>les nouveaux clients</i>, <i>les redevez – vous</i>,

                </i>d’envoyer des emails à ces clients enregistrés,...</p>

                <p> - Le profil <strong style="color: darkred">CHEF COMMERCIAL : </strong>il aura la possibilité de Suivre toutes les opérations de chaque commercial.</p>



                    <p> - le profil <strong style="color: darkred"> ADMINISTRATEUR :</strong>
                   Ce dernier aura le droit de gerer les profils des Commerciaux  et du celui du Chef Commercial( <i>la création</i> , <i>le vérouillage</i>,et<i> le devérouillage des comptes des commerciaux </i> );<br>
                    <i>Suivre toutes les opérations de chaque commercial en temps réel.</i>
                    <i></i> voir les rdv</i> ,<i> les clients enregistrés par chaque commercial</i><br><strong style="color: darkblue">NB:</strong> Soulignons que  les utilisateurs reçeveront leurs accès par mails lorsqu'ils seront crées par l'Administrateur.</p>
            </div>

            </div>
        </div>

    </div>

    </div>
    <script src="lib/bootstrap/js/bootstrap.js"></script>


    <script>
        $('.button').click(function(){
            var buttonId = $(this).attr('id');
            $('#modal-container').removeAttr('class').addClass(buttonId);
            $('body').addClass('modal-active');
        })

        $('#modal-container').click(function(){
            $(this).addClass('out');
            $('body').removeClass('modal-active');
        });
    </script>





</body>
</html>
