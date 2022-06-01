<?php
/** @var $name */
/** @var $id */
/** @var $hasModel */
/** @var $model */
/** @var $attribute */
/** @var $htmlOptions */
/** @var $value */
?>

<div
    class='input-group date'
    id="<?= $id ?>"
    data-td-target-input='nearest'
    data-td-target-toggle='nearest'
>
    <?php
//    echo '<pre>';var_dump($htmlOptions);echo '</pre>';exit;
    if ($hasModel) : ?>
        <?= CHtml::activeTextField($model, $attribute, $htmlOptions) ?>
    <?php else : ?>
        <?= CHtml::textField($name, $value, $htmlOptions) ?>
    <?php endif; ?>
    <span
        class='input-group-addon'
        data-td-target='#<?= $id ?>'
        data-td-toggle='datetimepicker'
    >
     <span class='fa fa-calendar'></span>
   </span>
</div>
