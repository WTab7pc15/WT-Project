<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <div class="container">
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
                        <div class="col-md-12">'.$color_star.$empty_star.'</div>
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
                            <form>
                                <input class="btn btn-primary" type="submit" value="More Info">
                                <input type="text" name="h_id" style="display:none;" value="0"' . $hotel_id . '">
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
        ?>
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