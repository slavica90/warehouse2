<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>
<section class="main-body">
<div class="container typeahead">
<div class="row-fluid">
    <div class="span4">
        <h3 class="header">
            Најава
            <span class="header-line"></span>
        </h3>

<!--<p>Please fill out the following form with your login credentials:</p>-->

        <!--<div class="form">-->
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
        )); ?>

        <!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

                <div class="row">
                        <?php echo $form->labelEx($model,'Корисничко име'); ?>
                        <?php echo $form->textField($model,'username'); ?>
                        <?php echo $form->error($model,'username'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Лозинка'); ?>
                        <?php echo $form->passwordField($model,'password'); ?>
                        <?php echo $form->error($model,'password'); ?>
        <!--		<p class="hint">
                                Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
                        </p>-->
                </div>

                <div class="row rememberMe">
                        <?php echo $form->checkBox($model,'rememberMe'); ?>
                        <?php echo $form->label($model,'rememberMe'); ?>
                        <?php echo $form->error($model,'rememberMe'); ?>
                </div>

                <div class="row buttons">
                        <?php echo CHtml::submitButton('Најави се', array('class'=>'btn btn-primary')); ?>
                </div>

        <?php $this->endWidget(); ?>
        <!--</div> form -->
    </div>
</div>
</div>
</section>