<? require_once $_SERVER['DOCUMENT_ROOT'].'/test/Helpers/K1ll1/vendor/autoload.php';?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<?
$arri = [1,2,3];
$arr = ['k' => 1, 't' => '12'];
\K1ll1\Lib\Classes\Arrays::wrapIfAssociative($arr);
\K1ll1\Lib\Classes\Debug::show($arr);
?>
</body>
</html>
