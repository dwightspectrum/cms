<div class="container-fluid">
  <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Currency Exchange</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>dashboard">Dashboard</a></li>
        </ol>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <div class="white-box">
          <h3 class="box-title m-b-0">Search</h3>
          <p class="text-muted m-b-30 font-13">Search fields</p>
          <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Search Date From</label>
                      <div class="input-group">
                          <input type="text" class="form-control datepicker-autoclose" id="search_date_from" name="search_date_from" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                      </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Search Date To</label>
                      <div class="input-group">
                          <input type="text" class="form-control datepicker-autoclose" id="search_date_to" name="search_date_to" placeholder="yyyy-mm-dd" required=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                      </div>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="form-group">
                      <label>Search Currency</label>
                      <select class="form-control" id="search_currency" name="search_currency">
                        <option value="0">All</option>
                        <option>EURO</option>
                        <option>USD</option>
                      </select>
                    </div>
                </div> -->
              </div>
          </div>
      </div>
      <div class="white-box">
        <div>
            <h4 style="color:#ff7676;">Unrecorded Dates</h4> 
        </div>
        <div class=" table-responsive m-t-30">
        <table id="unrecorded-dates" class="table color-table inverse-table table-striped">
            <thead>
                <tr>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody id='unrecorded-date-table'>
              <tr>
                <td align="center" colspan="4">No records found.</td>
              </tr>
            </tbody>
        </table>
      </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="white-box">
        <div>
            <div class="pull-right">
              <a id="add-currency-btn" class='btn btn-success'><span class='fa fa-plus'></span></a>
            </div>
            <h3>Manage Exchange</h3> 
        </div>

        <div class=" table-responsive m-t-30">
          <table id="exchange" class="table color-table inverse-table table-striped">
              <thead>
                  <tr>
                      <th>DATE</th>
                      <th>USD</th>
                      <th>EURO</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody id='exchange-table'>
                <tr>
                  <td align="center" colspan="4">No records found.</td>
                </tr>
              </tbody>
          </table>
          <div id="pagination" class="pull-right">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_currency_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Currency Value</h4>
      </div>
      <form id="add-currency-exchange-form" method="POST">
        <div class="modal-body">
            <div class="form-group">
              <div class="col-md-12">
                <label>Date</label>
                <div class="input-group">
                    <input type="text" class="form-control datepicker-autoclose" id="exchange_date" name="exchange_date" placeholder="yyyy-mm-dd" required="" autocomplete="off"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <label>Currency:</label>
                <input type="text" name="currency" value="USD" disabled="" class="form-control" style="background-color: #fff">
              </div>
              <div class="col-md-8">
                <br>
                <label style="font-size:15px;">Value in PHP</label>
                <div class="input-group"> <span class="input-group-addon">PHP</span>
                  <input type="text" name="usd_exchange_value" id="usd_exchange_value" placeholder="0.00" class="form-control" > 
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <label>Currency:</label>
                <input type="text" name="currency" value="EURO" disabled="" class="form-control" style="background-color: #fff">
              </div>
              <div class="col-md-8">
                <br>
                <label style="font-size:15px;">Value in PHP</label>
                <div class="input-group"> <span class="input-group-addon">PHP</span>
                  <input type="text" name="euro_exchange_value" id="euro_exchange_value" placeholder="0.00" class="form-control" > 
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer" style="border-top: 0px;">
          <div class="col-md-12">
            <input type="submit" class="btn btn-primary" value="Submit" id="add-exchange-value" style="width:100%;margin-top:20px;">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_currency_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Currency Value</h4>
      </div>
      <form id="edit-currency-exchange-form" method="POST">
        <div class="modal-body">
            <div class="form-group">
              <div class="col-md-12">
                <label>Date</label>
                <div class="input-group">
                    <input type="text" class="form-control datepicker-autoclose" id="exchange_date" name="exchange_date" placeholder="yyyy-mm-dd" disabled=""> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <label>Currency:</label>
                <input type="text" name="currency" value="EURO" disabled="" class="form-control" style="background-color: #fff">
              </div>
              <div class="col-md-8">
                <br>
                <label style="font-size:15px;">Value in PHP</label>
                <div class="input-group"> <span class="input-group-addon">PHP</span>
                  <input type="text" name="euro_exchange_value" id="euro_exchange_value" placeholder="0.00" class="form-control" > 
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <label>Currency:</label>
                <input type="text" name="currency" value="USD" disabled="" class="form-control" style="background-color: #fff">
              </div>
              <div class="col-md-8">
                <br>
                <label style="font-size:15px;">Value in PHP</label>
                <div class="input-group"> <span class="input-group-addon">PHP</span>
                  <input type="text" name="usd_exchange_value" id="usd_exchange_value" placeholder="0.00" class="form-control" > 
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer" style="border-top: 0px;">
          <div class="col-md-12">
            <input type="submit" class="btn btn-primary" value="Update" id="add-exchange-value" style="width:100%;margin-top:20px;">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/html" id="currency-row-template">
  <tr>
    <td data-content='currency_exchange_date' style="width: 30%;  text-transform: uppercase;"></td>
    <td data-content='USD_rate' style="width: 30%; text-transform: uppercase;"></td>
    <td data-content='EURO_rate' style="width: 20%;  text-transform: uppercase;"></td>
    <td data-content='actions' style="width: 20%; text-transform: uppercase;"></td>
  </tr>
</script>

<script type="text/html" id="unrecorded-date-row-template">
  <tr>
    <td data-content='selected_date'></td>
  </tr>
</script>

<script src="<?=base_url()?>asset/components/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/src/currencyexchange/view.js"></script>