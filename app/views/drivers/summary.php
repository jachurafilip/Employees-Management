<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT; ?>/drivers" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
        <?php flash('driver_message'); ?>
        <h2 class="col-md-6 mx-auto">Get Summary</h2>
        <form action="<?php echo URLROOT; ?>/drivers/summarycompleted" method="post">
            <div class="form-group">
                <label for="from">From: </label>
                <input type="date" name="from"
                       class="form-control form-control-lg <?php echo (!empty($data['from_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['from']; ?>">
                <span class="invalid-feedback"><?php echo $data['from']; ?></span>
                <label for="to"> To: </label>
                <input type="date" name="to"
                       class="form-control form-control-lg <?php echo (!empty($data['to_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['to']; ?>">
                <span class="invalid-feedback"><?php echo $data['to']; ?></span>
            </div>
            <input type="submit" class="btn btn-success col-md-6"value="Submit">
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
