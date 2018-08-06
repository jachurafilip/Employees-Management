<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/drivers" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2 class="col-md-6 mx-auto">Add Driver</h2>
        <form action="<?php echo URLROOT; ?>/drivers/add" method="post">
            <div class="form-group">
                <label for="name">Name and Surname: </label>
                <input type="text" name="name"
                       class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success col-md-6"value="Submit">
        </form>
    </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>