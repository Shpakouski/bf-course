<?php
if ($_REQUEST['type'] === 'add') {
    if ($_REQUEST['city'] === '487') {
        $arCities = array(
            '511' => 'Жодино',
            '512' => 'Борисов',
            '513' => 'Слуцк',
            '514' => 'Молодечно',
        );
    }
    if ($_REQUEST['city'] === '489') {
        $arCities = array(
            '411' => 'Жабинка',
            '412' => 'Барановичи',
            '413' => 'Кобрин',
            '414' => 'Иванцевичи',
        );
    }
    ?>
    <select name="innerCity">
        <?php
        foreach ($arCities as $cityID => $cityName) { ?>
            <option value="<?php echo $cityID; ?>"><?php echo $cityName; ?></option>

        <?php } ?>
    </select>
    <?php
}
if (!$_REQUEST['type']) {
    echo 'Данные отправлены';
}
