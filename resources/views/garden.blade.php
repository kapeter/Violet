<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>晚会大屏</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ mix('css/garden.css') }}">
</head>
<body>
  	<div id="app" v-cloak></div>
 	<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>