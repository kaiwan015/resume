<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
            <?= $pageTitle; ?>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>languages/add"><i class="fa fa-plus"></i>
                        Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?= $pageTitle; ?>
                            <?= $action; ?>
                        </h3>

                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table id="languageslist" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort=""
                                        aria-label="ID: activate to sort column ">ID</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-label="Name: activate to sort column ">Name</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-label="Status: activate to sort column ">Status</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var action = "list";
    var tokenname = "<?php echo $this->security->get_csrf_token_name(); ?>";
    var get_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
    var base_url="<?php echo base_url('languages/languageslist'); ?>";
    var delete_url="<?php echo base_url('languages/delete'); ?>";
</script>
<script src="<?php echo base_url(); ?>assets/js/languages.js?t=<?=time()?>" type="text/javascript"></script>