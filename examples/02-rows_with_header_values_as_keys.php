<?php /** @noinspection ForgottenDebugOutputInspection */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../src/SimpleXLS.php';

use Shuchkin\SimpleXLS;

echo '<h1>Rows with header values as keys</h1>';
if ($xls = SimpleXLS::parse('books.xls')) {
    // Produce array keys from the array values of 1st array element
    $header_values = $rows = array();

    foreach ($xls->rows() as $k => $r) {
        if ($k === 0) {
            $header_values = $r;
            continue;
        }
        $rows[] = array_combine($header_values, $r);
    }
    print_r($rows);
    /*
    Array
    (
        [0] => Array
            (
                [ISBN] => 618260307
                [title] => The Hobbit
                [author] => J. R. R. Tolkien
                [publisher] => Houghton Mifflin
                [ctry] => USA
                [date of access] => 2024-01-25 00:00:00
            )

        [1] => Array
            (
                [ISBN] => 908606664
                [title] => Slinky Malinki
                [author] => Lynley Dodd
                [publisher] => Mallinson Rendel
                [ctry] => NZ
                [date of access] => 2024-01-25 00:00:00

            )

    )
     */
} else {
    echo SimpleXLS::parseError();
}
