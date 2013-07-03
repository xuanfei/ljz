<?php

/**
 * RequestForm class.
 * RequestForm is the data structure for keeping
 */
class requests extends CActiveRecord
{
	public $area;
	public $district;
	public $price;
	public $workstations;
	public $industry;
	public $mobile;
  	public $size;
	
  	public function getAreaData()
    {
	$_area = array(
      	"全部地区"=>array(
          	"全部商圈"
        ),
		"长宁"=>array(
			"中山公园",
			"延安西路",
			"虹桥开发区",
			"天山路",
			"古北"
		),
		"静安"=>array(
			"南京西路",
			"北京西路",
			"江宁路",
			"万航渡路",
			"静安寺"
		),
		"徐汇"=>array(
			"淮海西路",
			"衡山路",
			"徐家汇",
			"肇家浜路",
			"上体馆",
			"漕河泾田林",
			"上海南站"),
          "卢湾"=>array(
		  "淮海路",
		  "复兴中路",
		  "徐家汇路",
		),
		"黄浦"=>array(
"陆家浜路",
"豫园",
"外滩",
"人民广场",
),
"浦东"=>array(
"陆家嘴",
"新上海商业城",
"竹园",
"金桥",
"张江",
"外高桥",
"塘桥",
"世纪公园",
"北蔡",
"上南",
"浦东大道"
),
"杨浦"=>array(
"五角场",
"控江",
"鞍山",
"黄浦江",
"大连路隧道",
"同济大学"
),
"闸北"=>array(
"大宁绿地",
"火车站",
"彭浦",
"闸北公园"
),
"普陀"=>array(
"曹杨",
"长风商务区",
"长寿路",
"甘泉宜川",
"武宁路",
"真如",
"中山北路",
"中远两湾城"
), 
"虹口"=>array(
"北外滩",
"临平/和平公园",
"凉城路/虹口足球场",
"七浦路",
"曲阳",
"四川北路"
),
"闵行"=>array(
"春申/老闵行",
"华漕/虹桥镇",
"龙柏",
"南方商城",
"浦江",
"七宝",
"莘庄"
), 
"宝山"=>array(
"大华",
"吴淞",
"共富",
"逸仙路"
)
		);
  		return $_area;
	}
	
	public function getListValues($key)
	{
		if($key=="area")
		{
			return array_keys($this->getAreaData());
		}else if($key=="workstations")
		{
			return array(
				"10人以下",
				"10-25人",
				"26-49人",
				"50-99人",
				"100-199人",
				"200-299人",
				"300人以上"
			);
		}else if($key=="price")
		{
			return array(
				"2元以下",
				"2-4元",
				"4-6元",
				"6-8元",
				"8-10元",
				"10元以上"
			);
		}else if($key=="industry")
		{
			return array("创意园","IT","服务业");
		}else if($key=="size")
		{
			return array(
			    "50平米以下",
			    "50-100平米",
			    "100-200平米",
			    "200-300平米",
			    "300-500平米",
			    "500-800平米",
			    "800-1000平米",
			    "1000以上"
			);
		}return array();
	}
	
	public function getDistrict($key)
	{
      	$v = $this->getAreaData();
      	$ks = array_keys($v);
      	return $v[$key];
	}

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('area, district, price, workstations, size, mobile', 'required'),
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
			'area'=>'目标区域',
			'district'=>'目标商圈',
			'price'=>'租金范围',
			'workstations'=>'工位数量',
			'industry'=>'所属行业',
			'mobile'=>'手机号码'
		);
	}
}
