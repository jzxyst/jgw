<?php

namespace App\Libs\Utility;

class Json {

	/**
	 * JSONPからJSONへ変換する
	 * @param $jsonp
	 * @return string|string[]|null
	 */
	public static function convertJsonpToJson($jsonp) {
		return preg_replace('/.+?({.+}).+/', "$1", $jsonp);
	}
}