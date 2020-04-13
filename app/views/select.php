<select id="selectHouse" class="select-house style-input" name="house">
    <option value="0" selected>Select House</option>
    <?php
    $index = 1;
    foreach ($listHouses as $key => $value) :?>
        <option value="<?= $index++ ?>"><?= $key; ?> </option>
    <?php endforeach; ?>
</select>
<script src="../public/js/components/runSelect.js"></script>
