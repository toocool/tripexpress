        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
           <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><?php echo lang('Statistics');?></h1>
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
              <div class="col-sm-2 col-md-2 ">
                  <select class="form-control" name="members"   >
                      <option value="null">All members</option>
                      <?php
                        foreach ($members as $member) {
                            echo '<option value="'.$member->id .'" '.set_select('members', $member->id, $member->id == $member_filter).'>'.$member->username .'</option>';
                        }
                      ?>
                </select>
              </span>

            </div>
              <div class="col-sm-2 col-md-2 date" id="datepicker2" style="padding-left:0px;">
                <button type="submit" class="btn btn-primary" value="submit"><?php echo lang('Update');?></button>
              </div>
            <?php echo form_close(); ?>
          </div>

          <div class="row" style="margin-top:20px;">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><?php echo lang('Tickets sold');?></th>
                    <th><?php echo lang('One way tickets income');?></th>
                    <th><?php echo lang('Round trip tickets income');?></th>
                    <th><?php echo lang('Total income');?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $this->stats->total_tickets($from, $to, $member_filter) ?></td>
                    <td><?php echo $this->stats->total_income_one_way($from, $to, $member_filter) ?> <?php echo $this->stats->show_symbol($company_info->company_currency) ?></td>
                    <td><?php echo $this->stats->total_income_round_trip($from, $to, $member_filter) ?> <?php echo $this->stats->show_symbol($company_info->company_currency) ?></td>
                    <td><?php echo $this->stats->total_income_one_way($from, $to, $member_filter) + $this->stats->total_income_round_trip($from, $to, $member_filter) ?>.00 <?php echo $this->stats->show_symbol($company_info->company_currency) ?></td>
                  </tr>
                </tbody>
              </table>
              </div>
          </div>

          <div class="row">
            <div id="myfirstchart" style="height: 250px;"></div>
          </div>

         </div>

         <script type="text/javascript">
         new Morris.Line({

          // ID of the element in which to draw the chart.
          element: 'myfirstchart',
          // Chart data records -- each entry in this array corresponds to a point on
          // the chart.

          data: <?php echo json_encode($this->stats->total_tickets_per_day($from, $to, $member_filter)); ?>,
          // The name of the data record attribute that contains x-values.
          xkey: 'month',
          // A list of names of data record attributes that contain y-values.
          ykeys: ['value'],
          // Labels for the ykeys -- will be displayed when you hover over the
          // chart.
          labels: ['Tickets'],
          xLabels: "day"

        });
         </script>
