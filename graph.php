<?php

declare(strict_types=1);

const GRAPH_WIDTH = 80;

$options = getopt('', ['data:']);
if (empty($options['data'])) {
    echo "Data is not set\n";

    return;
}

$data = array_map(
    static fn($value) => (float) ($value),
    explode(',', $options['data'])
);

$lastPoint = min($data);
$firstPoint = max($data);

foreach ($data as $value) {
    $point = round(($lastPoint - $value) * GRAPH_WIDTH / ($lastPoint - $firstPoint));
    echo sprintf("%" . $point . "s\n", '*');
}