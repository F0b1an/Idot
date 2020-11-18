<?php
    include "../boot.php";

    // get hotel id
    $id = $_GET['hotel'];

    // get database connection
    $database = db();

    // get hotel from database
    $hotel = $database->prepare('SELECT * FROM hotels WHERE id ='.$id);
    try {
        $hotel->execute([]);
        $hotel->setFetchMode(PDO::FETCH_ASSOC);
        $hotel = $hotel->fetchALL();
    }
    catch(Exeption $e) {
        http_response_code(500);
        dd($e->getMessage());
    }
    
    // when a post request is sent the code below is executed
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require '../app/api/book.php';
        print_r($response);
        print_r($err);
   }

   // convert json to array
   $roomtypes = json_decode($hotel[0]['roomtypes'], true);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Idot - book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-header">
            <b><h4>Idotwebengineers</h4></b>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <?php print_r($hotel[0]['name']) ?>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">

                            <div class="form-group">
                                <label class="col control-label">
                                    Product
                                </label>

                                <div class="col">
                                    <select class="form-control" name="product">
                                        <?php foreach ($roomtypes as $roomtype) { ?>
                                            <option value="<?php print_r($roomtype['id']) ?>"><?php print_r($roomtype['name']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col control-label ">
                                    Occupant(s)
                                </label>
                              
                                <div class="col">
                                    <input name="occupant" class="form-control" type="text" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col control-label ">
                                    Date from
                                </label>
                              
                                <div class="col">
                                    <input name="date_from" class="form-control" type="date" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col control-label ">
                                    Date to
                                </label>
                              
                                <div class="col">
                                    <input name="date_to" class="form-control" type="date" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col control-label ">
                                    Contact email
                                </label>
                              
                                <div class="col">
                                    <input name="contact_email" class="form-control" type="email" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col control-label ">
                                    Address
                                </label>
                              
                                <div class="col">
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary float-right">Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
