<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="description" content="<?php echo $config['description']; ?>" />
	<meta name="keywords" content="<?php echo $config['keywords']; ?>" />
	<link href="css/favicon.ico" type="image/x-icon" rel="icon" />
	<link rel="stylesheet" type="text/css" href="css/jquery.qtip.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/help.css" />
	<title><?php echo $config['title']; ?></title>
</head>
<body>
	<div class="bgs" style="display:block!important;">
		<div class="menu">
			<span class="support">پشتیبانی</span>
			<span class="help">راهنما</span>
		</div>
		<div class="container verify">
			<?php
				$result = base64_decode(urldecode(htmlspecialchars($_GET['data'])));
				$result = json_decode($result, true);
				
				if ($result['status'] == 'Success') {
					$transactionType = explode('-', $result['products']['type']);
					$transactionType = $transactionType[0];
					if ($transactionType == 'Bill') {
						$billTypesPersian = array("آب", "بــرق", "گـــاز", "تلفن ثابت", "تلفن همراه", "عوارض شهرداری","","","جریمه راهنمایی و رانندگی");
						$billTypesEnglish = array("water", "electricity", "gas", "telephone", "cellphone", "mayoralty","","","police");
			?>
						<div id="content" class="Bill">
							<table id="bill-info">
								<tbody>
									<tr>
										<td>نوع قبض</td>
										<td>
											<span id="type" class="bill <?php echo $billTypesEnglish[$result['products']['details']['billType']]; ?>"></span>
											<span id="type-title"><?php echo $billTypesPersian[$result['products']['details']['billType']]; ?></span>
										</td>
									</tr>
									<tr>
										<td>تاریخ</td>
										<td><?php echo $result['date']; ?></td>
									</tr>
									<tr>
										<td>مبلغ قبض</td>
										<td><?php echo $result['products']['price'] . ' تومان'; ?></td>
									</tr>
									<tr>
										<td>شناسه قبض</td>
										<td><?php echo $result['products']['details']['billId']; ?></td>
									</tr>
									<tr>
										<td>شناسه پرداخت</td>
										<td><?php echo $result['products']['details']['paymentId']; ?></td>
									</tr>
									<tr>
										<td>کد پیگیری</td>
										<td><?php echo $result['refId']; ?></td>
									</tr>
								</tbody>
							</table>
							<a class="mainpage" href="<?php echo $root; ?>">صفحه اصلی فروشگاه</a>
						</div>
			<?php
					} elseif ($transactionType == 'TopUp') {
						$operators = array('MCI' => 'همراه اول', 'MTN' => 'ایرانسل', 'RTL' => 'رایتل', 'TAL' => 'تالیا');
			?>
						<div id="content">
							<table>
								<tbody>
									<tr>
										<td>تاریخ</td>
										<td><?php echo $result['date']; ?></td>
									</tr>
									<tr>
										<td>مبلغ شارژ</td>
										<td><?php echo $result['products']['price'] . ' تومان'; ?></td>
									</tr>
									<tr>
										<td>اپراتور شارژ</td>
										<td><?php echo $operators[explode('-', $result['products']['type'])[1]]; ?></td>
									</tr>
									<tr>
										<td>شماره تلفن همراه</td>
										<td><?php echo $result['products']['details']['cellphone']; ?></td>
									</tr>
									<tr>
										<td>کد پیگیری</td>
										<td><?php echo $result['refId']; ?></td>
									</tr>
								</tbody>
							</table>
							<a class="mainpage" href="<?php echo $root; ?>">صفحه اصلی فروشگاه</a>
						</div>
				<?php
					} elseif ($transactionType == 'IN') {
			?>
						<div id="content">
							<table>
								<tbody>
									<tr>
										<td>تاریخ</td>
										<td><?php echo $result['date']; ?></td>
									</tr>
									<tr>
										<td>نام بسته</td>
										<td class="mw-200"><?php echo $result['products']['name']; ?></td>
									</tr>
									<tr>
										<td>مبلغ بسته</td>
										<td><?php echo $result['products']['price'] . ' تومان'; ?></td>
									</tr>
									<tr>
										<td>شماره تلفن همراه</td>
										<td><?php echo $result['products']['details']['cellphone']; ?></td>
									</tr>
									<tr>
										<td>کد پیگیری</td>
										<td><?php echo $result['refId']; ?></td>
									</tr>
								</tbody>
							</table>
							<a class="mainpage" href="<?php echo $root; ?>">صفحه اصلی فروشگاه</a>
						</div>
				<?php
					} elseif (in_array($transactionType, ['CC', 'GC', 'AN', 'TC'])) {
						$pinProductDescription = array(
							'CC' => 'اکنون با وارد کردن کد شارژ از طریق صفحه کلید گوشی، تلفن همراه خود را شارژ نمایید.',
							'GC' => 'با استفاده گیفت کارت خریداری شده می توانید از سرویس هایی همچون خرید نرم افزار، بازی، موسیقی، فیلم، کتاب و ... استفاده نمایید.',
							'TC' => 'رمز مجوز را با اعداد انگلیسی به شماره 20001888 پیامک نمایید. پس از دریافت پیامک اعلام اعتبار می توانید پلاک خودرو خود را مطابق روال پیامک کنید.<br>در صورتی که برای نخستین بار از مجوز روزانه استفاده می کنید با شماره ندای ترافیک 87500-021 تماس بگیرید.',
							'AN' => 'با وارد کردن رمز آنتی ویروس خود را فعال کنید.<br>جهت راهنمایی بیشتر به منوی «راهنما» مراجعه نمایید.'
						);
						$dataKeys = array('Serial' => 'سریال', 'Username' => 'نام کاربری', 'ExpireDate' => 'تاریخ انقضاء');
						$productCount = count($result['products']['details']);
						
						if ($productCount > 1) {
				?>
						<div id="content">
							<div class="buy-details">
								<h1><?php echo $result['products']['name']; ?></h1>
								<span>تاریخ:</span>
								<span><?php echo $result['date']; ?></span>
								<span style="padding-right: 15px;">کد پیگیری:</span>
								<span><?php echo $result['refId']; ?></span>
								<br>
								<span>قیمت واحد:</span>
								<span><?php echo $result['products']['price']; ?> تومان</span>
								<span style="padding-right: 15px;">تعداد:</span>
								<span style="text-align:right;"><?php echo $result['products']['count']; ?> عدد</span>
								<span style="padding-right: 15px;">قیمت کل:</span>
								<span><?php echo $result['products']['price'] * $result['products']['count']; ?> تومان</span>
							</div>
							<div class="products-info">
							<table>
								<thead>
									<th><?php if ($transactionType != 'AN') { echo 'رمز (پین)'; } else { echo 'پسورد'; }?></th>
								<?php
									foreach ($result['products']['details'][0] as $key => $value) {
										if ($key != 'pin') {
											if (array_key_exists(ucfirst($key), $dataKeys)) {
												echo '<th>' . $dataKeys[ucfirst($key)] . '</th>';
											} else {
												echo '<th>' . $key . '</th>';
											}
										}
									}
								?>
								</thead>
								<tbody>
								<?php 
									for ($i = 0; $i < $productCount; $i++) {
										echo '<tr>';
											foreach ($result['products']['details'][$i] as $key => $value) {
												echo '<td class="ltr">' . $value .'</td>';
											}
										echo '</tr>';
									}
								?>
								</tbody>
							</table>
							</div>
							<a class="mainpage" href="<?php echo $root; ?>">صفحه اصلی فروشگاه</a>
						</div>
				<?php
						} else {
							$operator = explode('-', $result['products']['type']);
							$registerPinCode = '';
							if (in_array($operator[1], array('MCI', 'TAL'))) {
								$registerPinCode = '#رمزشارژ#*140*';
							} elseif (in_array($operator[1], array('MTN', 'RTL'))) {
								$registerPinCode = '#رمزشارژ*141*';
							}
				?>
						<div id="content">
							<h1><?php echo $result['products']['name']; ?></h1>
							<table>
								<tbody>
									<tr>
										<td>تاریخ</td>
										<td><?php echo $result['date']; ?></td>
									</tr>
									<tr>
										<td>مبلغ</td>
										<td><?php echo $result['products']['price'] . ' تومان'; ?></td>
									</tr>
									<tr>
										<td><?php if ($transactionType != 'AN') { echo 'رمز (پین)'; } else { echo 'پسورد'; }?></td>
										<td class="ltr"><?php echo $result['products']['details'][0]['pin']; ?></td>
									</tr>
							<?php
								if (!empty($registerPinCode)) {
							?>
									<tr>
										<td>کد ورود شارژ</td>
										<td><?php echo $registerPinCode; ?></td>
									</tr>
							<?php
								}
									foreach ($result['products']['details'][0] as $key => $value) {
										if ($key != 'pin') {
											echo '<tr>';
											if (array_key_exists(ucfirst($key), $dataKeys)) {
												echo '<td>' . $dataKeys[ucfirst($key)] . '</td>';
											} else {
												echo '<td>' . $key . '</td>';
											}
											echo '<td class="ltr">' . $value . '</td>'
												.'</tr>';
										}
									}
							?>
									<tr>
										<td>کد پیگیری</td>
										<td><?php echo $result['refId']; ?></td>
									</tr>
									
								</tbody>
							</table>
							<a class="mainpage" href="<?php echo $root; ?>">صفحه اصلی فروشگاه</a>
						</div>
				<?php
						}
					}
				} else {
			?>
					<div class="failed">
						<div class="logo"></div>
						<div class="explanation">
							<h1>تراکنش ناموفق بود.</h1>
							<h2><?php echo $result['errorMessage']; ?></h2>
							<p>چنانچه وجه از حساب شما کسر شده است، طی 72 ساعت کاری آینده از طرف بانک وجه به حساب شما باز می گردد.</p>
						</div>
						<a class="mainpage" href="<?php echo $root; ?>">صفحه اصلی فروشگاه</a>
						<div class="clear"></div>
					</div>	
			<?php
				}
			?>
			<div class="clear"></div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
	<script type="text/javascript">
		$('.help').qtip({
			content: {
				text: 'درحال بارگزاری ...',
				ajax: {
					url	: "http://chargereseller.com/pages/help",
					dataType: 'html'
				},
				title: {
					text: 'راهنما',
					button: true
				}
			},
			position: {
				my: 'center', // ...at the center of the viewport
				at: 'center',
				target: $(window)
			},
			show: {
				event: 'click', // Show it on click...
				solo: true, // ...and hide all other tooltips...
				modal: {
					effect: function(state) {
						$(this).fadeTo(1000, state ? 0.6 : 0, function() {
							if(!state) { $(this).hide(); }
						});
					}
				}
			},
			hide: false,
			style: 'qtip-bootstrap qtip-shadow ui-tooltip-rounded helpModalClass'
		});

		// By suppling no content attribute, the library uses each elements title attribute by default
		$('.support').qtip({
		   content: '<p>پشتیبانی تلفنی: 88019574-021</p><p>پشتیبانی گوگل: chargereseller24</p>',
			style:
			{
				classes: 'qtip-green qtip-rounded qtip-shadow',
				width: '200px'
			},
			position:
			{
				my: 'top center',  // Position my top left...
				at: 'bottom center', // at the bottom right of...
			},
			hide: 'unfocus'
		});
	</script>
</body>
</html>