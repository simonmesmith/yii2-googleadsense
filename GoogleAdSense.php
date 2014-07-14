<?php

namespace \simonmesmith\googleadsense;

class GoogleAdSense extends \yii\base\widget
{

	/**
	 * @param string $slot the ID of the ad slot.
	 * @param string $style optional style information; default is "display:block."
	 * @param boolean $responsive optional value specifying whether the ad unit is responsive; defaults to false.
	 * @return string ad code.
	 */	
    public $client=''; // string the AdSense client ID
	public $enable=true; // Whether to enable the ad (for example, can disable for test environment)
	public $slot;
	public $style='display:block';
	public $responsive=false;

	public function run()
	{

		// Set the responsive variable depending on whether the ad is responsive.
		$dataAdFormat=$this->responsive ? 'data-ad-format="auto"' : null;

		// Return an ad if showing ads is enabled, or a placeholder if it's not.
		if($this->enable){			
			echo "<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
				<ins class=\"adsbygoogle\"
				     style=\"$this->style\"
				     data-ad-client=\"$this->client\"
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
