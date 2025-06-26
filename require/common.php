<?php

require_once './connect.php';

function selectData($mysqli, $table, $where = '') {
    $sql = " SELECT * FROM `$table` " . $where;
    $result = $mysqli->query($sql);

    if ($result === false) {
        error_log("SQL Error in selectData: " . $mysqli->error . "\nQuery: " . $sql);
    }
    return $result;
}

function run_query($mysqli, $sql) {
    $result = $mysqli->query($sql);
    if ($result === false) {
        error_log("SQL Error in run_query: " . $mysqli->error . "\nQuery: " . $sql);
    }
    return $result;
}