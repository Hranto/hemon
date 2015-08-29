<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\Controllers\BaseController;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/static/images/favicon.ico" type="image/x-icon" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="row">
            <header>
                <?php
                    NavBar::begin([
                        'brandLabel' => '<img src="/static/img/logo.png">',
                        'brandUrl' => '/'.Yii::$app->language.'',
                        'options' => [
                            'class' => 'navbar-default',
                        ],
                    ]);
                    $menuItems = [
                        ['label' => Yii::t('app', 'News'), 'url' => ['/'.Yii::$app->language.'']],
                        ['label' => Yii::t('app', 'About us'), 'url' => ['/'.Yii::$app->language.'/about']],
                        ['label' => Yii::t('app', 'Projects'), 'url' => ['/'.Yii::$app->language.'/projects']], 
                        ['label' => Yii::t('app', 'Services'), 'url' => ['/'.Yii::$app->language.'/services']], 
                        ['label' => Yii::t('app', 'Team'), 'url' => ['/'.Yii::$app->language.'/team']],
                        ['label' => Yii::t('app', 'Partners'), 'url' => ['/'.Yii::$app->language.'/partners']],
                        ['label' => Yii::t('app', 'Contacts'), 'url' => ['/'.Yii::$app->language.'/contacts']],          
                          
                    ];
                    if (Yii::$app->user->isGuest) {
                        // $menuItems[] = ['label' => 'Signup', 'url' => ['/hem/signup']];
                        // $menuItems[] = ['label' => 'Login', 'url' => ['/hem/login']];
                    } else {
                        // $menuItems[] = [
                        //     'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        //     'url' => ['/hem/logout'],
                        //     'linkOptions' => ['data-method' => 'post']
                        // ];
                    } 

                    if( Yii::$app->language == 'en' ){
                        $menuItems[] = ['label' => Yii::t('app', ''.Yii::$app->language.''), 
                            'items' => [
                                ['label' => 'Arm', 'url' => [BaseController::createLanguageUrl('am')]],
                                ['label' => 'Rus', 'url' => [BaseController::createLanguageUrl('ru')]],  
                            ],
                        ];
                    } elseif ( Yii::$app->language == 'ru' ) {
                        $menuItems[] = ['label' => Yii::t('app', ''.Yii::$app->language.''), 
                            'items' => [
                                ['label' => 'Arm', 'url' => [BaseController::createLanguageUrl('am')]],
                                ['label' => 'Eng', 'url' => [BaseController::createLanguageUrl('en')]],
                            ],
                        ];
                    } else {
                        $menuItems[] = ['label' => Yii::t('app', ''.Yii::$app->language.''), 
                            'items' => [
                                ['label' => 'Rus', 'url' => [BaseController::createLanguageUrl('ru')]],  
                                ['label' => 'Eng', 'url' => [BaseController::createLanguageUrl('en')]],
                            ],
                        ];
                    }

                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => $menuItems,
                    ]);
                    NavBar::end();
                ?>  
            </header>
        </div>
        
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        
    </div>

    <footer >
        <div class="container">
            <div class="row text-center">
                 <div class="col-md-12">
                    <div class="navbar-footer">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo '/'.Yii::$app->language ?>"><?php echo Yii::t('app', 'News') ?></a></li>
                            <li><a href="<?php echo '/'.Yii::$app->language.'/about' ?>"> <?php echo Yii::t('app', 'About us') ?> </a></li>
                            <li><a href="<?php echo '/'.Yii::$app->language.'/projects' ?>"><?php echo Yii::t('app', 'Projects') ?></a></li>
                            <li><a href="<?php echo '/'.Yii::$app->language.'/services' ?>"><?php echo Yii::t('app', 'Services') ?></a></li>
                            <li><a href="<?php echo '/'.Yii::$app->language.'/team' ?>"><?php echo Yii::t('app', 'Team') ?></a></li>
                            <li><a href="<?php echo '/'.Yii::$app->language.'/partners' ?>"><?php echo Yii::t('app', 'Partners') ?></a></li>
                            <li><a href="<?php echo '/'.Yii::$app->language.'/contacts' ?>"><?php echo Yii::t('app', 'Contacts') ?></a></li>
                        </ul>
                    </div>
                 </div>
                 <div class="col-md-12">
                    <div class="social-icons">
                        <a href="" class="icon-google-plus"></a>
                        <a href="" class="icon-youtube"></a>
                        <a href="" class="icon-twitter"></a>
                        <a href="" class="icon-linkedin"></a>
                        <a href="" class="icon-facebook"></a>
                    </div>
                 </div>
                 <div class="col-md-12 copyright">
                    <span><?php echo Yii::t('app', 'All rights reserved') ?></span>
                 </div>
                 <div class="col-md-2 footer-logo">
                    <img alt='logo' src="/static/img/footer-logo.png">
                 </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
