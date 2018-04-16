<?php 

Class Request{
	
	public $startDate;
	public $endDate;
	public $datas;
	public $chartLabels;
	
	public function __construct($startDate = null, $endDate = null)
	{
		
		if($startDate != NULL && $endDate != NULL)
		{
			$this->startDate = $startDate;
			$this->endDate = $endDate;
		}
		else
		{
			$this->startDate = '2018-04-01';
			$this->endDate = date('Y-m-d');
		}
		$this->datas = $this->mergedDatas();
		$this->chartLabels = array();
	}

	public function getTrafficJamDatas($startDate = null, $endDate=null)
	{
		if($startDate == NULL && $endDate == NULL)
			$trafficJamStats = json_decode(file_get_contents("https://trafficjammedia.api.hasoffers.com/Apiv3/json?api_key=992b7fc4edc0afac2daec68e4cb2c97ef86a0c4d1a88333b394ba18dd290fa7e&Target=Affiliate_Report&Method=getStats&fields[]=Stat.erpc&fields[]=Offer.name&fields[]=Stat.conversions&fields[]=Stat.payout&fields[]=Stat.clicks&data_start=".$this->startDate."&data_end=".$this->endDate),true);
		else
			$trafficJamStats = json_decode(file_get_contents("https://trafficjammedia.api.hasoffers.com/Apiv3/json?api_key=992b7fc4edc0afac2daec68e4cb2c97ef86a0c4d1a88333b394ba18dd290fa7e&Target=Affiliate_Report&Method=getStats&fields[]=Stat.erpc&fields[]=Offer.name&fields[]=Stat.conversions&fields[]=Stat.payout&fields[]=Stat.clicks&data_start=".$startDate."&data_end=".$endDate),true);
		
		$trafficJamDatas = array();
		if(!empty($trafficJamStats['response']['data']['data']))
		{	
			$counter = 0;
			foreach($trafficJamStats['response']['data']['data'] as $statData)
			{
				$trafficJamDatas[$counter]['offerName'] = $statData['Offer']['name'];
				$trafficJamDatas[$counter]['payout'] = $statData['Stat']['payout'];
				$trafficJamDatas[$counter]['conversions'] = $statData['Stat']['conversions'];
				$trafficJamDatas[$counter]['clicks'] = $statData['Stat']['clicks'];
				$trafficJamDatas[$counter]['epc'] = $statData['Stat']['erpc'];
				$trafficJamDatas[$counter]['ipc'] = $statData['Stat']['conversions'] != 0 ? $statData['Stat']['payout'] / $statData['Stat']['conversions'] : 0;

				$counter++;		
			}
			return $trafficJamDatas;
		}
		else
			return $trafficJamDatas;
	}
	
	public function getModaramoDatas($startDate = null, $endDate=null)
	{
		if($startDate == NULL && $endDate == NULL)
			$modaramoStats = json_decode(file_get_contents("https://modaramo.api.hasoffers.com/Apiv3/json?api_key=c246af610e04dfd954c4e26bad85ade5b32683606b9aec0bc7eeac4d2e3b8349&Target=Affiliate_Report&Method=getStats&fields[]=Stat.payout&fields[]=Stat.erpc&fields[]=Stat.conversions&fields[]=Stat.clicks&fields[]=Offer.name&data_start=".$this->startDate."&data_end=".$this->endDate),true);
		else
			$modaramoStats = json_decode(file_get_contents("https://modaramo.api.hasoffers.com/Apiv3/json?api_key=c246af610e04dfd954c4e26bad85ade5b32683606b9aec0bc7eeac4d2e3b8349&Target=Affiliate_Report&Method=getStats&fields[]=Stat.payout&fields[]=Stat.erpc&fields[]=Stat.conversions&fields[]=Stat.clicks&fields[]=Offer.name&data_start=".$startDate."&data_end=".$endDate),true);

		$modaramoRawDatas = array();
		$modaramoDatas = array();
		if(!empty($modaramoStats['response']['data']['data']))
		{	
			$counter = 0;
			foreach($modaramoStats['response']['data']['data'] as $statData)
			{
				$modaramoDatas[$counter]['offerName'] = $statData['Offer']['name'];
				$modaramoDatas[$counter]['payout'] = $statData['Stat']['payout'];
				$modaramoDatas[$counter]['conversions'] = $statData['Stat']['conversions'];
				$modaramoDatas[$counter]['clicks'] = $statData['Stat']['clicks'];
				$modaramoDatas[$counter]['epc'] = $statData['Stat']['erpc'];
				$modaramoDatas[$counter]['ipc'] = $statData['Stat']['conversions'] != 0 ? $statData['Stat']['payout'] / $statData['Stat']['conversions'] : 0;

				$counter++;		
			}
			return $modaramoDatas;
		}
		else
			return $modaramoDatas;
	}
	
	public function getDynamiadsDatas($startDate = null, $endDate=null)
	{
		$dynamiadsDatas = array();
		
		if($startDate == NULL && $endDate == NULL)
			$dynamiadsStats = json_decode(file_get_contents("https://dynamiadmin.com/affiliates/api/Reports/CampaignSummary?start_date=".rawurlencode($this->startDate.' 00:00:01')."&end_date=".rawurlencode($this->endDate.' 23:59:59')."&conversion_type=all&start_at_row=1&api_key=GZQus472nSg&affiliate_id=647"),true);
		else
			$dynamiadsStats = json_decode(file_get_contents("https://dynamiadmin.com/affiliates/api/Reports/CampaignSummary?start_date=".rawurlencode($startDate.' 00:00:01')."&end_date=".rawurlencode($endDate.' 23:59:59')."&conversion_type=all&start_at_row=1&api_key=GZQus472nSg&affiliate_id=647"),true);
		
		if(!empty($dynamiadsStats['data']))
		{
			$counter = 0;
			foreach($dynamiadsStats['data'] as $data)
			{
				$dynamiadsDatas[$counter]['offerName'] = $data['offer_name'];
				$dynamiadsDatas[$counter]['payout'] = $data['revenue'];
				$dynamiadsDatas[$counter]['conversions'] = $data['conversions'];
				$dynamiadsDatas[$counter]['clicks'] = $data['clicks'];
				$dynamiadsDatas[$counter]['epc'] = $data['epc'];
				$dynamiadsDatas[$counter]['ipc'] = $data['conversions'] != 0 ? $data['revenue'] / $data['conversions'] : 0;

				$counter++;		
			}
			return $dynamiadsDatas;
		}
		else
			return $dynamiadsDatas;

	}
	
	public function getDirectAgentDatas($startDate = null, $endDate=null)
	{
		$directAgentDatas = array();
		if($startDate == NULL && $endDate == NULL)
			$directAgentStats = json_decode(file_get_contents("https://login.directagents.com/affiliates/api/Reports/CampaignSummary?start_date=". rawurlencode($this->startDate.' 00:00:01')."&end_date=".rawurlencode($this->endDate.' 23:59:59')."&conversion_type=all&start_at_row=1&row_limit=30&api_key=Ugt4riPxDRuDgiajccYZA&affiliate_id=40653"),true);
		else
			$directAgentStats = json_decode(file_get_contents("https://login.directagents.com/affiliates/api/Reports/CampaignSummary?start_date=".rawurlencode($startDate.' 00:00:01')."&end_date=".rawurlencode($endDate.' 23:59:59')."&conversion_type=all&start_at_row=1&row_limit=30&api_key=Ugt4riPxDRuDgiajccYZA&affiliate_id=40653"),true);
		
		
		
		if(!empty($directAgentStats['data']))
		{
			$counter = 0;
			foreach($directAgentStats['data'] as $data)
			{
				$directAgentDatas[$counter]['offerName'] = $data['offer_name'];
				$directAgentDatas[$counter]['payout'] = $data['revenue'];
				$directAgentDatas[$counter]['conversions'] = $data['conversions'];
				$directAgentDatas[$counter]['clicks'] = $data['clicks'];
				$directAgentDatas[$counter]['epc'] = $data['epc'];
				$directAgentDatas[$counter]['ipc'] = $data['conversions'] != 0 ? $data['revenue'] / $data['conversions'] : 0;

				$counter++;		
			}
			return $directAgentDatas;
		}
		else
			return $directAgentDatas;
	}
	
	public function mergedDatas($startDate = null,$endDate = null)
	{
		$datas = array_merge($this->getDynamiadsDatas($startDate,$endDate),$this->getDirectAgentDatas($startDate,$endDate),$this->getModaramoDatas($startDate,$endDate),$this->getTrafficJamDatas($startDate,$endDate));
		usort($datas, 'self::sortAlphabetically');
		return $datas;
	}
	
	private static function sortAlphabetically($a,$b) {
		return strcmp(strtolower($a["offerName"]), strtolower($b["offerName"]));
	}
	
	public function getClicks()
	{
		$clicks = 0;
		foreach($this->datas as $data)
		{

			$clicks += $data['clicks'];
		}
		
		return $clicks;
	}
	
	public function getConversions()
	{
		$conversions = 0;
		foreach($this->datas as $data)
		{
			$conversions += $data['conversions'];
		}
		
		return $conversions;
	}
	
	public function getRevenue()
	{
		$revenue = 0;
		foreach($this->datas as $data)
		{
			$revenue += $data['payout'];
		}
		
		return $revenue;
	}
	
	public function getChartLabels()
	{
		$date1 = new DateTime($this->startDate);
		$date2 = new DateTime($this->endDate);
		
		if ($date1->format('Y-m') === $date2->format('Y-m'))
		{
		
			$date2->modify('+1 day');		
			$period = new DatePeriod(
				$date1,
				new DateInterval('P1D'),
				$date2
			);
						
			$this->chartLabels = array();
			foreach ($period as $key => $value) {
				$this->chartLabels[] = $value->format('m-d'); 
			}
		}
		else
		{
			$period = new DatePeriod(
				$date1,
				new DateInterval('P1M'),
				$date2
			);
						
			$this->chartLabels = array();
			foreach ($period as $key => $value) {
				$this->chartLabels[] = $value->format('M Y'); 
			}
		}
		if(!empty($this->chartLabels))
			return implode("','",$this->chartLabels);
		else
			return $this->chartLabels;
	}
	
	public function getClicksChartDatas()
	{
		$datas = array();
		$totalClicks = 0;
		foreach($this->chartLabels as $label)
		{
			//check if the labels are by month or day
			if (strpos($label, '-') !== false) //by day
			{
				$startDate = date_format(date_create($this->startDate),'Y').'-'.$label;
				$endDate = date_format(date_create($this->startDate),'Y').'-'.$label;
			}
			else
			{
				$startDate = date_format(date_create($label),'Y-m-d');
				$endDate = date_format(date_create($label),'Y-m-t');
			}
			$clicks = 0;
			foreach($this->mergedDatas($startDate,$endDate) as $data)
				$clicks += $data['clicks'];
			$datas[] = $clicks;
		}
		if(!empty($datas))
			return implode(',',$datas);
		else
			return $datas;
	}
	
	public function getConversionsChartDatas()
	{
		$datas = array();
		foreach($this->chartLabels as $label)
		{
			//check if the labels are by month or day
			if (strpos($label, '-') !== false) //by day
			{
				$startDate = date_format(date_create($this->startDate),'Y').'-'.$label;
				$endDate = date_format(date_create($this->startDate),'Y').'-'.$label;
			}
			else
			{
				$startDate = date_format(date_create($label),'Y-m-d');
				$endDate = date_format(date_create($label),'Y-m-t');
			}
			$conversion = 0;
			foreach($this->mergedDatas($startDate,$endDate) as $data)
				$conversion += $data['conversions'];
			$datas[] = $conversion;
		}
		if(!empty($datas))
			return implode(',',$datas);
		else
			return $datas;
	}
	
	public function getRevenueChartDatas()
	{
		$datas = array();
		foreach($this->chartLabels as $label)
		{
			//check if the labels are by month or day
			if (strpos($label, '-') !== false) //by day
			{
				$startDate = date_format(date_create($this->startDate),'Y').'-'.$label;
				$endDate = date_format(date_create($this->startDate),'Y').'-'.$label;
			}
			else
			{
				$startDate = date_format(date_create($label),'Y-m-d');
				$endDate = date_format(date_create($label),'Y-m-t');
			}
			$payout = 0;
			foreach($this->mergedDatas($startDate,$endDate) as $data)
				$payout += $data['payout'];
			$datas[] = $payout;
		}
		if(!empty($datas))
			return implode(',',$datas);
		else
			return $datas;
	}
	
	public function getIPChartDatas()
	{
		$datas = array();
		foreach($this->chartLabels as $label)
		{
			//check if the labels are by month or day
			if (strpos($label, '-') !== false) //by day
			{
				$startDate = date_format(date_create($this->startDate),'Y').'-'.$label;
				$endDate = date_format(date_create($this->startDate),'Y').'-'.$label;
			}
			else
			{
				$startDate = date_format(date_create($label),'Y-m-d');
				$endDate = date_format(date_create($label),'Y-m-t');
			}
			$conversions = 0;
			$payout = 0;
			foreach($this->mergedDatas($startDate,$endDate) as $data)
			{
				$conversions += $data['conversions'];
				$payout += $data['payout'];
			}
			if($conversions != 0)
				$datas[] = number_format($payout / $conversions,2); 
			else
				$datas[] = number_format(0,2);
		}
		if(!empty($datas))
			return implode(',',$datas);
		else
			return $datas;
	}
	
	public function getEPCChartDatas()
	{
		$datas = array();
		foreach($this->chartLabels as $label)
		{
			//check if the labels are by month or day
			if (strpos($label, '-') !== false) //by day
			{
				$startDate = date_format(date_create($this->startDate),'Y').'-'.$label;
				$endDate = date_format(date_create($this->startDate),'Y').'-'.$label;
			}
			else
			{
				$startDate = date_format(date_create($label),'Y-m-d');
				$endDate = date_format(date_create($label),'Y-m-t');
			}
			$click = 0;
			$payout = 0;
			foreach($this->mergedDatas($startDate,$endDate) as $data)
			{
				$click += $data['clicks'];
				$payout += $data['payout'];
			}
			if($click != 0)
				$datas[] = number_format($payout / $click,2); 
			else
				$datas[] = number_format(0,2);
		}
		if(!empty($datas))
			return implode(',',$datas);
		else
			return $datas;
	}
}
?>
