<?php
define('BCMS_QUEUE','26ea193064a761ea77c5e968ca85aa60');
require_once "BaeLog.class.php";
require_once "Bcms.class.php";

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
	
  	function mailrequst($model)
	{
      	$subject = "来自lijizu.com（上海）的新需求";
     	$msg = " <!--HTML--> 电话:$model->mobile <br/> 地区: $model->area <br/> 商圈: $model->district" ; 
      
        $logger=BaeLog::getInstance();
		$bcms = new Bcms ();
		$ret = $bcms->mail (BCMS_QUEUE, $msg, array("request@lijizu.com","jebberwocky@gmail.com"),
			array( Bcms::MAIL_SUBJECT => $subject));
		if ( false === $ret )
		{
			$logger->logDebug( 'ERROR MESSAGE: ' . $bcms->errmsg ( ) );
		}
		else
		{
			$logger->logDebug(  'SUCC, result: ' . print_r ( $ret, true ) ) ;
		}
	}
  
	/**
	 * Displays the landing page
	 */
	public function actionLanding()
	{
      	$logger=BaeLog::getInstance();
		$model=new requests;
		Yii::app()->user->setFlash("landing",null);
		if(isset($_POST['requests']))
		{
			$model->attributes=$_POST['requests'];
			if($model->validate())
			{
              	$logger->logTrace("request form validated");
				if($model->remoteSave())
                {
					//Send notification mail
					$this->mailrequst($model);
                    $logger->logTrace("request saved");
                    Yii::app()->user->setFlash("landing","需求提交成功！");
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
