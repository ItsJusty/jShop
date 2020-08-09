<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style media="screen">

    html, body {
      background-color: #191919;
      color: rgba(255, 255, 255, 0.7);
    }

    * {
      box-sizing: border-box;
    }

    .container {
      padding: 10px;
    }

    .col {
      float: left;
      width: 50%;
      padding-left: 54px;
      height: 100px;
      display: block;
    }

    .row {
      padding-top: 25px;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    .title {
      width: 100%;
      padding-left: 54px;
    }

    .col-1 {
      width: calc(100% / 12);
      float: left;
      display: block;
    }

    .col-2 {
      width: calc(100% / 6);
      float: left;
      display: block;
    }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <img src="https://nachtwinkeltje.nl/img/logo-textonly.png" width="175px;" alt="logo">
        </div>
        <div class="col">
          <p>
            Nachtwinkeltje<br>
            Kingmastate 52<br>
            8918DC Leeuwarden
          </p>
        </div>
      </div>
      <div class="title">
        <h1>Factuur #{{ $order->number }}</h1>
      </div>
      <div class="row">
        <div class="col-1">
          shisdsdsdsd
        </div>
        <div class="col-2">
          sdsdsdsdsdsdsdsds
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
