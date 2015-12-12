
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-10 col-md-10" style="padding-left:0px;">
                <h1 class="page-header"><?php echo lang('Members');?></h1>
            </div>
            <div class="col-sm-2 col-md-2">
               <a href="<?php echo base_url('admin/members/add_member'); ?>"><button type="button" class="btn btn-primary top_button"><span class="icon-plus-2"></span> <?php echo lang('Add member');?></button></a>
            </div>
          </div>
          <div class="row">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th><?php echo lang('Username');?></th>
                    <th><?php echo lang('First name');?></th>
                    <th><?php echo lang('Last name');?></th>
                    <th><?php echo lang('E-Mail');?></th>
                    <th><?php echo lang('Role');?></th>
                    <th><?php echo lang('Options');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if ($this->pagination->per_page > $this->pagination->total_rows) $i =1 ;
                    else $i = 1 + ($this->pagination->cur_page-1)*$this->pagination->per_page;
                    foreach($users as $user):
                  ?>
                  <?php
                    if ($user->role == '0') {
                      $user->role = 'Administrator';
                    }elseif($user->role == '1'){
                      $user->role = 'Employee';
                    } else {
                      $user->role = 'Reseller';
                    }
                  ?>
                     <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $user->username ?></td>
                      <td><?php echo ucfirst($user->firstname) ?></td>
                      <td><?php echo ucfirst($user->lastname) ?></td>
                      <td><?php echo $user->email ?></td>
                      <td><?php echo lang($user->role) ?></td>
                      <td style="text-align:center">
                        <div class="btn-group" role="group">
                            <?php if($user->blocked == 1){?>
                                <a href="<?php echo base_url('admin/members/unblock_member/'.$user->id); ?>" class="btn btn-default btn-xs active"><span class="icon-plus" style="color:blue"></span> <?php echo lang('Unblock'); ?></a>
                            <?php }else{?>
                                <a href="<?php echo base_url('admin/members/block_member/'.$user->id); ?>" class="btn btn-default btn-xs"><span class="icon-minus" style="color:blue"></span> <?php echo lang('Block'); ?></a>
                            <?php }?>
                          <a href="<?php echo base_url('admin/members/edit_member/'.$user->id); ?>" class="btn btn-default btn-xs"><span class="icon-pencil" style="color:green"></span> <?php echo lang('Edit'); ?></a>
                          <a href="<?php echo base_url('admin/members/delete_member/'.$user->id); ?>" onclick="return confirm('Are you sure you want to delete this member?')" class="btn btn-default btn-xs"><span class="icon-cancel-2" style="color:red"></span> <?php echo lang('Delete'); ?></a>

                        </div>
                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
            <ul class="pagination"><?php echo $links ?></ul>
          </div>
         </div>
