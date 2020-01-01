<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="<?php echo $config['description']; ?>" />
		<meta name="keywords" content="<?php echo $config['keywords']; ?>" />
		<link type="image/x-icon" rel="icon" href="css/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/jquery.qtip.css" />
		<link rel="stylesheet" type="text/css" href="css/ion.rangeSlider.css" />
		<link rel="stylesheet" type="text/css" href="css/ion.rangeSlider.skinNice.css" />
		<link rel="stylesheet" type="text/css" href="css/help.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/sweetalert2.css" />
		<title><?php echo $config['title']; ?></title>
		
	</head>
<body>
	<div class="bgs">
		<div class="menu">
			<span class="support">پشتیبانی</span>
			<span class="help">راهنما</span>		
		</div>
		<div class="product-menu">
			<ul>	
				<li class="navbar_right"></li>
				<li class="nav services TopUp" alt="nav1" data-type="TopUp" data-tooltip="شارژ مستقیم"></li>
				<li class="navbar"> </li>
				<li class="nav services PIN" alt="nav2" data-type="PIN" data-tooltip="کارت شارژ"></li>
				<li class="navbar"></li>
				<li class="nav services InternetPackage" alt="nav2" data-type="InternetPackage" data-tooltip="بسته اینترنت"></li>
				<li class="navbar"></li>
				<li class="nav services WiMax" alt="nav3" data-type="WiMax" data-tooltip="شارژ وایمکس"></li>
				<li class="navbar" > </li>
				<li class="nav services Bill" alt="nav4" data-type="Bill" data-tooltip="پرداخت قبض"></li>
				<li class="navbar" > </li>
				<li class="nav services GiftCard" alt="nav5" data-type="GiftCard" data-tooltip="گیفت کارت"></li>
				<li class="navbar" > </li>
				<li class="nav services Antivirus" alt="nav7" data-type="Antivirus" data-tooltip="آنتی ویروس"></li>
				<li class="navbar_left""></li>
				
			</ul>
		</div>
	
		<div class="container">
			<div class="operators">
				<div data-type="MTN" class="operator MTN"><i></i></div>
				<div data-type="MCI" class="operator MCI"><i></i></div>
				<div data-type="RTL" class="operator RTL"><i></i></div>
			</div>
			<div id="content" >
				<form accept-charset="utf-8" method="post" id="chargeform" action="http://www.chr724.ir/services/EasyCharge/">
					<fieldset>
						<div class="charge">
							<div class="input text required account">
								<input id="dataAccountTemp" class="input-large cellphone" type="text" value="" maxlength="11" name="data[AccountTemp]">
							</div>
							<div id="AmountTemp" class="input text required amount">
								<input type="text" id="dataAmountTemp" name="data[AmountTemp]" title="مبلغ به تومان" class="eng">
							</div>
							<div id="AmountTopUpMTNTemp" class="input text required amount">
								<input type="text" id="dataAmountTopUpMTNTemp" name="data[AmountMTNTemp]" title="مبلغ به تومان" class="eng">
							</div>
							<div class="input text counter">
								<div class="input text required count">
									<input type="text" id="count" class="eng">
								</div>
								<div class="amount-container">
									<span class="amount-title">مبلغ</span>
									<span class="amount-value"></span>
									<span class="amount-unit">تومان</span>
								</div>
								<div class="clear"></div>
							</div>
							<div class="input text email">
								<input id="EmailInput" class="input-large" type="email" maxlength="50" value="" title="آدرس ایمیل را به شکل صحیح بنویسید!" rel="tooltip" placeholder="you@domain.com">
							</div>
							<div class="Magiccharge">
								<input type="checkbox" value="1" id="magiccharge" name="data[Magic]">
								<label for="magiccharge">شارژ شگفت انگیز </label> 
							</div>
							<div class="NonCreditMTN">
								<input type="checkbox" value="1" id="NonCreditMTN" name="data[NonCreditMTN]">
								<label for="NonCreditMTN">قبض (شارژ) دائمی ایرانسل</label>
							</div>
                            <div class="save-information">
                                <input type="checkbox" value="1" id="save-information" name="data[save-information]">
                                <label for="save-information">ذخیره اطلاعات تماس</label> 
                            </div>
						</div>
						<div class="Bill">
							<div class="check">
								<div class="input text required billId">
									<input id="BillId" class="input-large" type="text" placeholder="شناسه قبض" value="" maxlength="13" name="data[billId]">
								</div>
								<div class="input text required paymentId">
									<input id="PaymentId" class="input-large" type="text" placeholder="شناسه پرداخت" value="" maxlength="13" name="data[paymentId]">
								</div>
								<div class="input text email">
									<input id="EmailInput" class="input-large" type="email" maxlength="50" value="" title="آدرس ایمیل را به شکل صحیح بنویسید!" rel="tooltip" placeholder="you@domain.com">
								</div>
								<div class="input text required account">
									<input id="dataAccountTemp" class="input-large cellphone" type="text" value="" placeholder="شماره موبایل" maxlength="11">
								</div>
                                <div class="save-information">
                                    <input type="checkbox" value="1" id="save-information" name="data[save-information]">
                                    <label for="save-information">ذخیره اطلاعات تماس</label> 
                                </div>
								<div>
									<input id="CheckBill" type="button" class="check" value="بررسی">
								</div>
							</div>
							<div class="verify">
								<table id="bill-info">
									<tbody>
										<tr>
											<td>نوع قبض</td>
											<td><span id="type" class="bill"></span><span id="type-title"></span></td>
										</tr>
										<tr>
											<td>مبلغ قبض</td>
											<td><span id="amount"></span> ریال</td>
										</tr>
										<tr>
											<td>شناسه قبض</td>
											<td><span id="bill-id"></span></td>
										</tr>
										<tr>
											<td>شناسه پرداخت</td>
											<td><span id="payment-id"></span></td>
										</tr>
										<tr>
											<td>ایمیل</td>
											<td><span id="email"></span></td>
										</tr>
										<tr>
											<td>شماره موبایل</td>
											<td><span id="cellphone"></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="GiftCard">
							<div class="operators">
								<div data-type="GooglePlay" class="operator GiftCard GooglePlay"><i></i></div>
								<div data-type="Microsoft" class="operator GiftCard Microsoft"><i></i></div>
								<div data-type="iTunes" class="operator GiftCard iTunes"><i></i></div>
								<div data-type="Amazon" class="operator GiftCard Amazon"><i></i></div>
								<div data-type="XBox" class="operator GiftCard XBox"><i></i></div>
								<div data-type="PlayStation" class="operator GiftCard PlayStation"><i></i></div>
								<div data-type="PlayStationPlus" class="operator GiftCard PlayStationPlus"><i></i></div>
							</div>
							<div class="buy">
								<div class="info">
									<div id="operator"></div>
									<div class="title"></div>
									<div class="description"></div>
									<div class="back-button">بازگشت</div>
								</div>
								<div class="input text giftcard-types">
									<select id="GiftCardTypes" class="input-large" name="data[ProductId]"></select>
									<input type="hidden" id="UnitAmount" value="0">
								</div>
								<div class="input text">
									<div class="input text required count">
										<input type="text" id="count" class="eng">
									</div>
									<div class="amount-container">
										<span class="amount-title">مبلغ</span>
										<span class="amount-value"></span>
										<span class="amount-unit">تومان</span>
									</div>
									<div class="clear"></div>
								</div>
								<div class="input text email">
									<input id="EmailInput" class="input-large" type="email" maxlength="50" value="" title="آدرس ایمیل را به شکل صحیح بنویسید!" rel="tooltip" placeholder="you@domain.com"">
								</div>
								<div class="input text required account">
									<input id="dataAccountTemp" class="input-large cellphone" type="text" value="" placeholder="شماره موبایل" maxlength="11">
                                    <p class="warn">لطفاً شماره موبایل صحیح را وارد نمایید، اطلاعات گیفت کارت فقط به موبایل شما پیامک می شود.</p>
								</div>
                                <div class="save-information">
                                    <input type="checkbox" value="1" id="save-information" name="data[save-information]">
                                    <label for="save-information">ذخیره اطلاعات تماس</label> 
                                </div>
							</div>
						</div>
						<div class="Antivirus">
							<div class="operators">
								<div data-type="Eset" class="operator Antivirus Eset"><i></i></div>
								<div data-type="BitDefender" class="operator Antivirus BitDefender"><i></i></div>
								<div data-type="Kaspersky" class="operator Antivirus Kaspersky"><i></i></div>
								<div data-type="Norton" class="operator Antivirus Norton"><i></i></div>
							</div>
							<div class="buy">
								<div class="info">
									<div id="operator"></div>
									<div class="title"></div>
									<div class="description"></div>
									<div class="back-button">بازگشت</div>
								</div>
								<div class="input text antivirus-types">
									<select id="AntivirusTypes" class="input-large" name="data[ProductId]"></select>
									<input type="hidden" id="UnitAmount" value="0">
								</div>
								<div class="input text">
									<div class="input text required count">
										<input type="text" id="count" class="eng">
									</div>
									<div class="amount-container">
										<span class="amount-title">مبلغ</span>
										<span class="amount-value"></span>
										<span class="amount-unit">تومان</span>
									</div>
								</div>
								<div class="input text email">
									<input id="EmailInput" class="input-large" type="email" maxlength="50" value="" title="آدرس ایمیل را به شکل صحیح بنویسید!" rel="tooltip" placeholder="you@domain.com">
								</div>
								<div class="input text required account">
									<input id="dataAccountTemp" class="input-large cellphone" type="text" value="" placeholder="شماره موبایل" maxlength="11">
								</div>
                                <div class="save-information">
                                    <input type="checkbox" value="1" id="save-information" name="data[save-information]">
                                    <label for="save-information">ذخیره اطلاعات تماس</label> 
                                </div>
							</div>
						</div>
                        <div class="InternetPackage">
							<div class="operators"></div>
							<div class="buy">
								<div class="info">
                                    <div id="operator"></div>
									<div class="title"></div>
									<div class="description"></div>
									<div class="clear"></div>
								</div>
								<div class="input text required account">
									<input id="dataAccountTemp" class="input-large cellphone" type="text" value="" placeholder="شماره موبایل" maxlength="11">
								</div>
								<div class="input sim-type-container">
									<label class="radio-inline">
										<input type="radio" name="sim-type" value="Prepaid" checked="checked">سیم کارت اعتباری
									</label>
									<label class="radio-inline">
										<input type="radio" name="sim-type" value="Postpaid">سیم کارت دائمی
									</label>
								</div>
                                <div class="input text internetPackage-types">
                                    <select id="InternetPackageCategories" class="input-large" name="data[packageId]"></select>
                                    <input type="hidden" id="UnitAmount" value="0">
                                </div>
                                <div class="input text internetPackage-types">
                                    <select id="InternetPackageTypes" class="input-large" name="data[packageId]"></select>
                                    <input type="hidden" id="UnitAmount" value="0">
                                </div>
                                <div class="input text">
									<div class="amount-container">
										<span class="amount-title">مبلغ</span>
										<span class="amount-value" id="UnitAmount"></span>
										<span class="amount-unit">تومان</span>
									</div>
									<div class="clear"></div>
								</div>
								<div class="input text email">
									<input id="EmailInput" class="input-large" type="email" maxlength="50" value="" title="آدرس ایمیل را به شکل صحیح بنویسید!" rel="tooltip" placeholder="you@domain.com">
								</div>
                                <div class="save-information">
                                    <input type="checkbox" value="1" id="save-information" name="data[save-information]">
                                    <label for="save-information">ذخیره اطلاعات تماس </label> 
                                </div>
							</div>
						</div>
						<div class="payment-gateways">
							<p>درگاه پرداخت: <i></i></p>
							<ul>
								<li id="Parsian" class="bank-Parsian" data-tooltip="پارسیان"></li>
								<li id="Mellat" class="bank-Mellat" data-tooltip="ملت"></li>
								<li id="Saman" class="bank-Saman" data-tooltip="سامان"></li>
								<li id="Melli" class="bank-Melli" data-tooltip="ملی"></li>
								<li id="Fanava" class="bank-Fanava" data-tooltip="فن آوا"></li>
                                <li id="Emtiyaz" class="bank-Emtiyaz" data-tooltip="امتیاز"></li>
                                <li id="Zarinpal" class="bank-Zarinpal" data-tooltip="زرین پال"></li>
							</ul>
							<p class="caution">خرید با کلیه کارت های بانکی عضو شبکه شتاب امکان پذیر می باشد.</p>
						</div>
						<input type="hidden" id="dataWebserviceId" name="data[webserviceId]">
						<input type="hidden" id="dataRedirectUrl" name="data[redirectUrl]" value="<?php echo $root . '/verify.php'; ?>">
						<input type="hidden" id="dataChargeKind" name="data[ChargeKind]">
						<input type="hidden" id="dataCellphone" name="data[cellphone]">
						<input type="hidden" id="dataAmount" name="data[amount]">
						<input type="hidden" id="dataCount" name="data[count]">
						<input type="hidden" id="dataEmail" name="data[email]">
						<input type="hidden" id="dataType" name="data[type]">
						<input type="hidden" id="dataProductId" name="data[productId]">
						<input type="hidden" id="dataIsTarabord" name="data[isTarabord]">
						<input type="hidden" id="dataIssuer" name="data[issuer]">
						<input type="hidden" id="dataRedirectToPage" name="data[paymentDetails]" value="true">
						<input type="hidden" id="dataRedirectToPage" name="data[redirectToPage]" value="true">
						<input type="hidden" id="dataRedirectToPage" name="data[scriptVersion]" value="Script-5.4">
						<input type="hidden" id="dataRedirectToPage" name="data[firstOutputType]" value="json">
						<input type="hidden" id="dataRedirectToPage" name="data[secondOutputType]" value="get">
					</fieldset>
					<div class="submit">
						<input type="submit" value="پــرداخــت">
					</div>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<a href="<?php echo $root; ?>/application.php" class="application"><img src="<?php echo $root; ?>/img/DownloadAndroidApplication.gif" title="دانلود اپلیکیشن اندروید خرید شارژ و پرداخت قبوض" alt="اپلیکیشن اندروید خرید شارژ و پرداخت قبوض"/></a>
	<div id="payment-process"></div>
	<div class="cover"></div>
	<div class="connecting"><p></p></div>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
	<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
	<script type="text/javascript" src="js/sweetalert2.js"></script>
	<script type="text/javascript" src="js/charge.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="https://cdn.zarinpal.com/zarinak/v1/checkout.js"></script>
	<script type="text/javascript">
		var WebserviceID = <?php echo '"' . $config['webserviceID'] . '"'; ?>;
	</script>
</body>
</html>