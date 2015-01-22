  
        <div class="col-sm-10 col-md-11 main">
          <div class="row" > 
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header">Statistics</h1>
            </div>
          </div>

          <div class="row">
            <?php echo form_open('admin/statistics/show_stats') ?>
                <div class="col-sm-2 col-md-2 date" id="datepicker1" style="padding-left:0px;">
                  <input type="text" class="form-control" name="from_date" data-date-format="YYYY-MM-DD" value="<?php echo set_value('from_date', $from); ?>"> <!-- value="22-01-2016" -->
                  <span class="input-group-addon"><span class="icon-calendar"></span>
                  </span>
                  <script type="text/javascript">
                              $(function () {
                                $('#datepicker1').datetimepicker({
                                  pickTime: false,
                                  useCurrent: false
                                });
                              });
                            </script>
                </div>
                <div class="col-sm-2 col-md-2 date" id="datepicker2" style="padding-left:0px;">
                <input type="text" class="form-control" name="to_date" data-date-format="YYYY-MM-DD" value="<?php echo set_value('to_date', $to); ?>" > <!-- value="22-01-2016" -->
                <span class="input-group-addon"><span class="icon-calendar"></span>
                </span>
                <script type="text/javascript">
                            $(function () {
                              $('#datepicker2').datetimepicker({
                                pickTime: false,
                                useCurrent: false
                                });
                            });
                          </script>
              </div>
              <div class="col-sm-2 col-md-2 date" id="datepicker2" style="padding-left:0px;">
                <button type="submit" class="btn btn-primary" value="submit">Update</button>
              </div>
            <?php echo form_close(); ?>
          </div>

          <div class="row" style="margin-top:20px;">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tickets sold </th>
                    <th>Seats booked</th>
                    <th>One way tickets income</th>
                    <th>Round trip tickets income</th>
                    <th>Total income</th>
                  </tr>
                </thead>
                <tbody>
                                 
                    <tr>
                      <td><?php echo $this->stats->total_tickets($from, $to) ?></td>
                      <td><?php echo $this->stats->total_seats($from, $to) ?></td>
                      <td><?php echo $this->stats->total_income_one_way($from, $to) ?> <?php echo $this->stats->show_symbol($company_info->company_currency) ?></td>
                      <td><?php echo $this->stats->total_income_round_trip($from, $to) ?> <?php echo $this->stats->show_symbol($company_info->company_currency) ?></td>
                      <td><?php echo $this->stats->total_income_one_way($from, $to) + $this->stats->total_income_round_trip($from, $to) ?>.00 <?php echo $this->stats->show_symbol($company_info->company_currency) ?></td>
                    </tr> 
                  

                </tbody>
              </table>
            </div>
            
          </div> 
         </div>
