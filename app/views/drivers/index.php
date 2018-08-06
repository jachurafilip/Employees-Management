<?php require APPROOT . '/views/inc/header.php'; ?>

    <?php flash('driver_message'); ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Your Drivers</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT;?>/drivers/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add driver
            </a>
        </div>
    </div>
    <?php foreach($data['drivers'] as $driver) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $driver->name;?></h4>
    </div>

    <?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
