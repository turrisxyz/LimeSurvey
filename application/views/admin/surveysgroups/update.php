<?php
/* @var $this SurveysGroupsController */
/* @var $model SurveysGroups */
?>

<div class="col-lg-12 list-surveys">

    <div class="row">
        <ul class="nav nav-tabs" id="surveygrouptabsystem" role="tablist">
            <li class="active"><a href="#surveysInThisGroup"><?php eT('Surveys in this group'); ?></a></li>
            <?php if($model->hasPermission('group','read')):?>
                <li><a href="#settingsForThisGroup"><?php eT('Settings for this survey group'); ?></a></li>
            <?php endif;?>
            <li><a href="#templateSettingsFortThisGroup"><?php eT('Themes options for this survey group'); ?></a></li>
        </ul>
        <div class="tab-content">
            <div id="surveysInThisGroup" class="tab-pane active">
                <div class="col-sm-12 list-surveys">
                    <h2><?php eT('Surveys in this group:'); ?></h2>
                    <?php
                        $this->widget('ext.admin.survey.ListSurveysWidget.ListSurveysWidget', array(
                                    'model'            => $oSurveySearch,
                                    'bRenderSearchBox' => false,
                                ));
                    ?>
                </div>
            </div>
            <?php if($model->hasPermission('group','read')):?>
                <div id="settingsForThisGroup" class="tab-pane">
                    <?php $this->renderPartial('./surveysgroups/_form', $_data_); ?>
                </div>
            <?php endif;?>
            <div id="templateSettingsFortThisGroup" class="tab-pane">
                <?php
                    if (is_a($templateOptionsModel, 'TemplateConfiguration')){
                        Yii::app()->getController()->renderPartial('/themeOptions/surveythemelist', array( 'oSurveyTheme'=> $templateOptionsModel, 'pageSize'=>$pageSize ));
                         //$this->renderPartial('//themeOptions/surveythemelist', array( 'oSurveyTheme'=> $templateOptionsModel, 'pageSize'=>$pageSize ));
                    }
                ?>
            </div>

        </div>
    </div>
</div>
<script>

    $('#surveygrouptabsystem a').click(function (e) {
        window.location.hash = $(this).attr('href');
        $("surveygrouptabsystem.last a").unbind('click');

        if($(this).attr('href') == '#surveysInThisGroup'){
            e.preventDefault();
            $(this).tab('show');
        } else if($(this).attr('href') == '#settingsForThisGroup'){
            //e.preventDefault();
            $('#save-form-button, #save-and-close-form-button').attr('data-form-id', 'surveys-groups-form');
            $(this).tab('show');
        } else if($(this).attr('href') == '#securityForThisGroup'){
            e.preventDefault();
            $('#save-form-button, #save-and-close-form-button').attr('data-form-id', 'surveys-groups-permission');
            $(this).tab('show');
        } else if($(this).attr('href') == '#templateSettingsFortThisGroup'){
            e.preventDefault();
            $('#save-form-button, #save-and-close-form-button').attr('data-form-id', 'template-options-form');
            $(this).tab('show');
        }
    });

    $(document).on('ready pjax:scriptcomplete', function(){
        if(window.location.hash){
            $('#surveygrouptabsystem').find('a[href='+window.location.hash+']').trigger('click');
        }

    })
</script>
