<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?php echo URLROOT; ?>/drivers" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="col-md-8 mx-auto">
    <div class="card card-body bg-light mt-5">
    <h2 class=" mx-auto summary text-center">Summary from <br><?php echo $data['from']; ?> to <?php echo $data['to']; ?></h2>
        <div class="detailed-summary">
        <h3 class="mx-auto text-center">Detailed summary</h3>
        <div class="row title">
            <div class="col-md-3"><h5 class="mx-auto">Driver name:</h5></div>
            <div class="col-md-3"><h5 class="mx-auto">Date of shift:</h5></div>
            <div class="col-md-3"><h5 class="mx-auto">Hours worked:</h5></div>
            <div class="col-md-3"><h5 class="mx-auto">Money earned:</h5></div>
        </div>
<?php foreach ($data['row']['detailed'] as $row): ?>
    <div class="row">
        <div class="col-md-3"><?php echo $row->name?></div>
        <div class="col-md-3"><?php echo $row->date?></div>
        <div class="col-md-3"><?php echo $row->hours?></div>
        <div class="col-md-3"><?php echo round($row->hours*$row->hourly_rate,2)?> PLN</div>
    </div>

<?php endforeach;?>
        </div>
        <div class="final-summary">
        <h3 class="mx-auto final-summary text-center">Final summary</h3>
<?php foreach ($data['row']['final'] as $row): ?>
    <div class="row final-row">
        <div class="col-md-6 text-center"><?php echo $row->name?></div>
        <div class="col-md-6 text-center"><?php echo round($row->hours,2)?> PLN</div>
    </div>
<?php endforeach;?>
    </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>