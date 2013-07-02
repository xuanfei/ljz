<?php

/**
 * RequestForm class.
 * RequestForm is the data structure for keeping
 */
class RequestForm extends CFormModel
{
	public $area;
	public $price;
	public $workstations;
	public $size;
	public $mobile;
	
	public function getListValues($key)
	{
		if($key=="area")
		{
			return array("中山公园","南京路","新天地");
		}else if($key=="workstations")
		{
			return array("久光");
		}else if($key=="price")
		{
			return array("10-20k","20-30k","30-50k","超过5万");
		}else if($key=="industry")
		{
			return array("商住两用");
		}else
          	return array();
	}

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('area, price, workstations, size, mobile', 'required'),
			array('mobile', 'numerical'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'area'=>'区域/商圈',
			'price'=>'租金范围',
			'workstations'=>'员工数量',
			'size'=>'租用面积',
			'industry'=>'所属行业',
			'mobile'=>'手机号码'
		);
	}
}