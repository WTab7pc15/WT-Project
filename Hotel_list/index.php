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
</head>

<body>
    <div class="searchbox">
        <div class="container">
            <br>
            <form>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" placeholder="Enter name of city, area or hotel">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            <label>Check In</label>
                            <input type="date" class="form-control text-center">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            <label>Check Out</label>
                            <input type="date" class="form-control text-center">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label>Persons</label>
                            <label class="wrap">
                                <select class="form-control dropdown">
                                    <option selected>01</option>
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
                <div class="col-md-3">
                    <div class="form-group slidercontainer">
                        <label id="slideVal"></label>
                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Accomodation</label>
                        <label class="filterdrop">
                            <select class="form-control dropdown">
                                <option selected hidden>All types</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Guest-rating</label>
                        <label class="filterdrop">
                            <select class="form-control dropdown">
                                <option selected hidden>All</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>More Filters</label>
                        <label class="filterdrop">
                            <select class="form-control dropdown">
                                <option selected hidden>Select</option>
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
        <div class="row sortFilter">
            <div class="col-md-3 text-center">
                <a href="#">Price</a>
            </div>
            <div class="col-md-3 text-center">
                <a href="#">Stars</a>
            </div>
            <div class="col-md-3 text-center">
                <a href="#">Star rating and Price</a>
            </div>
            <div class="col-md-3 text-center">
                <a href="#">Distance from city center</a>
            </div>
        </div>
    </div>
    <br>
    <div class="container hotelTable">
        <?php
        $hotel_name = "Hotel Name 1";
        $star_rating = 3;
        $color_star = "";
        $empty_star = "";
        $address_details = "Location1,Area1,City1";
        $distance = "12km from City Center";
        $public_rating = 8.2;
        $outStr = "";
        $reviews = 1193;
        $price = 4853;
        $hotel_id = 1;
        for ($i = 0; $i < $star_rating; $i++) {
            $color_star .= '<i class="fa fa-star starColor" aria-hidden="true"></i>';
        }
        for ($i = 0; $i < (5 - $star_rating); $i++) {
            $empty_star .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
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
        echo '<div class="row border border-primary" style="padding:10px;">
                <div class="col-md-4">
                    <img class="img-fluid" src="./img/image1.jpg">
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
                        <div class="col-md-12" style="font-size:30px;"><i class="fa fa-inr" aria-hidden="true"></i>' . $price . '</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="Hotel_details/index.php" method="POST">
                                <input class="btn btn-primary" type="submit" value="More Info">
                                <input type="text" name="h_id" style="display:none;" value="4"' . $hotel_id . '">
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
        ?>
        <!--     <div class="row border border-primary" style="padding:10px;">
                <div class="col-md-4">
                    <img class="img-fluid" src="./img/image1.jpg">
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <?php
                        $hotel_name = "Hotel Name 1";
                        echo '<div class="col-md-12">' . $hotel_name . '</div>'
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $star_rating = 3;
                            for ($i = 0; $i < $star_rating; $i++) {
                                echo '<i class="fa fa-star starColor" aria-hidden="true"></i>';
                            }
                            for ($i = 0; $i < (5 - $star_rating); $i++) {
                                echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $address_details = "Location1,Area1,City1";
                        echo '<div class="col-md-12">' . $address_details . '</div>'
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        $distance = "12km from City Center";
                        echo '<div class="col-md-12">' . $distance . '</div>'
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <?php
                        $public_rating = 8.2;
                        $outStr = "";
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

                        echo '<div class="col-md-8">' . $outStr . '</div>';
                        echo '<div class="col-md-4" style="color:white; background:rgb(' . $a . ',' . $b . ', 0);">' . number_format($public_rating, 1) . '</div>';
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        $reviews = 1193;
                        echo '<div class="col-md-12">' . $reviews . ' Reviews</div>';
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        $price = 4853;
                        echo '<div class="col-md-12" style="font-size:30px;"><i class="fa fa-inr" aria-hidden="true"></i>' . $price . '</div>';
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <input class="btn btn-primary" type="submit" value="More Info">
                                <?php
                                $hotel_id = 1;
                                echo '<input type="text" name="h_id" style="display:none;" value="' . $hotel_id . '">';
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="./js/main.js"></script>

</html>