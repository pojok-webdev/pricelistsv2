<div id="dProductTypes" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Category Filter </h3>
    </div>
    <div class="row-fluidx">
        <div class="block-fluidx">
            <div class="row-formx clearfixx">
                <div class="span3">
                    <input type="checkbox" checked="checked" class="selectallproducttype" /> 
                    Select All
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluidx">
        <div class="block-fluidx">
        <div class="row-formx clearfixx">
                <div class="span3">
                    <input type="checkbox" checked="checked" value="0" class="productTypes" /> 
                    Uncategorized
                </div>
            </div>
            <?php foreach($producttypes['res'] as $category){?>
            <div class="row-formx clearfixx">
                <div class="span3">
                    <input type="checkbox" checked="checked" value="<?php echo $category->id;?>" class="productTypes" /> 
                    <?php echo $category->name;?>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>            
    </div>
</div>    

