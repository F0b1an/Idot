<?php
// try/catch
try {
    foreach($_POST['hotel'] as $hotel) {

        // start database transaction
        $connection = db();
        $connection->beginTransaction();

        // db query
        $query = 'INSERT INTO `hotels`
        (_links, name, address, zipcode, city, images, roomtypes)
        VALUES
        (:_links, :name, :address, :zipcode, :city, :images, :roomtypes)';
                
                // getting hotel data
                $data = [
                    '_links' => [],
                    'name' => $hotel['name'],
                    'address' => $hotel['address'],
                    'zipcode' => $hotel['zipcode'],
                    'city' => $hotel['city'],
                    'images' => [],
                    'roomtypes' => [],
                ];

                // get hotel links from nested array
                foreach($hotel['_links'] as $linkkey => $links) {
                    $data['_links'][$linkkey] = [$links];
                }

                // get image info from nested array
                foreach ($hotel['images'] as $imagekey => $image) {
                    $data['images'][$imagekey] = [
                        '_links' => [$image['_links']],
                        'id' => $image['id'],
                        'image' => [$image['image']],
                    ];
                }

                // get roomtype info from nested array
                foreach ($hotel['roomtypes'] as $roomkey => $roomtype) {
                    $data['roomtypes'][$roomkey] = [
                        '_links' => [$roomtype['_links']],
                        'id' => $roomtype['id'],
                        'name' => $roomtype['name'],
                    ];
                }
                
                // convert nested arrays to json for storage
                $data['_links'] = json_encode($data['_links'], JSON_UNESCAPED_SLASHES);
                $data['images'] = json_encode($data['images'], JSON_UNESCAPED_SLASHES);
                $data['roomtypes'] = json_encode($data['roomtypes'], JSON_UNESCAPED_SLASHES);

                // sending data to db
                $hotel = $connection->prepare($query);
                $hotel->execute($data);

                $connection->commit();
    }

}
catch (Exception $e) {
    // ERROR
    // rollback
    $connection->rollBack();

    dd($e->getMessage());
}
