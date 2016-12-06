<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('paleocontext/search'); ?>

    <label for="latestperiod">LATESTPERIOD</label>
    <input type="input" name="latestperiod" /><br />

    <label for="geologicalcontextgroup">GEOLOGICALCONTEXTGROUP</label>
    <input type="input" name="geologicalcontextgroup" /><br />

    <label for="latestepoch">LATESTEPOCH</label>
    <input type="input" name="latestepoch" /><br />

    <input type="submit" name="submit" value="Search Palecontext" />

</form>
<p><a href="/ci/index.php/paleocontext" alt="Return to Paleocontext">Return Paleocontext</a></p>