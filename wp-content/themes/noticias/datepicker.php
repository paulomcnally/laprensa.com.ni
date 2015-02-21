<form method="get" action="<?php echo home_url( '/' ); ?>">
   Dia: <select name="day" title="dia">
    <?php foreach( range(31,1) as $day_of_month ) : ?>
<?php if (isset($archive_day) && $archive_day == $day_of_month) { ?>
        <option selected><?php echo $day_of_month; ?></option>
<?php } else { ?>
        <option><?php echo $day_of_month; ?></option>
<?php } ?>
    <?php endforeach; ?>
    </select>
    Mes:<select name="monthnum" title="mes">
    <?php foreach( range(1,12) as $month_of_year ) : ?>

<?php if (isset($archive_month) && $archive_month == $month_of_year) { ?>
        <option selected><?php echo $month_of_year; ?></option>
<?php } else { ?>
        <option><?php echo $month_of_year; ?></option>
<?php } ?>



    <?php endforeach; ?>
    </select>
    Ano:<select name="year" title="ano">
    <?php foreach( range(2014,2000) as $_year ) : ?>


<?php if (isset($archive_year) && $archive_year == $_year) { ?>
        <option selected><?php echo $_year; ?></option>

<?php } else { ?>
        <option><?php echo $_year; ?></option>

<?php } ?>


    <?php endforeach; ?>
    </select>
    <input type="submit" id="searchsubmit" value="Ir" />
</form>
