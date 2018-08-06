<?php require APPROOT . '/views/inc/header.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function (e) {
        //Vars
        var html = '<div class="row"> <div class="col-md-6"> <label for="driver">Driver:</label> <input type="text" name="driver[]" id="childdriver" class="form-control form-control-lg mb-3 mx-auto"> </div> <div class="col-md-5"> <label for="hours">Hours:</label> <input type="time" name="hours[]" id="childhours"class="form-control form-control-lg"> </div> <a href="#" id="remove" class="btn btn-success col-md-1">Remove</a> </div>';
        //Add rows
        $("#add").click(function (e) {
            $("#field").append(html)
        });
        //Remove rows
        $("#field").on('click','#remove',function (e) {
            $(this).parent('div').remove();
        });


        //Populate values
    });
</script>

<div class="card card-body bg-light mt-5">
    <h2 class="mx-auto">End Day</h2>
    <form action="<?php echo URLROOT; ?>/drivers/end" method="post">
        <div id="field">
            <div class="form-group col-md-6 mx-auto">
                <label for="date">Date: </label>
                <input type="date" name="date"
                       class="form-control form-control-lg mb-3">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="driver">Driver:</label>
                    <select name="driver[]" id="driver"
                           class="form-control form-control-lg mb-3 mx-auto">
                        <?php foreach ($data['drivers'] as $driver) : ?>
                        <option><?php echo $driver->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="hours">Hours:</label>
                    <input type="time" name="hours[]" id="hours"
                           class="form-control form-control-lg ">
                </div>

                    <a href="#" id="add" class="btn btn-success col-md-1">Add</a>
            </div>
        </div>
        <input type="submit" class="btn btn-success col-md-12" value="Submit">

    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
