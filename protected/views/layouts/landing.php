<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="landing-page">

<div class="container">
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		<div id="city">上海</div>
	</div>
	<div class="clear"></div>

	<?php echo $content; ?>

	<div class="span-6" id="request-desc">
		<p>还没找到满意的办公地点？<br/>
		我们深知这事有多麻烦…</p>

		<p>我们想凭借10年地产服务经验<br/>
		和很强的议价能力为您租到<br/>
		高性价比的写字楼</p>

		<p>我们不是中介，我们不向您收取费用<br/>
		请告诉我们您的办公室需求<br/>
		剩下的事情我们帮您搞定！</p>
	</div>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?>, www.lijizu.com All Rights Reserved.
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
