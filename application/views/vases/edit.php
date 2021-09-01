<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('vases/head');?>
<body>
<div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php $this->load->view('commons/menu');?>
    <div class="content">
    <?php $this->load->view('commons/breadline');?>
        <div class="workplace">            
            <input type='hidden' id='id' value=<?php echo $vas->id;?> />
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Text fields</h1>
                        <ul class="buttons">
                            <li><span id="btnSave" role="button" class="isw-settings"></span></li>
                        </ul>
                    </div>
                    <div class="block-fluid">                        

                        <div class="row-form clearfix">
                            <div class="span3">Kode VAS:</div>
                            <div class="span9"><input type="text" value="<?php echo $vas->kdvas;?>"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Name:</div>
                            <div class="span9"><input type="text" value="<?php echo $vas->name;?>"/></div>
                        </div>                         


                        <div class="row-form clearfix">
                            <div class="span3">Price PadiNET:</div>
                            <div class="span9"><input type="text" value="<?php echo $vas->pricepadinet;?>"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Price Non PadiNET:</div>
                            <div class="span9"><input type="text" value="<?php echo $vas->pricenonpadinet;?>"/></div>
                        </div>                         

                    </div>
                </div>
                
            </div>
            
            <div class="dr"><span></span></div>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-favorite"></div>
                        <h1>WYSIWYG HTML Editor</h1>
                    </div>
                    <div class="block-fluid" id="wysiwyg_container">
                        
                        <textarea id="wysiwyg" name="text" style="height: 300px;">
                        <?php echo $vas->description;?>
                        </textarea>
                        
                    </div>
                </div>
                
            </div>            
        
        </div>
        
    </div>   
    <script src="/asset/aqua/js/vases/edit.js"></script>
</body>
</html>
