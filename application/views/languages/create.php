<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
            <?= $pageTitle; ?>

        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?= $action; ?>
                            <?= $pageTitle; ?>
                        </h3>
                    </div>
                    <form role="form" id="addlanguage" action="" method="post"
                        role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control required" id="name" name="name"
                                            maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="radio-inline">
                                        <input type="radio"  name="status" id="inlineRadio1"
                                            value="1" checked> Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio"  name="status" id="inlineRadio2"
                                            value="0"> Inactive
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );

                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script>
    var action = "add";
    var base_url="<?php echo base_url('languages/store'); ?>";
    
</script>
<script src="<?php echo base_url(); ?>assets/js/languages.js?t=<?=time()?>" type="text/javascript"></script>