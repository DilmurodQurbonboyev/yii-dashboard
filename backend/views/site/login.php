<?php
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>

<div class="login-box">
    <div class="d-flex pb-2">
        <?= Html::img('@web/img/uzinfocom.png', [
            'alt' => 'Uzinfocom',
            'width' => '100%'
        ]) ?>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <div class="social-auth-links text-center mb-3">
                <a class="btn btn-block btn-primary btn-social btn-dropbox" data-toggle="collapse"
                   data-target="#login" aria-expanded="true">
                    <i class="fa fa-lock"></i>
                    Кириш </a>
                <br>
                <div id="login" class="collapse in" aria-expanded="true" style="">
                    <div class="row">
                        <p>
                            <br>
                            Aгар сиз шу пайтга қадар id.egov.uz ишлаётганига ишончингиз комил бўлса, илтимос,
                            қуйидаги ҳавола билан авторизациядан ўтинг <br><br>

                            <a href="<?= Url::to(['login/one-id']) ?>" class="register_square">
                                <?= Html::img('@web/img/oneId.png', [
                                    'alt' => 'oneId'
                                ]) ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>