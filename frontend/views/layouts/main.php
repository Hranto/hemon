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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<img src="/static/logo/logo.png">',
                'brandUrl' => '/'.Yii::$app->language.'',
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => Yii::t('app', 'News'), 'url' => ['/'.Yii::$app->language.'']],
                ['label' => Yii::t('app', 'About us'), 'url' => ['/'.Yii::$app->language.'/about']],
                ['label' => Yii::t('app', 'Contacts'), 'url' => ['/'.Yii::$app->language.'/contacts']], 
                ['label' => Yii::t('app', 'Projects'), 'url' => ['/'.Yii::$app->language.'/projects']], 
                ['label' => Yii::t('app', 'Team'), 'url' => ['/'.Yii::$app->language.'/team']],  
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/hem/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/hem/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/hem/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
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

        <!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                     <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button> <a class="navbar-brand" href="#"><img src="/static/logo/logo.png"></a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
               <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Link</a>
                    </li>
                    <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Action</a>
                            </li>
                            <li>
                                <a href="#">Another action</a>
                            </li>
                            <li>
                                <a href="#">Something else here</a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="#">Separated link</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            
        </nav> -->
        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
