<form class='form-horizontal'>
    <div class='row'>
        <div class='span6'>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">Address</label>
                <div class='controls'>
                    <?php $_CONTROL->txtAddress1->Render(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">Address 2</label>
                <div class='controls'>
                    <?php $_CONTROL->txtAddress2->Render(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">City</label>
                <div class='controls'>
                    <?php $_CONTROL->txtCity->Render(); ?>
                </div>
            </div>
        </div>
        <div class='span6'>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">State</label>
                <div class='controls'>
                    <?php $_CONTROL->txtState->Render(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">Zip</label>
                <div class='controls'>
                    <?php $_CONTROL->txtZip->Render(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">Counrty</label>
                <div class='controls'>
                    <?php $_CONTROL->txtCountry->Render(); ?>
                </div>
            </div>
        </div>
    </div>
</form>
<hr>
<form class='form-horizontal'>
    <div class='row'>
        <div class='span6'>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">Lat</label>
                <div class='controls'>
                    <?php $_CONTROL->txtLat->Render(); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" class="control-label" for="c3"></label>
                <div class='controls'>
                    <?php $_CONTROL->btnLLSave->Render(); ?>
                </div>
            </div>
        </div>
        <div class='span6'>
            <div class="control-group">
                <label class="control-label" class="control-label" for="c3">Lng</label>
                <div class='controls'>
                    <?php $_CONTROL->txtLng->Render(); ?>
                </div>
            </div>
        </div>
    </div>
</form>