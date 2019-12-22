<!DOCTYPE html>
<html>
<head>
<title>A Responsive Email Template</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- <style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important;}

    /* iOS BLUE LINKS */
    .card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border: 0px solid black;
}

/* On mouse-over, add a deeper shadow */


/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}

.wrapper {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-column-gap: 1px;
  
}
.letter{
	margin-left: 15px;
}


.table td,
.table th {
    color: #222;
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    font-weight: normal;
}

.billing {
    padding: 5px 22px;
    font-size: 18px;
    color: white;
    background: #F11411;
    margin-top: 0;
}


.content {
    padding: 5px 15px;
    float: left;
}

.content p {
    font-size: 16px;
    color: #000;
    font-weight: 500;
}

.details p {
    font-size: 16px;
}

.details {
    padding: 5px 10px;
    margin-top: 25px;
    float: right;
    display:block;
    overflow: hidden;
}
.row {
    border: 1px solid #ccc;
    overflow: hidden;
}

.quotation {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 35px;
}

.quotation td {
  padding: 5px;
  border-bottom: 1px solid #ddd;
  
}
.button1{
  background-color: white; 
  color: #f44336; 
  border: 2px solid #f44336;
  padding: 10px;
  margin-bottom: 10px;
}

   
</style> -->
</head>
<body style="margin: auto 250px !important;">
 <div style="border-bottom: 1px solid #000000; background-color: #F9F9F9; overflow: hidden;">	
  <img style=" float: right; display: block;  height: 60px; width: 200px;" src="<?= base_url().'front_assets/images/logo/logo.png'; ?>">
  </div>

<!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%"  class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>

                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                    	<tr>
                                            <h1 align="left" style="padding: 20px 0 0 0; font-style: bold; font-size: 16px;  font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">QUOTATION NUMBER <?=$custom_quote_id?></h1>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px;  font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">Dear Customer,
                                            	<p>Thank you for using our online quote system.</p>
                                            	<p>The order for relative quote has been correctly registered with the number <?=$custom_quote_id?></p>
                                            	<p>Always specify this when communicating with our operators to ask for information or assistance.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">We remind you that by accessing your personal area, you can check the progress of your order in real time in the My Quotation tab.</td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: red;" class="padding-copy">
                                            	<i>Very Shortly you will receive a notification, when your requested quote is ready with best price.</i></td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px;  font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">You will find the following information in this coming email:</td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px;  font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">
                                            	<ul>
                                            	<li>Quotation details with amounts</li>
                                            	<li>Approved quotation</li>
                                            	<li>Payment method</li>
                                            	<li>Sending files: information</li>
                                            	<li>Order Summary</li>
                                            	<li>Billing information</li>
                                            	</ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="padding: 20px 0 0 0; font-size: 16px; text-transform: uppercase; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #000000;" class="padding-copy">THANKS<br>FOR CHOOSING PHOTOOT!</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
</table>


<div class="row">
<h3 class="billing">Your Billing Information </h3>

<div class="content">
	<?php var_dump($user_info); ?>
        <p>DIDIACT DI HAZARI AMINUL Ditta Individuale<br>
            Partita IVA04249970270<br>
            Codice fiscale: 04249970270<br>
            RIVIERA DEI PONTI ROMANI, 8<br>
            35121 PADOVA (PD)<br>
            Italia</p>


</div>
      <div class="details">
           <p>Aminul <br>Cellulare: +393294074723 <br>Email: xyz@gmail.com<br> Indirizzo
            PEC:aminulhazari@pec.it<br>Codice Destinatario: BA6ET11</p>
      </div>
</div>
 <h2 style="text-align: center; color: #F11411;">Quotation details</h2>
<table class="quotation">
<!--   <tr>
    <th>Firstname</th>
    <th>Savings</th>
  </tr> -->
  <tr>
    <td style="text-align: left;  padding-left: 130px;">Number of copies</td>
    <td style="text-align: right; padding-right: 130px;">100</td>
  </tr>
  <tr>
    <td style="text-align: left;  padding-left: 130px;">Name this job</td>
    <td style="text-align: right; padding-right: 130px;">abc</td>
  </tr>
  <tr>
    <td style="text-align: left;  padding-left: 130px;">Additional services</td>
    <td style="text-align: right; padding-right: 130px;">CROP IMAGE</td>
  </tr>
  <tr>
    <td style="text-align: left; padding-left: 130px;">Delivery Time</td>
    <td style="text-align: right; padding-right: 130px;">STANDARD 72 HOURS € 0,00</td>
  </tr>
</table>


<table style=" border: 2px solid red; border-collapse: separate !important; border-radius: 15px; width: 100%; text-align: center;padding: 0;">
	<tr>
		<td style="text-align: center; margin-top: 35px;">
			<p style="   text-align: center;color: #1E3E7D; padding: 2px; font-size: 20px;">We remind you that by accessing your personal area, you can check the progress of your order in real time in the My Quotation tab.</p>
			<button class="button button1" style="width: 489px;border-radius: 10px;">Click here></button>
			</td>

	</tr>

</table>

<table  style=" border: 2px solid red; border-collapse: separate !important; border-radius: 15px; width: 100%; text-align: center;padding: 0;
   margin-top: 35px;">
	<tr>
		<td>
			<img src="<?= base_url('front_assets/email_assets/custom_quote/p.PNG'); ?>">
		</td>
	</tr>
</table>

<table  style=" border: 2px solid #666665; background: #666665; border-collapse: separate !important; border-radius: 15px; width: 100%; text-align: center;padding: 0;
    margin-top: 35px;">
	<tr>
		<td>
			<img src="<?= base_url('front_assets/email_assets/custom_quote/p2.PNG'); ?>">
		</td>
	</tr>
</table>
<table  style=" border: 2px solid #2C52A4; background: #2C52A4; border-collapse: separate !important; border-radius: 15px; width: 100%; text-align: center;padding: 0;
    margin-top: 10px;">
	<tr>
		<td>
			<img src="front_assets/email_assets/custom_quote/p3.PNG">
		</td>
	</tr>
</table>


<br>
<br>
<br>
<br>
<br>

</body>
</html>