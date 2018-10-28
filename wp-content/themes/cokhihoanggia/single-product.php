<?php
$product_id = get_the_ID();
$_product = wc_get_product($product_id);
var_dump($_product);