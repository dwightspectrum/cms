<?php 
  
  $reminder = "";

  if($po->purchase_order_reminder_date != NULL){
    $reminder = $po->purchase_order_reminder_date;
  }else{
    $reminder = $po->purchase_order_reminder_month . " months";
  } 
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Project</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?=base_url()?>purchaseorder/edit/<?=$po->purchase_order_id?>" class="btn btn-danger pull-right m-l-20"><i class="fa fa-pencil"></i> Edit Project</a>
            <ol class="breadcrumb m-r-15">
                <li><a href="<?=base_url()?>purchaseorder/view">Projects</a></li>
                <li class="active">Details</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="white-box bg-danger m-b-0">
          <div class="city-weather-widget">
              <h2 style="text-transform: uppercase;"><b><?=$po->purchase_order_name;?></b></h2>
              <h4>P.O. #: <?=$po->purchase_order_number;?></h4>
          </div>
        </div>
        <div class="panel">
          <div class="row">
            <div class="col-md-12">
              <div class="white-box">
                <div class="table-responsive m-t-30">
                <div class="sttabs tabs-style-flip col-md-12">
                  <nav>
                      <ul>
                          <li><a href="#section-flip-1" class="sticon ti-home"><span>TECHNICAL/WAREHOUSE</span></a></li>
                          <li><a href="#section-flip-2" class="sticon ti-shopping-cart"><span>ACCOUNTING</span></a></li>
                          <li><a href="#section-flip-3" class="sticon ti-settings"><span>OPERATIONS</span></a></li>
                          <li><a href="#section-flip-4" class="sticon ti-harddrives"><span>CLIENT DETAILS</span></a></li>
                          <li><a href="#section-flip-5" class="sticon ti-truck"><span>PULL OUTS</span></a></li>
                          <li><a href="#section-flip-6" class="sticon ti-move"><span>ADDITIONALS</span></a></li>
                          <li><a href="#section-flip-7" class="sticon ti-briefcase"><span>POST PROJECT</span></a></li>
                      </ul>
                  </nav>
                  <div class="content-wrap">
                    <section id="section-flip-1">
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Project Name
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_name;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            No. of Manpower
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_manpower;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Deployment Date
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_deployment_schedule;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Start Date
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_start_date;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Packing List
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_packing_list;?>">
                          </div>
                          <div class="col-md-1 m-t-10">
                            <?php if($po->purchase_order_packing_list){?><a href="<?=base_url()?>asset/projects/shipping_documents/<?=$po->purchase_order_packing_list;?>" target="_blank"><span class="fa fa-download" style="font-size: 20px;"></span></a><?php }?>
                          </div>
                          <div class="col-md-2 m-t-10">
                            End Date
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_end_date;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Proforma Invoice
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_commercial_invoice;?>">
                          </div>
                          <div class="col-md-1 m-t-10">
                            <?php if($po->purchase_order_commercial_invoice){?><a href="<?=base_url()?>asset/projects/shipping_documents/<?=$po->purchase_order_commercial_invoice;?>" target="_blank"><span class="fa fa-download" style="font-size: 20px;"></span></a><?php }?>
                          </div>
                          <div class="col-md-2 m-t-10">
                            Equipment Origin
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control" rows="3" readonly="" class="form-control" value="<?=$po->purchase_order_equipment_origin;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Equipment Description
                          </div>
                          <div class="col-md-3">
                            <textarea class="form-control" rows="3" readonly="" class="form-control"><?=$po->purchase_order_equipment_description;?></textarea>
                          </div>
                          <div class="col-md-1 m-t-10"></div>
                          <div class="col-md-2 m-t-10">
                            Job / Scope
                          </div>
                          <div class="col-md-3">
                            <textarea class="form-control" rows="3" readonly="" class="form-control"><?=$po->purchase_order_scope;?></textarea>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section id="section-flip-2">
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Purchase Order #
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_number;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Purchase Order Date
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_date;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Terms of Payment
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_terms;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Currency
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_currency;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Amount
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=number_format($po->purchase_order_amount);?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Vat Amount
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=number_format($po->purchase_order_vat_amount);?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Net Amount
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=number_format($po->purchase_order_net_amount);?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Total Site Time
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=number_format($po->purchase_order_total_site_time).' days';?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Extra Day Rate
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=number_format($po->purchase_order_extra_day_rate);?>">
                          </div>
                        </div>
                      </div>
                    </section>
                    <section id="section-flip-3">
                      <div>
                        <div class="pull-right">
                          <input type="text" name="search" id="search" placeholder="Search" class="form-control">
                        </div>
                        <h3>List of Manpower</h3>
                      </div>
                      <div class="table-responsive m-t-30">
                        <table class="table color-table inverse-table table-striped">
                            <thead>
                                <tr>
                                    <th title="TECHNICIAN NAME">NAME</th>
                                    <th title="PROJECT MANAGER">PROJECT MANAGER</th>
                                    <th title="ACCOMODATION FILE">ACC. FILE</th>
                                    <th title="TRANSPORTATION FILE">TRA. FILE</th>
                                    <th title="FLIGHT TICKET FILE">FLI. FILE</th>
                                    <th title="WIFI FILE">WIF. FILE</th>
                                    <th title="VISA FILE">VIS. FILE</th>
                                    <th title="BOSH FILE">BOS. FILE</th>
                                    <th title="CONFINED SPACES FILE">CON. FILE</th>
                                    <th title="WORK AT HEIGHTS FILE">WOR. FILE</th>
                                    <th title="NBI CLEARANCE FILE">NBI. FILE</th>
                                    <th title="DFA RED RIBBON/AUTHENTICATION">DFA. FILE</th>
                                    <th title="MEDICAL FILE">MED. FILE</th>
                                    <th title="DRUG TEST FILE">DRU. FILE</th>
                                    <th title="URINALIYSIS FILE">URI. FILE</th>
                                    <th title="XRAY FILE">XRA. FILE</th>
                                    <th title="FECALYSIS FILE">FEC. FILE</th>
                                    <th title="ECG FILE">ECG. FILE</th>
                                </tr>
                            </thead>
                            <tbody id="technician-lists">
                                <tr>
                                    <td class="text-center" colspan="18">No records found.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="pagination" class="pull-right">
                          
                        </div>
                    </div>
                    </section>
                    <section id="section-flip-4">
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Client Name
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->external_client_name;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Client Address
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->external_client_address;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Client Contact Person
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->external_client_contact_person;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Client Contact Number
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->external_client_contact_number;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Client Email Address
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->external_client_email_address;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Client TIN Number
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->external_client_tin_number;?>">
                          </div>
                        </div>
                      </div>
                    </section>
                    <section id="section-flip-5">
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Logistics Company
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_details;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Loading Date
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_loading_date;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Shipping Date
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_shipping_date;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Arrival Date (Estimated)
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_arrival_date;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Quotation
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_quotation;?>">
                          </div>
                          <div class="col-md-1 m-t-10">
                            <?php if($po->po_trucking_quotation){?><a href="<?=base_url()?>asset/projects/quotations/<?=$po->po_trucking_quotation;?>" target="_blank"><span class="fa fa-download" style="font-size: 20px;"></span></a><?php }?>
                          </div>
                          <div class="col-md-2 m-t-10">
                            Shipper
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_shipper;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Broker
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_broker;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Consignee
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_consignee;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Broker Contact
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->po_trucking_broker_contact;?>">
                          </div>
                        </div>
                      </div>
                    </section>
                    <section id="section-flip-6">
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Notes/Remarks
                          </div>
                          <div class="col-md-3">
                            <textarea class="form-control" rows="3" readonly="" class="form-control"><?=$po->purchase_order_remarks;?></textarea>
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Reminder
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$reminder;?>">
                          </div>
                        </div>
                      </div>
                    </section>
                    <section id="section-flip-7">
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Arrival at Site
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_arrival_date;?>">
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 m-t-10">
                            Departure at Site
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_departure_date;?>">
                          </div>
                        </div>
                      </div>
                      <div class="row m-t-20">
                        <div class="col-md-12">
                          <div class="col-md-2 m-t-10">
                            Acceptance Report
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_acceptance_report;?>">
                          </div>
                          <div class="col-md-1">
                            <?php if($po->purchase_order_acceptance_report){?><a href="<?=base_url()?>asset/projects/<?=$po->purchase_order_acceptance_report;?>" target="_blank"><span class="fa fa-download" style="font-size: 20px;"></span></a><?php }?>
                          </div>
                          <div class="col-md-2 m-t-10">
                            Log Sheets
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control project-display" readonly="" value="<?=$po->purchase_order_logsheets;?>">
                          </div>
                          <div class="col-md-1">
                            <?php if($po->purchase_order_logsheets){?><a href="<?=base_url()?>asset/projects/<?=$po->purchase_order_logsheets;?>" target="_blank"><span class="fa fa-download" style="font-size: 20px;"></span></a><?php }?>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- /content -->
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/html" id="technician-list-row-template">
  <tr>
      <td><span class="font-medium" data-content="technician_name"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_accomodation_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_transporation_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_airfares_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_wifi_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_visa_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_bosh_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_confined_spaces_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_work_at_heights_file"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_nbi_file"></span></td>
      <td style="text-align:center;"><span class="font-medium" data-content="po_operations_dfa_file"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_medical_file"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_drug_test_file"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_urinalysis_file"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_xray_file"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_fecalysis_file"></span></td>
      <td style="text-align:center;"><span class="text-medium" data-content="po_operations_ecg_file"></span></td>
  </tr>
</script>

<script src="<?=base_url()?>asset/components/js/cbpFWTabs.js"></script>
<script src="<?=base_url()?>asset/components/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>asset/components/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/src/purchase_order/display_details.js"></script>
