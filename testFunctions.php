?php

function somme(...$args) {
    $som = 0;
    foreach($args as $value) {
        $som += $value;
    }
    return $som;
}