<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('app', 'contacts');
?>
<section class="contact-page">
    <div class="container-fluid social-zone">
      <div class="row text-center">
        <h2 class="section-title"><?php echo Yii::t('app', 'Follow us'); ?></h2>
        <div class="social-icons">
          <a href="" class="icon-google-plus"></a>
          <a href="" class="icon-youtube"></a>
          <a href="" class="icon-twitter"></a>
          <a href="" class="icon-linkedin"></a>
          <a href="" class="icon-facebook"></a>
         </div>
      </div>
    </div>
    <div class="container form-info-block">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h2 class="page-title"><?php echo Yii::t('app', 'contacts'); ?></h2>
            <p class="company-name"><?php echo Yii::t('app', 'company name'); ?></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 text-right address">
          <?php echo Yii::t('app', 'address'); ?>
        </div>
        <div class="col-md-6">
          <p><?php echo Yii::t('app', 'tel'); ?><br><?php echo Yii::t('app', 'email'); ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Name'), 'class' => 'pull-left'])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app', 'Email'), 'class' => 'pull-right'])->label(false) ?>
                <div class="clear-block"></div>
                <?= $form->field($model, 'body')->textArea(['placeholder' => Yii::t('app', 'Message'), 'resizable' => 'false'])->label(false) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'send'), ['class' => 'send pull-right', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container-fluid">
      <div class="row">
          <div id="map-canvas" style="height: 300px;"></div>
      </div>
    </div>
  </section>

<script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
  function initialize() {
     var mapCanvas = document.getElementById('map-canvas');
     var myLatlng = new google.maps.LatLng(40.2079261, 44.51627970000004);
     var mapOptions = {
      center: myLatlng,
      scrollwheel: false,
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);

    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
    });
  
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>