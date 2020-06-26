<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <title>Students</title>
    <style>

    </style>
  </head>
  <body>

    <div class="login" style="margin-top: 15%;">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-sm-10 text-center">
             <h1 class="text-danger font-weight-bold"></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
            <div class="login">
              <div class="studentlogin mt-2 ">
                <a href="{{ route('student_info') }}" class="btn btn-raised btn-primary mr-1">Get Students Information</a>
                <a href="{{ route('student_result') }}" class="btn btn-raised btn-warning ml-1">Get Student Result</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>