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
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <?php require '../navigation.php' ?>

    <body>
        <div class="container">
            <div class="row">
                <h4>Bookings</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrapper">
                        <table class="alt table-responsive">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Statement</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("dbcontroller.php");
                                $db_handle = new DBController();
                                $query = "SELECT Time,Statement,Price FROM bookings;";
                                $result = $db_handle->runQuery($query);
                                if(!empty($result)) 
                                {   ?>
                                    <?php
                                    foreach($result as $resdata) 
                                    { ?>
                                        <?php 
                                        echo '<tr>
                                            <td>'.$resdata['Time'].'</td>
                                            <td>'.$resdata['Statement'].'</td>
                                            <td>'.$resdata['Price'].'</td>
                                        </tr>'
                                        ?><?php 
                                    }   ?> <?php 
                                } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <?php require '../footer.php' ?>
    </body>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>