
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header">Settings</h1>
            </div>
          </div>
          <div class="row">
              <?php 
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';            
              ?>
          </div>  
          <div class="row">
          <?php echo form_open('admin/settings') ?>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo set_value('Company name', $setting->company_name ); ?>">
                <?php echo form_error('company_name'); ?>
              </div>
              <div class="form-group">
                <label for="company_street">Street</label>
                <input type="text" class="form-control" id="company_street" name="company_street" value="<?php echo set_value('Company street', $setting->company_street ); ?>">
                <?php echo form_error('company_street'); ?>
              </div>
              <div class="form-group">
                <label for="company_zip">ZIP code</label>
                <input type="text" class="form-control" id="company_zip" name="company_zip" value="<?php echo set_value('Company zip code', $setting->company_zip ); ?>">
                <?php echo form_error('company_zip'); ?>
              </div>
              <div class="form-group">
                <label for="company_city">City</label>
                <input type="text" class="form-control" id="company_city" name="company_city" value="<?php echo set_value('Company city', $setting->company_city ); ?>">
                <?php echo form_error('company_city'); ?>
              </div>
              <div class="form-group">
                <label for="company_state">State</label>
                <input type="text" class="form-control" id="company_state" name="company_state" value="<?php echo set_value('Company state', $setting->company_state ); ?>">
                <?php echo form_error('company_state'); ?>
              </div>
              <div class="form-group">
                <label for="company_phone_one">Phone number 1</label>
                <input type="text" class="form-control" id="company_phone_one" name="company_phone_one" value="<?php echo set_value('Company phone number 1', $setting->company_phone_one ); ?>">
                <?php echo form_error('company_phone_one'); ?>
              </div>
              <div class="form-group">
                <label for="company_phone_one">Phone number 2</label>
                <input type="text" class="form-control" id="company_phone_two" name="company_phone_two" value="<?php echo set_value('Company phone number 2', $setting->company_phone_two ); ?>">
                <?php echo form_error('company_phone_two'); ?>
              </div>
              <div class="form-group">
                <label for="company_email">E-mail</label>
                <input type="email" class="form-control" id="company_email" name="company_email" value="<?php echo set_value('Company e-mail', $setting->company_email ); ?>">
                <?php echo form_error('company_email'); ?>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label for="company_currency">Currency</label>
                <select class="form-control" id="company_currency" name="company_currency">
                  <?php foreach($currencies as $currency):?>
                      <option value="<?php echo $currency->currency_id ?>" <?php echo set_select('company_currency', $currency->currency_id, $setting->company_currency == $currency->currency_id)?> ><?php echo $currency->iso ?> (<?php echo $currency->symbol ?>)</option>
                  <?php endforeach; ?>
                </select>
                <?php echo form_error('company_currency'); ?>
              </div>
              <div class="form-group">
                <label for="company_rules">Rules and regulations</label>
                <textarea class="form-control" id="company_rules" name="company_rules" rows="12"><?php echo $setting->company_rules ?></textarea>
              </div>
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Save settings</button>
            </div>
          </form>
          </div> 
          
         </div>
