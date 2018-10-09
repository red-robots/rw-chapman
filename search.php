<?php
if(isset($_GET['search-type'])) {
    $type = $_GET['search-type'];
    if($type == 'products') {
        load_template(TEMPLATEPATH . '/search-products.php');
    } elseif($type == 'manufacturer') {
        load_template(TEMPLATEPATH . '/search-manufactors.php');
    } elseif($type == 'markets') {
        load_template(TEMPLATEPATH . '/search-markets.php');
    }
}
?>