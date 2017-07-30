<html>

<head>
  <title>Earning Reports</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
</head>

    <nav class="navbar navbar-default">
      <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="#">Earning Calendar</a>
      </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li class="active"><a href="#">Application <span class="sr-only">(current)</span></a></li>
              <li><a href="#">About</a></li>
              <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
          </ul>


          <form action= "php/myprocessingscript.php" method = "post" class="navbar-form navbar-left">
          <div class="form-group">
          <input name= "symbol" type="text" class="form-control" placeholder="Enter Ticker Symbol">
          </div>
          <button type="submit" name = "submit" value = "Save Data"class="btn btn-default">Submit</button>
          </form>


          <ul class="nav navbar-nav navbar-right">
          <li><a href="https://github.com/VivekSreenivasan/EarningReport" target="_blank">Fork Me!</a></li>
          </ul>
        </div>
      </div>
    </nav>
<!-- Table of stock and earning report release -->


<?php

    $lines = file("mydata.txt"/*, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES*/);
    $data = array_map(function($v){
        list($symbol) = explode(",", $v);
        return ["symbol" => $symbol];
    }, $lines);

?>
<div class="container">
    <table class="table table-striped table-hover ">
      <h1>Information</h1>
      <thead>
        <tr>
          <th>Stock Ticker</th>
          <th>Link to Stock Info</th>
          <th>Earning Report Date</th>
        </tr>
      </thead>
        <tbody>
          <?php foreach($data as $symbol){ ?>
            <tr>
              <td>
                <?php echo $symbol["symbol"]; ?>
              </td>
              <td>
                <a target="_blank" href = " <?php echo $link = "https://finance.yahoo.com/quote/".chop($symbol["symbol"]); ?> ">Stock Info for <?php echo$symbol["symbol"] ?></a>
              </td>
              <td>
                <?php
                include_once('php/simple_html_dom.php');

                $link = "https://finance.yahoo.com/calendar/earnings/?symbol=".chop($symbol["symbol"]);
                $date = file_get_html($link)->plaintext;

                $currentMonth = date("n");
                $array = ["Jan","Feb","Mar","Apr", "May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

                $found = false;
                for($i = $currentMonth; $i < 13; $i++)
                {
                  if(strpos($date, $array[$i]) !== false){
                    $pos= strpos($date, $array[$i]);
                    echo substr($date,$pos,22);
                    $found = true;

                  }
                }
                if(!$found)
                echo "No results found…";
                ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
</div>


</body>
</html>
