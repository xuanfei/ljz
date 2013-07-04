<div class="form span-7" id="request-form-box">

<?php if(Yii::app()->user->hasFlash('landing')): ?>

<h1><?php echo Yii::app()->user->getFlash('landing'); ?></h1>
<div id="request-success">
	<p>您已成功提交了办公室租用需求。</p>
	<p>非常感谢您的托付，我们的专业顾问将在24小时内通过电话联系您，期待我们的服务能够给您带去微笑 : )</p>
	<button onclick="document.location.href='/landing';">提交其他需求</button>
</div>

<?php else: ?>

<h1>请告诉我们您的办公室需求</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'request-form',
	'action' => "/landing", 
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<span>
				<?php echo $form->dropDownList($model,'area',array_combine($model->getListValues('area'),$model->getListValues('area')),array('ajax' => array('type'=>'POST', //request type
	         	'url'=>('/dynamicareas'),'update'=>'#requests_district' //selector to update
	))); ?>
			<?php echo $form->error($model,'area'); ?>
		</span>
		<span>
	      	<?php echo $form->dropDownList($model,'district', array("全部商圈"=>"全部商圈")); ?>
			<?php echo $form->error($model,'district'); ?>
		</span>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'price', array_combine($model->getListValues('price'),$model->getListValues('price'))); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'workstations', array_combine($model->getListValues('workstations'),$model->getListValues('workstations'))); ?>
		<?php echo $form->error($model,'workstations'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'size',array_combine($model->getListValues('size'),$model->getListValues('size'))); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'mobile',array('placeholder'=>'联系电话（手机更方便）')); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('提交需求，我们帮你搞定'); ?>
	</div>

<?php $this->endWidget(); ?>
<!-- form -->

<?php endif; ?>

</div>