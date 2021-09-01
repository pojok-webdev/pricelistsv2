<div id="dFilter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Product Filter </h3>
    </div>
    <div class="row-fluidx">
        <div class="block-fluidx">
            <div class="row-formx clearfixx">
                <div class="span3">
                    <input type="checkbox" checked="checked" class="selectall" /> 
                    Select All
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluidx">
        <div class="block-fluidx">
            <?php foreach($categories['res'] as $category){?>
            <div class="row-formx clearfixx">
                <div class="span3">
                    <input type="checkbox" checked="checked" value="<?php echo $category->category_id;?>" class="productCategory" /> 
                    <?php echo $category->category_id;?>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>            
    </div>
</div>    

