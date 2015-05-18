<?php

namespace simonmesmith\googleadsense;
use Yii;

class GoogleAdSense extends \yii\base\Widget
{

    /**
     * @var string $slot the ID of the ad slot.
     */	
	public $slot;

    /**
     * @var string $style optional style information; default is "display:block."
     */	
	public $style='display:block';

    /**
     * @var boolean $responsive optional value specifying whether the ad unit is responsive; defaults to false.
     */	
	public $responsive=false;

    /**
     * Generates the ad.
     */	
	public function run()
	{

		// 1. Set values from parameters.
		$client = Yii::$app->params['googleAdSenseClient'];
		$enable = Yii::$app->params['googleAdSenseEnable'];

		// 2. Set the responsive variable depending on whether the ad is responsive.
		$dataAdFormat=$this->responsive ? 'data-ad-format="auto"' : null;

		// 3. Return an ad if showing ads is enabled, or a placeholder if it's not.
		if($enable){			
			echo "<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
				<ins class=\"adsbygoogle\"
				     style=\"$this->style\"
				     data-ad-client=\"$client\"
				     data-ad-slot=\"$this->slot\"
					 $dataAdFormat>
				</ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>";
		}else{
			echo "<div style=\"background:#eee;$this->style\">Advertisement goes here</div>";
		}
	}

}
