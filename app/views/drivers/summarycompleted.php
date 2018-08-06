<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?php echo URLROOT; ?>/drivers" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <h2 class=" mx-auto text-center">Summary from <br><?php echo $data['from']; ?> to <?php echo $data['to']; ?></h2>

<?php foreach ($data['row'] as $row): ?>
    <div class="row">
        <div class="col-md-4"><?php echo $row->driver_id?></div>
        <div class="col-md-4"><?php echo $row->date?></div>
        <div class="col-md-4"><?php echo $row->hours?></div>
    </div>
<?php endforeach;?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>