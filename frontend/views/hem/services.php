<?php
/* @var $this yii\web\View */
$language = Yii::$app->language;
$this->title = Yii::t('app', 'Services');
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="page-title"><?php echo Yii::t('app', 'services'); ?></h2>
			</div>
		</div>
		<div class="row text-center services-page">
				<div class="col-md-3">
					<div class="service text-center">
						<img src="/static/img/serv_3.png">
						<p class="name"><?php echo Yii::t('app', 'Design of electrical systems'); ?></p>
						<p class="description"><?php echo Yii::t('app', 'Design of electrical systems desc'); ?></p>
					</div>
				</div>
				<div class="col-md-3">
						<div class="service text-center">
						<img src="/static/img/serv_1.png">
						<p class="name"><?php echo Yii::t('app', 'Construction of electrical systems'); ?></p>
						<p class="description"><?php echo Yii::t('app', 'Construction of electrical systems desc'); ?></p>
					</div>
				</div>		
		</div>
	</div>
</section>
<section>
	<div class="container-fluid">
		<div class="row section-divider">
			<img src="/static/img/grad.png" class="img-responsive">
			<h2><?php echo Yii::t('app', 'divide text'); ?></h2>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row text-center services-page">
			<div class="col-md-3">
				<div class="service text-center">
					<img src="/static/img/serv_4.png">
					<p class="name"><?php echo Yii::t('app', 'Repairing, Installation and regulation'); ?></p>
					<p class="description"><?php echo Yii::t('app', 'Repairing, Installation and regulation desc'); ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="service text-center">
					<img src="/static/img/serv_2.png">
					<p class="name"><?php echo Yii::t('app', 'Design of automated systems'); ?></p>
					<p class="description"><?php echo Yii::t('app', 'Design of automated systems desc'); ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="service text-center">
					<img src="/static/img/serv_7.png">
					<p class="name"><?php echo Yii::t('app', 'Construction of automated systems'); ?></p>
					<p class="description"><?php echo Yii::t('app', 'Construction of automated systems desc'); ?></p>
				</div>
			</div>
		</div>
		<div class="row text-center services-page">
			<div class="col-md-3">
				<div class="service text-center">
					<img src="/static/img/serv_5.png">
					<p class="name"><?php echo Yii::t('app', 'Design of security systems'); ?></p>
					<p class="description"><?php echo Yii::t('app', 'Design of security systems desc'); ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="service text-center">
					<img src="/static/img/serv_6.png">
					<p class="name"><?php echo Yii::t('app', 'Construction of security systems'); ?></p>
					<p class="description"><?php echo Yii::t('app', 'Construction of security systems desc'); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>        
<script type="text/javascript">
	var a = document.body;
	if (a.classList) {
	    a.classList.add('services-page');
	} else {
	    a.className += ' services-page';
	}
</script>