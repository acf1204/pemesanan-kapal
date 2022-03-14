<?php

function query($query)
{

    global $conn;

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo mysqli_error($conn);
    }

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
