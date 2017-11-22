<!DOCTYPE html>
<html>
<title>{{ config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="{{ ('/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ ('/css/style.css') }}">
<body class="badan">
<nav class="navbar navbar-default navbar-fixed-top atas" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Title</a>
    </div>
</nav>
<div class="container tes">
    <div class="row">
        @yield('content')
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bawah text-center">
            kaki
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ ('/js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function(){

        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".txt").each(function() {

            $(this).keyup(function(){
                calculateSum();
            });
        });

    });

    function calculateSum() {

        var sum = 0;
        //iterate through each textboxes and add the values
        $(".txt").each(function() {

            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }

        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#sum").html(sum.toFixed(2));
    }
</script>
</body>
</html>

