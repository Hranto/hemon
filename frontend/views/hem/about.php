<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$language = Yii::$app->language;
$this->title = Yii::t('app', 'about');
$description = 'description_'.$language;
?>
<section>
		<div class="container-fluid">
			<div class="row">
					<div class="page-cover">
						<img src="/static/img/about_cover.png" class="img-responsive">
						<div class="caption">
							<img alt='logo' src="/static/img/About_page_logo.png">
						</div>
					</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row main-content">
				<div class="col-md-3">
					<h3>About Hatukelektramontage</h3>
				</div>
				<div class="col-md-9">
					<div class="txt">
						<?php echo $about[$description]; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
	var a = document.body;
	if (a.classList) {
	    a.classList.add('about-page');
	} else {
	    a.className += ' about-page';
	}
</script>