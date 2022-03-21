<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice</title>

    <link href="<?=base_url()?>asset/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/components/images/hwi_favicon_logo.png" rel="shortcut icon" type="image/x-icon">
    <link href="<?=base_url()?>asset/components/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>asset/components/alertify/alertify.css" rel="stylesheet" type="text/css">
    
    <style type="text/css">
        body{
            font-size: 11px;
        }

        .container{
            width: 880px;
            padding: 50px;
        }

        .heading{
            border-top: 1px solid #000;
            border-left: 1px solid #000;
            border-right: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12 heading">
                        <img src="<?=base_url()?>asset/components/images/hwi_letterhead.png" width="100%">
                    </div>
                    <div class="col-md-12 heading">
                        <b>
                        <div><?=ucfirst(ucfirst($employee->employee_first_name)).' '.ucfirst(ucfirst($employee->employee_last_name))?></div>
                        <div><?=nl2br($employee->employee_city_address)?></div>
                        <div><?=$employee->employee_mobile_number?></div>
                        </b>
                    </div>
                    <?php $total = 0;?>
                    <div class="col-md-12 heading" style="padding: 0px">
                        <table style="width: 100%;">
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="16%" style="vertical-align: top;">&nbsp;<b>Date:</b> </td>
                                <td width="34%" colspan="2" style="border-right: 1px solid #000;"><?=$invoice['project_dates_str'];?></td>
                                <!-- <td width="17%" style="border-right: 1px solid #000;">&nbsp;<?=date("F d, Y", strtotime($invoice['project_end_date']));?></td> -->
                                <td width="16%" style="border-left: 1px solid #000;vertical-align: top;">&nbsp;<b>To:</b> </td>
                                <td width="34%" colspan="2">Hotwork International Inc.</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="16%">&nbsp;<b>Site:</b> </td>
                                <td width="34%" colspan="2"><?=$project->project_complete_address?></td>
                                <td width="16%" style="border-left: 1px solid #000;"></td>
                                <td width="34%" colspan="2">Humay-humay Road,</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="16%">&nbsp;<b>Project:</b> </td>
                                <td width="34%" colspan="2"><?=$client_name?> - <?=$project->project_name?></td>
                                <td width="16%" style="border-left: 1px solid #000;"></td>
                                <td width="34%" colspan="2">Lapu-lapu City, 6015</td>
                            </tr>
                            <tr>
                                <td width="16%">&nbsp;<b>Scope:</b> </td>
                                <td width="34%" colspan="2"><?=$invoice['project_scope']?></td>
                                <td width="16%" style="border-left: 1px solid #000;"></td>
                                <td width="34%" colspan="2">341-3825 / 341-3826</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12 heading" style="font-size: 20px;height: 35px;text-align: center;">
                        <b><?=$invoice_number?></b>
                    </div>
                    <div class="col-md-12 heading" style="padding: 0px !important;">
                        <table style="width: 100%;">
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="80%" colspan="4" align="center"><b>DESIGNATION</b></td>
                                <td width="20%" align="center" style="border-left: 1px solid #000;"><b>AMOUNT</b></td>
                            </tr>
                            <tr>
                                <td width="20%" style="padding-bottom: 20px;"></td>
                                <td width="15%" style="padding-bottom: 20px;border-left: 1px solid #000;">&nbsp;No. of days</td>
                                <td width="25%" style="padding-bottom: 20px;">Daily Rate</td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;"></td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;"></td>
                            </tr>
                            <tr>
                                <td width="20%" style="padding-bottom: 20px;padding-left: 3px;">
                                    Daily Rate: 
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>Conversion: </div>
                                    <?php }?>
                                </td>
                                <td width="15%" style="padding-bottom: 20px;border-left: 1px solid #000;">&nbsp;
                                    <span style="text-decoration: underline;"><?=$invoice['daily_rate_days']?></span> Day(s) 
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>&nbsp;(1 <?=$rate['currency']?> - <?=number_format($rate['currency_average'], 2)?>)</div>
                                    <?php }?>
                                </td>
                                <td width="25%" style="padding-bottom: 20px;">
                                    @ <?=$rate['currency']?> <span style="text-decoration: underline;"><?=number_format($rate['daily_rate'], 2)?></span> / Day
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>= PHP <?=number_format((round($rate['daily_rate'] * $rate['currency_average'], 2)), 2)?></div>
                                    <?php }?>
                                </td>
                                <?php 
                                    $total_daily = round($rate['daily_rate'] * $rate['currency_average'] * $invoice['daily_rate_days'], 2);
                                    $total += $total_daily;
                                ?>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center"><?=$invoice['daily_rate_dates']?></td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span> <?=number_format(($total_daily), 2)?>
                                </td>
                            </tr>
                            <?php if($employee->employee_is_regular == 0 && isset($invoice['with_travelling_rate'])){ ?>
                            <tr >
                                <td width="20%" style="padding-bottom: 20px;padding-left: 3px;">
                                    Travelling Rate:
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>Conversion: </div>
                                    <?php }?>
                                </td>
                                <td width="15%" style="padding-bottom: 20px;border-left: 1px solid #000;">&nbsp;
                                    <span style="text-decoration: underline;"><?=$invoice['travelling_days']?></span> Day(s)
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>&nbsp;(1 <?=$rate['currency']?> - <?=number_format($rate['currency_average'], 2)?>)</div>
                                    <?php }?>
                                </td>
                                <td width="25%" style="padding-bottom: 20px;">
                                    @ <?=$rate['currency']?> <span style="text-decoration: underline;"><?=number_format($rate['travel_rate'], 2)?></span> / Day
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>= PHP <?=number_format((round($rate['travel_rate'] * $rate['currency_average'], 2)), 2)?></div>
                                    <?php }?>
                                </td>
                                <?php 
                                    $total_travel = round($rate['travel_rate'] * $rate['currency_average'] * $invoice['travelling_days'], 2);
                                    $total += $total_travel;
                                ?>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center"><?=$invoice['travelling_start_date']?></td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span> <?=number_format(($total_travel), 2)?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if($rate['pl_rate'] != 0 && isset($invoice['with_project_leader_rate'])){ ?>
                            <tr>
                                <td width="20%" style="padding-bottom: 20px;padding-left: 3px;">
                                    Project Leader Rate:
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>Conversion: </div>
                                    <?php }?>
                                </td>
                                <td width="15%" style="padding-bottom: 20px;border-left: 1px solid #000;vertical-align: top;">&nbsp;
                                    <span style="text-decoration: underline;"><?=$invoice['project_leader_days']?></span> Day(s)
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>&nbsp;(1 <?=$rate['currency']?> - <?=number_format($rate['currency_average'], 2)?>)</div>
                                    <?php }?>
                                </td>
                                <td width="25%" style="padding-bottom: 20px;vertical-align: top;">
                                    @ <?=$rate['pl_currency']?> <span style="text-decoration: underline;"><?=number_format($rate['pl_rate'], 2)?></span> / Day
                                    <?php if($rate['is_different_currency']){ ?>
                                        <div>= PHP <?=number_format((round($rate['pl_rate'] * $rate['pl_currency_average'], 2)), 2)?></div>
                                    <?php }?>
                                </td>
                                <?php 
                                    $total_pl = round($rate['pl_rate'] * $rate['pl_currency_average'] * $invoice['project_leader_days'], 2);
                                    $total += $total_pl;
                                ?>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;vertical-align: top;" align="center"><?=$invoice['project_leader_start_date']?></td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;vertical-align: top;" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span> <?=number_format(($total_pl), 2)?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if(isset($invoice['with_meal_allowance'])){ ?>
                            <tr>
                                <td width="20%" style="padding-bottom: 20px;padding-left: 3px;">
                                    Meal Allowance: 
                                    <?php if($employee->employee_is_regular == 1 && $rate['meal_allowance_php_value'] != 1){ ?>
                                        <div>Conversion: </div>
                                    <?php }?>
                                </td>
                                <td width="15%" style="padding-bottom: 20px;border-left: 1px solid #000;">&nbsp;<span style="text-decoration: underline;"><?=$invoice['meal_allowance_days']?></span> Day(s) 
                                    <?php if($employee->employee_is_regular == 1 && $rate['meal_allowance_php_value'] != 1){ ?>
                                        <div>&nbsp;(1 <?=strtoupper($rate['meal_currency'])?> - <?=number_format($rate['meal_allowance_php_value'], 2)?>)</div>
                                    <?php }?>
                                </td>
                                <td width="25%" style="padding-bottom: 20px;">@ <?=strtoupper($rate['meal_currency'])?> <span style="text-decoration: underline;"><?=number_format($rate['meal_allowance'], 2)?></span> / Day
                                    <?php if($employee->employee_is_regular == 1 && $rate['meal_allowance_php_value'] != 1){ ?>
                                        <div>= PHP <?=number_format((round($rate['meal_allowance'] * $rate['meal_allowance_php_value'], 2)), 2)?></div>
                                    <?php }?>
                                </td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center"><?=$invoice['meal_allowance_start_date']?></td>
                                <?php
                                    if($employee->employee_is_regular == 1 && $rate['meal_allowance_php_value'] != 1){
                                        $total_ml = round($invoice['meal_allowance_days'] * $rate['meal_allowance'] * $rate['meal_allowance_php_value'], 2);
                                    }
                                    else{
                                        $total_ml = round($invoice['meal_allowance_days'] * $rate['meal_allowance'], 2);
                                    }

                                    $total += $total_ml;
                                ?>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span>
                                    <?=number_format($total_ml, 2)?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if(isset($invoice['with_visa_application'])){ ?>
                            <tr>
                                <td width="20%" style="padding-bottom: 20px;padding-left: 3px;">Visa Application: </td>
                                <td width="15%" style="padding-bottom: 20px;border-left: 1px solid #000;">&nbsp;<span style="text-decoration: underline;"><?=$invoice['visa_days']?></span> Day(s)</td>
                                <td width="25%" style="padding-bottom: 20px;">@ PHP <span style="text-decoration: underline;"><?=number_format($rate['visa_rate'], 2)?></span> / Day</td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center"><?=$invoice['visa_start_date']?></td>                                
                                <?php 
                                    $total_visa = round($rate['visa_rate'] * $invoice['visa_days'], 2);
                                    $total += $total_visa;
                                ?>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span> <?=number_format(($total_visa), 2)?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if($invoice['for_refund'] != '' && (int)$invoice['for_refund'] != 0){ ?>
                            <tr>
                                <td width="20%" style="padding-bottom: 20px;padding-left: 3px;vertical-align: top;">For Refund: </td>
                                <td width="40%" colspan="2" align="center" style="padding-bottom: 10px;border-left: 1px solid #000;">
                                    <i>Please see attached "Expense<br>Report Liquidation Form" for details</i>
                                </td>                              
                                <?php 
                                    $total_refund = round($invoice['for_refund'], 2);
                                    $total += $total_refund;
                                ?>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center"></td>
                                <td width="20%" style="padding-bottom: 20px;border-left: 1px solid #000;" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span> 
                                    <?=number_format($total_refund, 2)?>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>                     
                                <?php 
                                    $total_without_advances = $total;
                                ?>
                                <td width="20%"></td>
                                <td width="40%" colspan="2" style="border-left: 1px solid #000;"></td>
                                <td width="20%" style="border-left: 1px solid #000;background-color: #eee">&nbsp;TOTAL:</td>
                                <td width="20%" style="border-left: 1px solid #000;background-color: #ddd" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span>
                                    <?=number_format($total_without_advances, 2)?>
                                </td>
                            </tr>
                            <?php if(!empty($invoice['advances'])){ ?>
                            <tr>
                                <td width="20%" style="padding-top: 10px;padding-left: 3px;">Less Advances: </td>
                                <td width="40%" colspan="2" style="padding-top: 10px;border-left: 1px solid #000;">&nbsp;Day Rate Advances</td>
                                <td width="20%" style="padding-bottom: 10px;border-left: 1px solid #000;"></td>
                                <td width="20%" style="padding-bottom: 10px;border-left: 1px solid #000;"></td>
                            </tr>
                            <?php foreach($invoice['advances'] as $advance){ ?>
                            <tr>
                                <td width="20%"></td>
                                <td width="15%" style="border-left: 1px solid #000;"></td>
                                <td width="25%">CV# <span style="text-decoration: underline;"><?=$advance['advance_cv']?></span></td>
                                <td width="20%" style="border-left: 1px solid #000;vertical-align: top;" align="center"><?=date("F d, Y", strtotime($advance['advance_date']));?></td>
                                <?php 
                                    $total_advance = round($advance['advance_amount'], 2);
                                    $total -= $total_advance;
                                ?>
                                <td width="20%" style="border-left: 1px solid #000;vertical-align: top;" align="center">
                                    <span style="position: absolute;right: 140px;">₱</span> 
                                    <?=number_format($total_advance, 2)?>
                                </td>
                            </tr>
                            <?php }} ?>
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="20%" style="padding-bottom: 50px;"></td>
                                <td width="15%" style="padding-bottom: 50px;border-left: 1px solid #000;"></td>
                                <td width="25%" style="padding-bottom: 50px;"></td>
                                <td width="20%" style="padding-bottom: 50px;border-left: 1px solid #000;vertical-align: top;"></td>
                                <td width="20%" style="padding-bottom: 50px;border-left: 1px solid #000;vertical-align: top;"></td>
                            </tr>
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="80%" colspan="4" align="center"><b>TOTAL RECEIVABLES</b></td>
                                <td width="20%" align="center" style="border-left: 1px solid #000;background-color: #ff867c;color:#7f0000;">
                                    <span style="position: absolute;right: 140px;">₱</span> 
                                    <b>
                                        <?=number_format($total, 2)?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td width="15%" style="padding-top: 40px;vertical-align: top;">&nbsp;Approved by:</td>
                                <td width="45%" colspan="2" style="padding-top: 40px;">
                                    <div style="border-bottom: 1px solid #000;width: 75%;">&nbsp;</div>
                                    <div style="text-align: center;width: 75%;"><b>FRANCIS ARCILLA</b></div>
                                </td>
                                <td width="40%" colspan="2" style="padding-top: 40px;vertical-align: top;">
                                    <div style="position:relative;border-bottom: 1px solid #000;width: 75%;">&nbsp;
                                        <?php if($employee->employee_signature != '') {?>
                                        <img src="<?=base_url()?>asset/signatures/<?=$employee->employee_signature?>" height="120px;" style="position:absolute;top:-50px;right:60px;">
                                        <?php } ?>
                                    </div>
                                    <div style="text-align: center;width: 75%;"><b><?=strtoupper($employee->employee_first_name)." ".strtoupper($employee->employee_last_name)?></b></div>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="15%" style="padding-top: 30px;padding-bottom: 40px;vertical-align: top;"></td>
                                <td width="45%" colspan="2" style="padding-top: 30px;padding-bottom: 40px;">
                                    <div style="border-bottom: 1px solid #000;width: 75%;">&nbsp;</div>
                                    <div style="text-align: center;width: 75%;"><b>MARCIA HEIDELIZA LOPEZ</b></div>
                                </td>
                                <td width="40%" colspan="2" style="padding-top: 30px;padding-bottom: 40px;">
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #000;">
                                <td width="100%" colspan="5" align="center">
                                    <hr width="70%" style="height: 2px;background-color: red;">
                                    <div style="text-align: center;margin-top:-10px;">Humay-humay Rd., Lapu-Lapu City, Cebu, Philippines</div>
                                    <div style="text-align: center;margin-bottom: 20px;">Tel.: 0063 (0)32 341 38-26 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax: 0063 (0)32 341 38-25 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-Mail: marcia.lopez@hotwork.ag</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script src="<?=base_url()?>asset/components/js/jquery.min.js"></script>
    <script src="<?=base_url()?>asset/components/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>