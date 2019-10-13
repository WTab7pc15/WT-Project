<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>

<body onload="getloader()">
    <script>
        function fun() {
            let a = document.getElementById('datad').value;
            switch (a) {
                case 'Price':
                    a = "ORDER BY price DESC";
                    break;
                case 'Stars':
                    a = "ORDER BY star_rating DESC";
                    break;
                case 'Price and Stars':
                    a = "ORDER BY price,star_rating DESC";
                    break;
                case 'Reviews':
                    a = "ORDER BY review_count DESC";
                    break;
                default:
                    a = "";
                    break;
            }
            document.getElementById('sorrt').value = a;
            document.getElementById('sorrt').click();
        }
    </script>
    <?php require '../navigation.php';
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $conn = mysqli_connect($host, $user, $pass);
    function filldata()
    {
        $output = "";
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $conn_t = mysqli_connect($host, $user, $pass, "hotel_db");
        //SELECT VALUE
        if(isset($_POST['sorrrt']))
        {
            $regu=$_POST['sorrrt'];
        }
        else
        {
            $regu="";
        }
        $sql = 'SELECT hotel_id,hotel_name,star_rating,address,public_rating,review_count,price,hotel_image FROM hotel_details '.$regu.' LIMIT 30;';
        $result = mysqli_query($conn_t, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $hotel_name = $row['hotel_name'];
            $star_rating = $row['star_rating'];
            $color_star = "";
            $empty_star = "";
            $address_details = $row['address'];
            $distance = "12km from City Center";
            $public_rating = $row['public_rating'] / 10;
            $outStr = "";
            $reviews = $row['review_count'];
            $price = $row['price'];
            $hotel_id = $row['hotel_id'];
            $hotel_image = $row['hotel_image'];
            for ($i = 0; $i < $star_rating; $i++) {
                $color_star .= '<i class="fa fa-star starColor" ariahiddenn="true"></i>';
            }
            for ($i = 0; $i < (5 - $star_rating); $i++) {
                $empty_star .= '<i class="fa fa-star-o" ariahiddenn="true"></i>';
            }
            switch (round($public_rating)) {
                case 0:
                    $outStr = "No rating";
                    break;
                case 1:
                case 2:
                    $outStr = "Worst";
                    break;
                case 3:
                case 4:
                    $outStr = "Bad";
                    break;
                case 5:
                case 6:
                    $outStr = "Good";
                    break;
                case 7:
                case 8:
                    $outStr = "Best";
                    break;
                case 9:
                case 10:
                    $outStr = "Excellent";
                    break;
            }

            if ($public_rating < 5) {
                $a = 255;
                $b = 51 * ($public_rating);
            } else {
                $a = 255 - (51 * ($public_rating - 5));
                $b = 255;
            }
            $output .= '<div class="row border border-primary" style="padding:10px;">
                        <div class="col-md-4">
                            <img class="img-fluid" style="max-height: 200px;" src="./img/hotels/hotel_' . $hotel_image . '.jpg">
                        </div>
                        <div class="col-md-5" class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">' . $hotel_name . '</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">' . $color_star . $empty_star . '</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">' . $address_details . '</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">' . $distance . '</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-8">' . $outStr . '</div>
                                <div class="col-md-4" style="color:white; background:rgb(' . $a . ',' . $b . ', 0);">' . number_format($public_rating, 1) . '</div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">' . $reviews . ' Reviews</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="font-size:30px;"><i class="fa fa-inr" ariahiddenn="true"></i>' . $price . '</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="Hotel_details/index.php" method="POST">
                                        <input class="btn btn-primary" type="submit" value="More Info" onclick="defaultloader()">
                                        <input type="text" name="h_id" style="display:none;" value="' . $hotel_id . '">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $output;
    }
    ?>
        <div class="searchbox">
            <div class="container">
                <br>
                <form>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input id="searchbox" type="text" class="form-control" placeholder="Enter name of city, area or hotel">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Check In</label>
                                <input id="checkin" type="date" class="form-control text-center">
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="form-group">
                                <label>Check Out</label>
                                <input id="checkout" type="date" class="form-control text-center">
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-3">
                            <div class="form-group">
                                <label>Persons</label>
                                <label class="wrap">
                                    <select id="persons" class="form-control dropdown">
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-3">
                            <label style="color:transparent;">*</label>
                            <div class="form-group right-icon">
                                <input class="btn btn-success col-md-12" type="button" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="container">
            <form>
                <div class="row filterbox">
                    <div class="col-md-4">
                        <div class="form-group slidercontainer">
                            <label id="slideVal"></label>
                            <input type="range" min="1" max="100"class="slider" id="myRange">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Accomodation</label>
                            <label class="filterdrop">
                                <select id="accomodation" class="form-control dropdown">
                                    <option hidden>All types</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Guest-rating</label>
                            <label class="filterdrop">
                                <select id="guest_rating" class="form-control dropdown">
                                    <option hidden>All</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <label>Sort By:</label>
                </div>
            </div>
            <div class="row">
                <form action="" method="post">
                    <select name="datad" id="datad" onchange="setloader(); fun();">
                        <option hidden> </option>
                        <option>Price</option>
                        <option>Stars</option>
                        <option>Price and Stars</option>
                        <option>Reviews</option>
                    </select>
                    <input type="submit" name="sorrrt" id="sorrt" val="" style="display:none;">
                </form>
            </div>
        </div>
        <br>
        <div id="DBResult" name="results" class="container hotelTable">
            <?php
            echo filldata();
            ?>
        </div>

        <?php require '../footer.php' ?>
</body>





<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="./js/main.js">

</script>
</html>