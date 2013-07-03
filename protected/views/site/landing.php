<div id="header">
	<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	<div id="city">上海</div>
</div>

<div class="clear"></div>

<?php if(Yii::app()->user->hasFlash('landing')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('landing'); ?>
</div>

<?php else: ?>

<div class="form span-7" id="request-form-box">

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
	      	<?php echo $form->dropDownList($model,'district', array("全部商圈")); ?>
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
		<?php echo $form->textField($model,'mobile'); ?>
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('提交需求，我们帮你搞定'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
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

<?php endif; ?>