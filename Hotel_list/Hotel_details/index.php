<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php require '../../navigation.php' ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://placekitten.com/1600/600" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="http://placekitten.com/1600/600" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="http://placekitten.com/1600/600" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $conn = mysqli_connect($host, $user, $pass);
    if (!$conn) {
        echo 'Connected failure<br>';
    } else {
        $conn_t = mysqli_connect($host, $user, $pass, "hotel_db");
        $sql = "SELECT hotel_name,city,accomodation,room_count,room_type,room_facilities,hotel_facilities,price FROM hotel_details WHERE hotel_id=" . $_POST['h_id'];
        $result = mysqli_query($conn_t, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $hotel_name = $row['hotel_name'];
            $city = $row['city'];
            $color_star = "";
            $empty_star = "";
            $accomodation = $row['accomodation'];
            $room_count = $row['room_count'];
            $room_type = $row['room_type'];
            $outStr = "";
            $str = '<ul style="list-style-type:disc;">';
            $str_arr = explode("|",  $row['room_facilities']);
            for ($i = 0; $i < count($str_arr); $i++) {
                $str .= '<li>' . $str_arr[$i] . '</li>';
            }
            $room_facilities = $str . "</ul>";
            $price = $row['price'];
            $str_arr = explode("|",  $row['hotel_facilities']);
            $str = '<ul style="list-style-type:disc;">';
            for ($i = 0; $i < count($str_arr); $i++) {
                $str .= '<li>' . $str_arr[$i] . '</li>';
            }
            $hotel_facilities = $str . "</ul>";
            $map = "https://maps.google.com/maps?q=".str_replace(" ", "%2C", $row['hotel_name']) . "%2C" . str_replace(" ", "%2C", $row['city'])."r&t=&z=13&ie=UTF8&iwloc=&output=embed";
            echo '<br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <u>' . $hotel_name ." , ". $city . '</u>  
                        </div>
                        <div class="col-md-3">'
                             . $accomodation . 
                        '</div>
                        <div  class="col-md-3">' . $room_type . '</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe width="480" height="400" id="gmap_canvas" src="'.$map.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                                <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 400px;
                                    width: 480px;
                                }
                        
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 400px;
                                    width: 480px;
                                }
                                </style>
                            </div>
                        </div>
                        <div class="col-md-6">     
                            <br>
                            <div>' . $room_facilities . '</div>
                            <div>' . $price . '</div>
                            <div>' . $hotel_facilities . '</div>
                        </div>
                    </div>
                </div>
            ';
        }
        mysqli_close($conn_t);
        mysqli_close($conn);
    }
    ?>
    <?php
    echo '' . $_POST['h_id'];
    ?>
    <?php require '../../footer.php' ?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>