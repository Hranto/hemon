<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('app', 'Contacts');
?>
<div class="site-contact">

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name')->label(Yii::t('app', 'Name')) ?>
                <?= $form->field($model, 'email')->label(Yii::t('app', 'Email')) ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6])->label(Yii::t('app', 'Message')) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="" style="">
        <div id="map-canvas" style="width: 100%;height: 300px;"></div>
    </div>

</div>
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
  function initialize() {
     var mapCanvas = document.getElementById('map-canvas');
     var myLatlng = new google.maps.LatLng(40.2079261, 44.51627970000004);
     var mapOptions = {
      center: myLatlng,
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