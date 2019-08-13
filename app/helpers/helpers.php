<?php

/**
* @param string $str
* @param array $noStrip
*/
function camelCase(string $str, array $noStrip = [])
{
    $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
    $str = trim($str);
    $str = ucwords($str);
    $str = str_replace(" ", "", $str);
    return $str;
}

/**
* @return array
*/
function createWorkStatuses() {
	return [
		'planing' => 'Planing',
		'doing' => 'Doing',
		'completed' => 'Completed'
	];
}

/**
* @param int $timestamp
* @return string
*/
function createDateFormat(int $timestamp) {
	return date('Y/m/d', $timestamp);
}

/**
 * @param array $params
 * @return string
 */
function createUrl(array $params)
{
    return 'index.php?' . http_build_query($params);
}

/**
 * @param array $params
 * @return void
 */
function redirect(array $params)
{
    $url = createUrl($params);
    header('Location: ' . $url);
}