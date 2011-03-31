# AWS FPS

AWS FPS is a driver-based library for CodeIgniter that provides a much easier way to interact with Amazon's Flexible Payments Service. More information on that service can be found at [Amazon Web Services](http://aws.amazon.com/fps/).

## get\_cbui\_url driver

### single($params)
Token expires 3 hours after creation.

Required parameters:

* callerReference
* returnURL
* transactionAmount

- - -
	$params = array(
		'callerReference'	=> 'callerReferenceSingleUse',
		'returnURL'			=> 'http://www.mysite.com/call_back.jsp',
		'transactionAmount'	=> '5',
		'currencyCode'		=> 'USD',
		'paymentReason'		=> 'HarryPotter 1-5 DVD set',
	);

	echo $this->aws_fps->get_cbui_url->single($params);
- - -

### recurring($params)

Required parameters:

* callerReference
* returnURL
* transactionAmount
* recurringPeriod

- - -
	$params = array(
		'callerReference'	=> 'callerReferenceRecurringToken',
		'returnURL'			=> 'http://www.mysite.com/call_back.jsp',
		'transactionAmount'	=> '5',
		'recurringPeriod'	=> '1 Month',
		'paymentMethod'		=> 'CC',
		'paymentReason'		=> 'Monthly subscription of Times magazine',
	);

	echo $this->aws_fps->get_cbui_url->recurring($params);
- - -

### recipient($params)

Required parameters:

* callerReference
* returnURL
* maxFixedFee
* maxVariableFee
* recipientPaysFee

- - -
	$params = array(
		'callerReference'	=> 'callerReferenceRecipientToken',
		'returnURL'			=> 'http://www.mysite.com/call_back.jsp',
		'maxFixedFee'		=> 5,
		'maxVariableFee'	=> 5,
		'recipientPaysFee'	=> 'True',
		'paymentMethod'		=> 'CC',
	);

	echo $this->aws_fps->get_cbui_url->recipient($params);
- - -

### multi($params)
Token expires 1 year after creation.

Required parameters:

* callerReference
* returnURL
* globalAmountLimit

- - -
		$tokenList = implode(",", $tokens);

		$params = array(
			'callerReference'		=> 'callerReferenceMultiUse',
			'returnURL'				=> 'http://www.mysite.com/call_back.jsp',
			'globalAmountLimit'		=> "50",
			'paymentMethod'			=> "CC",
			'usageLimitType1'		=> "Amount",
			'usageLimitPeriod1'		=> "6 Months",
			'usageLimitValue1'		=> 10,
			'usageLimitType2'		=> "Count",
			'usageLimitPeriod2'		=> "12 Months",
			'usageLimitValue2'		=> 100,
			'isRecipientCobranding'	=> "True",
			'recipientTokenList'	=> $tokenList,
		);

	echo $this->aws_fps->get_cbui_url->multi($params);
- - -

### edit($params)

Required parameters:

* callerReference
* returnURL
* tokenId

- - -
		$params = array(
			'callerReference'	=> 'callerReferenceEditToken',
			'returnURL'			=> 'http://www.mysite.com/call_back.jsp',
			'tokenId'			=> 'H6VWDM8TPZYCGBJY5W3P3QYK7HZNYQ7NPHVV2SYKW19MIY2G4BG4YQTVDYW3I1SM',
		);

	echo $this->aws_fps->get_cbui_url->edit($params);
- - -

