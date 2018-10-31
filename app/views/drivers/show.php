<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/drivers" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <br>

<h1> <?php echo $data['driver']->name; ?></h1>
<h3> Hourly rate is <?php echo $data['driver']->hourly_rate;?>PLN</h3>
<h3> Last shifts:</h3>
<?php foreach($data['shifts'] as $shift) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $shift->date;?>
            <p class="pull-right"><?php echo $shift->hours;?></p>
    </div>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>