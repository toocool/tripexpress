<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
 
<link rel="STYLESHEET" href="css/print_static.css" type="text/css" />
<style>
.main_table strong{
  font-size: 12pt;
}
</style>
</head>

<body>

<div id="body">
  <div id="section_header">
</div>

<div id="content">
  
  <div class="page" style="font-size: 7pt">
    <table style="width: 100%;" class="header">
      <tr>
        <td style="border: 1px solid #000;padding:10px;">
          <?php echo strtoupper($company_info->company_name) ?><br/>
          <?php echo ucfirst($company_info->company_street) ?>, <?php echo $company_info->company_zip ?><br/>
          <?php echo ucfirst($company_info->company_city) ?>, <?php echo $company_info->company_state ?><br/>
          Phone 1: <?php echo $company_info->company_phone_one ?><br/>
          Phone 2:<?php echo $company_info->company_phone_two ?><br/>
          E-mail: <?php echo $company_info->company_email ?><br/>
        </td>
        <td><h1 style="text-align: right;margin:0;padding:0;"><img style="margin:0;padding:0;" src="images/bus_example_logo.png" /></h1></td>
      </tr>
    </table>

    <table style="width: 100%; font-size: 8pt;margin-bottom:10px;">
      <tr>
        <td>Invoice ID: <strong><?php echo $id; ?></strong></td>
      </tr>
      <tr>
        <td>Created on: <strong> <?php echo $booking->created_time?></strong></td>
      </tr>
       <tr>
        <td>Created by: <strong> <?php echo $this->booking->get_username($booking->created_by) ?></strong></td>
      </tr>
    </table>

    <hr style="border: 1px solid #000;border-bottom: 0px;"/>

    <h2>TRAVEL PLAN</h2>

    <table class="main_table" style="width: 100%; font-size: 10pt;margin-bottom:10px;margin-bottom: 10px;">
      <tr>
        <td>from: <br/> <strong><?php echo $this->booking->get_city_name($booking->from) ?></strong> </td>
        <td>to: <br/> <strong><?php echo $this->booking->get_city_name($booking->to) ?></strong> </td>
        <td>Departing: <br /><strong> <?php echo date("d.m.Y H:i",strtotime($booking->from_start_time)) ?></strong></td>
        <td>Price: <br /><strong> <?php echo $booking->start_price ?> <?php echo $this->booking->show_symbol($company_info->company_currency) ?></strong></td>
      </tr>
      <?php if($booking->returning == 2 ) {?>
      <tr>
        <td>from: <br/> <strong><?php echo $this->booking->get_city_name($booking_returned->from) ?></strong> </td>
        <td>to: <br/> <strong><?php echo $this->booking->get_city_name($booking_returned->to) ?></strong> </td>
        <td>Departing: <br /><strong> <?php echo date("d.m.Y H:i",strtotime($booking_returned->from_start_time)) ?></strong></td>
        <td>Price: <br /><strong> <?php echo $booking_returned->start_price ?> <?php echo $this->booking->show_symbol($company_info->company_currency) ?></strong></td>
      </tr>
      <?php } ?>
       <tr>
        <td> </td>
        <td> </td>
        <td ></td>
        <?php if($booking->returning == 2 ) {?>
          <td>Total:<br/><strong> <?php echo $booking->start_price + $booking_returned->start_price ?>.00 <?php echo $this->booking->show_symbol($company_info->company_currency) ?></strong></td>
        <?php } else { ?>
          <td>Total:<br/><strong> <?php echo $booking->start_price ?> </strong></td>
        <?php } ?>
      </tr>
    </table>

    <hr style="border: 1px solid #000;border-bottom: 0px;"/>
    <h2>CUSTOMER INFORMATION</h2>

    <table class="main_table" style="width: 100%; font-size: 10pt;margin-bottom:10px;margin-bottom: 10px;">
      <tr>
        <td>First name: <br/> <strong><?php echo ucfirst($booking->client_firstname) ?> </strong> </td>
        <td>Last name: <br/> <strong><?php echo ucfirst($booking->client_lastname) ?></strong> </td>
        <td>Social number: <br /><strong><?php echo $booking->identification_nr ?></strong></td>
       
      </tr>
            
    </table>

    <hr style="border: 1px solid #000;border-bottom: 0px;"/>

    <h2>NOTE:</h2>
    <hr style="border: 1px solid #000;padding:30px;margin-bottom:10px;"/>
    
    <hr style="border: 1px solid #000;border-bottom: 0px;"/>
    
    <h2>RULES AND REGULATIONS</h2>
    <p>
      <?php echo $company_info->company_rules ?>
    </p>

    <h1 style="text-align:center;margin-top:50px;">Thank you! </h1>
    

  </div>

</div>
</div>

<script type="text/php">

if ( isset($pdf) ) {

  $font = Font_Metrics::get_font("verdana");
  // If verdana isn't available, we'll use sans-serif.
  if (!isset($font)) { Font_Metrics::get_font("sans-serif"); }
  $size = 6;
  $color = array(0,0,0);
  $text_height = Font_Metrics::get_font_height($font, $size);

  $foot = $pdf->open_object();
  
  $w = $pdf->get_width();
  $h = $pdf->get_height();

  // Draw a line along the bottom
  $y = $h - 2 * $text_height - 24;
  $pdf->line(16, $y, $w - 16, $y, $color, 1);

  $y += $text_height;

  $text = "Job: 132-003";
  $pdf->text(16, $y, $text, $font, $size, $color);

  $pdf->close_object();
  $pdf->add_object($foot, "all");

  global $initials;
  $initials = $pdf->open_object();
  
  // Add an initals box
  $text = "Initials:";
  $width = Font_Metrics::get_text_width($text, $font, $size);
  $pdf->text($w - 16 - $width - 38, $y, $text, $font, $size, $color);
  $pdf->rectangle($w - 16 - 36, $y - 2, 36, $text_height + 4, array(0.5,0.5,0.5), 0.5);
    

  $pdf->close_object();
  $pdf->add_object($initials);
 
  // Mark the document as a duplicate
  $pdf->text(110, $h - 240, "DUPLICATE", Font_Metrics::get_font("verdana", "bold"),
             110, array(0.85, 0.85, 0.85), 0, 0, -52);

  $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  

  // Center the text
  $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
  $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);
  
}
</script>

</body>
</html>