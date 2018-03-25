<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        PW-7
    </title>
</head>
<body>
  <div id="result" style="padding-top: 1%;"></div>
	<?php
		class Flickr {

			private $apiKey;

			public function __construct($apikey = null) {
				$this->apiKey = $apikey;
			}

			public function search($query = null, $user_id = null, $per_page = 100, $format = 'php_serial', $sort= 'date-taken-desc') {
				$args = array(
					'method' => 'flickr.photos.search',
					'api_key' => $this->apiKey,
					'text' => urlencode($query),
					'user_id' => $user_id,
					'per_page' => $per_page,
					'format' => $format,
					'sort' => $sort
				);
				$url = 'http://flickr.com/services/rest/?';
				$search = $url.http_build_query($args);
				$result = file_get_contents($search);
				if ($format == 'php_serial') $result = unserialize($result);
				return $result;
			}
		}

		$keyword = "koenigsegg";
		$Flickr = new Flickr('78dc2b13d9cc1127139a1aa12bf9fcc6');
		$data = $Flickr->search(stripslashes($keyword));
		echo "<h3 style='text-align:center;padding-bottom: 1%;'>Images returned with matching keyword: " . $keyword . "</h3>";
		foreach($data['photos']['photo'] as $photo) {
			$imgUrl = "http://farm" . $photo["farm"] . ".static.flickr.com/" . $photo["server"] . "/" . $photo["id"] . "_" . $photo["secret"];
			echo '<a target="_new" href="' . $imgUrl . '.jpg"><img class="img-thumbnail" src="' . $imgUrl . '_t.jpg"></a>';
		}
	?>
</body>
</html>
