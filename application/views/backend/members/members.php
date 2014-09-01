
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-10 col-md-10" style="padding-left:0px;">
                <h1 class="page-header">Members</h1>
            </div>
            <div class="col-sm-2 col-md-2">
               <a href="<?php echo base_url('admin/members/add_member'); ?>"><button type="button" class="btn btn-primary top_button"><span class="icon-plus-2"></span> Add member</button></a>
            </div>
          </div> 
          <div class="row">
              <?php 
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';            
              ?>
          </div> 
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-Mail</th>
                    <th>Role</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach($users as $user): ?>
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
                      <td><?php echo $user->role ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/members/edit_member/'.$user->id); ?>"><button type="button" class="btn btn-success btn-xs"><span class="icon-pencil"></span> Edit</button></a>
                        <a href="<?php echo base_url('admin/members/delete_member/'.$user->id); ?>" onclick="return confirm('Are you sure you want to delete this member?')"><button type="button" class="btn btn-danger btn-xs"><span class="icon-cancel-2"></span> Delete</button></a>
                      </td>
                    </tr> 
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
            <ul class="pagination"><?php echo $links ?></ul>
          </div> 
         </div>
