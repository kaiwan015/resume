<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-users"></i> User Management
      <small>Add, Edit, Delete</small>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12 text-right">
        <div class="form-group">
          <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Users List</h3>
            <!-- <div class="box-tools">
              <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                <div class="input-group">
                  <input type="text" name="searchText" value="<?php echo $searchText; ?>"
                    class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" />
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div> -->
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table id="userlist" class="table table-bordered table-striped dataTable dtr-inline">
              <thead>
                <tr>
                  <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1"
                    aria-sort="" aria-label="ID: activate to sort column ">ID</th>
                  <th class="sorting" tabindex="0"  rowspan="1" colspan="1"
                    aria-label="Name: activate to sort column ">Name</th>
                  <th class="sorting" tabindex="0"  rowspan="1" colspan="1"
                    aria-label="Email: activate to sort column ">Email</th>
                  <th class="sorting" tabindex="0"  rowspan="1" colspan="1"
                    aria-label="Mobile: activate to sort column ">Mobile</th>
                  <th class="sorting" tabindex="0"  rowspan="1" colspan="1"
                    aria-label="Role: activate to sort column ">Role</th>
                    <th class="sorting" tabindex="0"  rowspan="1" colspan="1"
                    aria-label="Created date: activate to sort column ">Created date</th>
                    <th class="sorting" tabindex="0"  rowspan="1" colspan="1"
                    aria-label="Status: activate to sort column ">Status</th>
                  <th class="sorting" tabindex="0"  rowspan="1" colspan="1"
                    aria-label="Action: activate to sort column ">Actions</th>
                </tr>
              </thead>
            </table>
          </div><!-- /.box-body -->
          
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>
<script>
  var tokenname = "<?php echo $this->security->get_csrf_token_name();?>";
  var get_csrf_hash = "<?php echo $this->security->get_csrf_hash();?>";
  var base_url="<?php echo base_url('user/getLists'); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/users.js" charset="utf-8"></script>
