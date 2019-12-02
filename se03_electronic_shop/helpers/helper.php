<?php 

function view($view = '', $data = [])
{
	foreach ($data as $key => $items) {
		$$key = $items;
	}
	$header = VIEW_PATH . 'layouts' . DIRECTORY_SEPARATOR .'header.php';

	$view = @str_replace('.', '/', $view);

	$content = VIEW_PATH . $view . '.php';

	if (!file_exists($content)) {
		$content = VIEW_PATH . 'layouts' .DIRECTORY_SEPARATOR .'error.php';
	}

	$postNews = VIEW_PATH . 'post' . DIRECTORY_SEPARATOR .'index.php';
	
	$brand = VIEW_PATH . 'brand' . DIRECTORY_SEPARATOR .'index.php';

	$footer = VIEW_PATH . 'layouts' . DIRECTORY_SEPARATOR .'footer.php';

	require VIEW_PATH . 'layouts/layout.php';
}

function redirect($url = '/')
{
	header('Location: ' . $url);
	exit;
}

function displayGender($gender)
{
	return ($gender == 1) ? 'Nam' : 'Nữ';
}

function displayStatus($status)
{
	return ($status == 1) ? 'Giao hàng thành công' : 'Đơn hàng đang vẫn chuyển';
}