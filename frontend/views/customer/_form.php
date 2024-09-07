<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Item;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$options = Yii::$app->params['bs5_floating_label_options'];
$template = Yii::$app->params['bs5_floating_label_template'];
$item = ArrayHelper::map(Item::find()->where(['record_status'=>1])->all(),'id','name');
$get_rate = Url::to(['/item/get-rate', 'id' => '']);
?>

<div class="customer-form">
    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>
    <section class="section1">
        <label class='header-label'>Customer Details</label>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'name',['options'=>$options,'template'=>$template])->textInput(['placeholder'=>'','auto-complete'=>'off']) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'mobile_no',['options'=>$options,'template'=>$template])->textInput(['placeholder'=>'','auto-complete'=>'off']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'address',['options'=>$options,'template'=>$template])->textarea(['placeholder'=>'','auto-complete'=>'off','rows' => 6]) ?>
            </div>
        </div>
    </section>
    <section class="section1">
        <label class='header-label'>Bill Items</label>
        <div class="row">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 10, // the maximum times, an element can be added (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsRegistrationItem[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'item_id',
                        'quantity',
                        'rate',
                    ],
                ]); ?>

                    <div class="container-items"><!-- widgetBody -->
                        <div class="row">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row mx-2">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4 text-uppercase"><span>Item</span></div>
                                        <div class="col-md-2 text-uppercase text-center"><span class="">Qty</span></div>
                                        <div class="col-md-2 text-uppercase text-center"><span class="">Rate</span></div>
                                        <div class="col-md-3 text-uppercase text-center"><span class="">Amount</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($modelsRegistrationItem as $i => $modelRegistrationItem): ?>
                            <div class="item card card-default px-3 mb-2 py-3"><!-- widgetItem -->
                                <div class="row">
                                    <div class="col-md-10">
                                        <?php
                                            // necessary for update action.
                                            if (! $modelRegistrationItem->isNewRecord) {
                                                echo Html::activeHiddenInput($modelRegistrationItem, "[{$i}]id");
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <span class="panel-title"><?= ($i + 1) ?></span>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($modelRegistrationItem, "[{$i}]item_id")->dropDownList($item,['prompt'=>'--Select--','class'=>'items form-select'])->label(false) ?>
                                            </div>
                                            <div class="col-sm-2">
                                                 <?= $form->field($modelRegistrationItem, "[{$i}]quantity")->textInput(['placeholder'=>'','auto-complete'=>'off','class'=>'form-control text-center'])->label(false) ?>
                                            </div>
                                            <div class="col-sm-2">
                                                 <?= $form->field($modelRegistrationItem, "[{$i}]rate")->textInput(['placeholder'=>'','auto-complete'=>'off','class'=>'form-control text-end rate','readonly'=>true])->label(false) ?>
                                            </div>
                                            <div class="col-sm-3">
                                                 <?= $form->field($modelRegistrationItem, "[{$i}]total")->textInput(['placeholder'=>'','auto-complete'=>'off','class'=>'form-control text-end','readonly'=>true])->label(false) ?>
                                            </div>
                                        </div><!-- .row -->
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card-heading">
                                            <div class="text-right">
                                                <button type="button" class="add-item btn btn-info btn-sm"><i class="fa-solid fa-circle-plus"></i></button>
                                                <button type="button" class="remove-item btn btn-danger btn-sm"><i class="fa-solid fa-circle-minus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php DynamicFormWidget::end(); ?>
            </div>  
            <div class="row">
                <div class="col-md-2 offset-md-6">
                    <label>Total</label>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'total')->textInput(['placeholder'=>'','auto-complete'=>'off','readonly'=>true])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-6">
                    <label>Tax</label>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'tax')->textInput(['placeholder'=>'','auto-complete'=>'off','readonly'=>true])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-6">
                    <label>Grand Total</label>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'grand_total')->textInput(['placeholder'=>'','auto-complete'=>'off','readonly'=>true])->label(false) ?>
                </div>
            </div>
    </section>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$this->registerJs(<<<JS
    $(document).ready(function() {
        $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
            $(".dynamicform_wrapper .panel-title").each(function(index) {
                $(this).html((index + 1))
            });

        });

        $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
            $(".dynamicform_wrapper .panel-title").each(function(index) {
                $(this).html((index + 1))
            });
            if (! confirm("Are you sure you want to delete this item?")) {
                return false;
            }
            return true;
        });

        $(".dynamicform_wrapper").on("afterDelete", function(e) {
            // console.log("Deleted item!");
            particularTotal();
            gstCalculate();
        });

        $(".dynamicform_wrapper").on("limitReached", function(e, item) {
            alert("Limit reached");
        });

        // $("body").on("keyup",'.items', function(e) {
        //     particularTotal();
        //     gstCalculate();
        // });

                    
        // $(document).on("click", ".item", function() {
        //     var id = $(this).attr('id');
        //     //test
        //     values =[]; var i = 0;
        //     $(".item").each(function() {
        //     if(id != $(this).attr('id'))
        //         if($(this).val().length > 0){
        //         values[i] = parseInt($(this).val());
        //         i++;
        //         }
        //     });
        //     $("#"+id+" > option").each(function() {
        //     var val = parseInt($(this).attr('value'));
        //     if($.inArray(val,values) > -1){
        //         $(this).prop('disabled', true);
        //         $(this).css("color", "red")
        //         }else{
        //         $(this).prop('disabled', false);
        //         $(this).css("color", "black")
        //         }
        //     });
        //     //end
        // });

        $('body').on("change", ".items", function() {
           var ids = $(this).attr('id');
           var id = $(this).val();
           $.post('$get_rate'+id,function(rate){
                $('#registrationitem-0-item_id').closest('.row').find('.rate').val(rate);
           });
           
        });
    });
    
JS);
?>