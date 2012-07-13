<?php
/*
Retina, Please!!
*/

require_once dirname(dirname(__FILE__)) . '/KKRetinaPlease.php';
?>
<html>
<head>
<title>Retina, Please!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<?php KKRP::img('hello.png', array('height' => '320', 'width' => '320')); ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<?php KKRP::js(); ?>
</body>
</html>
