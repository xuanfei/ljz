<?php
require_once "BaeLog.class.php";

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the landing page
	 */
	public function actionLanding()
	{
      	$logger=BaeLog::getInstance();
		$model=new requests;
		if(isset($_POST['requests']))
		{
			$model->attributes=$_POST['requests'];
			if($model->validate())
			{
              	$logger->logTrace("request form validated");
				if($model->remoteSave())
                {
                    $logger ->logTrace("request saved");
					$this->refresh();
                }else{
                  $logger ->logTrace("request save failed");
                }
			}
		}
		$this->layout = 'landing';
		$this->render('landing',array('model'=>$model));
	}
  
  	public function actionDynamicareas()
	{
        $logger=BaeLog::getInstance();
		$model=new requests;
    	$data=$model->getDistrict($_POST['requests']['area']);
        $i=0;
    	foreach($data as $v)
    	{
        	echo CHtml::tag('option',
            	       array('value'=>$v),CHtml::encode($v),true);
    	}
	}
}
