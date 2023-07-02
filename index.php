<?php

const JSON_DATA_URL = 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00';
const XML_DATA_URL = 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00';

function fetchData($type, $sort, $search) {
	$client = new GuzzleHttp\Client();
	$response = $client->request('GET', $type == 'json' ? JSON_DATA_URL : XML_DATA_URL);
	$events = $type == 'json' ?
		json_decode($response->getBody())->features :
		iterator_to_array(simplexml_load_string($response->getBody())->eventParameters->event, false);
	$earthquakes = array_map(
		fn($earthquake): array => $type == 'json' ? [
			'magnitude' => $earthquake->properties->mag,
			'datetime' => date('d/m/Y H:i:s', intval($earthquake->properties->time / 1000)),
			'coordinates' => $earthquake->geometry->coordinates,
			'place' => $earthquake->properties->place
		] : [
			'magnitude' => $earthquake->magnitude->mag->value,
			'datetime' => (new DateTime($earthquake->origin->time->value))->format('d/m/Y H:i:s'),
			'coordinates' => [$earthquake->origin->longitude->value, $earthquake->origin->latitude->value],
			'place' => $earthquake->description->text,
		],
		$events
	);
	if ($sort) {
		usort($earthquakes, fn($a, $b) => floatval($b['magnitude']) <=> floatval($a['magnitude']));
	}
	if ($search) {
		$earthquakes = array_filter($earthquakes, fn($earthquake) => strpos($earthquake['place'], $search) !== false);
	}
	return $earthquakes;
}

require __DIR__ . '/vendor/autoload.php';

app()->register('blade', function($c) {
	return new Leaf\Blade();
});

app()->blade->configure("app/views", "app/views/cache");


// Home page controller
app()->get('/', function () {
	echo app()->blade->render("home");
});


// JSON page controller
app()->get('/json', function () {
	$earthquakes = fetchData('json', !is_null(app()->request()->get('sort')), app()->request()->get('search') ?? null);
	echo app()->blade->render("earthquakes", ["earthquakes" => $earthquakes]);
});

// XML page controller
app()->get('/xml', function () {
	$earthquakes = fetchData('xml', !is_null(app()->request()->get('sort')), app()->request()->get('search') ?? null);
	echo app()->blade->render("earthquakes", ["earthquakes" => $earthquakes]);
});

app()->run();
