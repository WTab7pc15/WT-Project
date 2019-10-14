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
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {

            $("#search-button").on("click", function() {
                $.ajax({
                    type: "POST",
                    url: "readData.php",
                    data: 'keyword=' + $("#search-box").val(),
                    success: function(data) {
                        $("#filterbox").show();
                        $("#sortBox").show();
                        $("#DBResult").show();
                        $("#DBResult").html(data);
                    }
                });
            });
            $("#search-box").on("keyup", function() {
                $.ajax({
                    type: "POST",
                    url: "readSearch.php",
                    data: 'keyword=' + $(this).val(),
                    success: function(data) {
                        $("#suggestions").show();
                        $("#suggestions").html(data);
                    }
                });
            });
            $("#myRange").on("change", function() {
                let b;
                let a = document.getElementById('datad').value;
                switch (a) {
                    case 'Price':
                        b = " ORDER BY price DESC";
                        break;
                    case 'Stars':
                        b = " ORDER BY star_rating DESC";
                        break;
                    case 'Price and Stars':
                        b = " ORDER BY price,star_rating DESC";
                        break;
                    case 'Reviews':
                        b = " ORDER BY review_count DESC";
                        break;
                    case ' ':
                        b = " ";
                        break;
                    default:
                        b = " ";
                        break;
                }
                $.ajax({
                    type: "POST",
                    url: "sortData.php",
                    data: 'keyword=' + $('#search-box').val() + '&price=' + $('#myRange').val() + '&order=' + b,
                    success: function(data) {
                        $("#DBResult").show();
                        $("#DBResult").html(data);
                    }
                });
            });
            $("#datad").on("change", function() {
                let b;
                let a = document.getElementById('datad').value;
                switch (a) {
                    case 'Price':
                        b = " ORDER BY price DESC";
                        break;
                    case 'Stars':
                        b = " ORDER BY star_rating DESC";
                        break;
                    case 'Price and Stars':
                        b = " ORDER BY price,star_rating DESC";
                        break;
                    case 'Reviews':
                        b = " ORDER BY review_count DESC";
                        break;
                    case ' ':
                        b = " ";
                        break;
                    default:
                        b = " ";
                        break;
                }
                $.ajax({
                    type: "POST",
                    url: "sortData.php",
                    data: 'keyword=' + $('#search-box').val() + '&price=' + $('#myRange').val() + '&order=' + b,
                    success: function(data) {
                        $("#DBResult").show();
                        $("#DBResult").html(data);
                    }
                });
            });
        });

        function selectName(val) {
            $("#search-box").val(val);
            $("#suggestions").hide();
        }
    </script>
    <?php require '../navigation.php' ?>
    <div class="searchbox">
        <div class="container">
            <br>
            <form>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input id="search-box" type="text" class="form-control" placeholder="Enter name of city, area or hotel">
                        <div id="suggestions" style="display: block; position: absolute; width:100%; background: white; color: black; z-index: 3;"></div>
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
                            <input id="search-button" class="btn btn-success col-md-12" type="button" value="Search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="container" id="filterbox" style="display:none;">
        <form>
            <div class="row filterbox">
                <div class="col-md-4">
                    <div class="form-group slidercontainer">
                        <label id="slideVal"></label>
                        <input type="range" min="2000" max="13000" class="slider" id="myRange">
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
    <div class="container" id="sortBox" style="display:none;">
        <div class="row">
            <div class="col-md-12">
                <label>Sort By:</label>
            </div>
        </div>
        <div class="row">
            <select name="datad" id="datad">
                <option hidden> </option>
                <option>Price</option>
                <option>Stars</option>
                <option>Price and Stars</option>
                <option>Reviews</option>
            </select>
        </div>
    </div>
    <br>
    <div id="DBResult" name="results" class="container hotelTable">
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