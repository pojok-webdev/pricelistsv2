<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('devices/head');?>
<style>
.yellow{
    background:'yellow';
}
</style>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php $this->load->view('vases/filter');?>
    <?php $this->load->view('commons/menu');?>
    <div class="content">
        <?php $this->load->view('commons/breadline');?>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pricelist VAS PadiNET</h1>
                        <ul class="buttons">
                            <li>
                            <a href="#dFilter" role="button" title="Filter dialog" class="isw-sort" data-toggle="modal"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tProduct">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th width="15%">Kode</th>
                                    <th width="20%">Name</th>
                                    <th></th>
                                    <th></th>
                                    <th class="ccurrency" width="10%">Price PadiNET</th>
                                    <th></th>
                                    <th width="5%">Price Non PadiNET</th>
                                    <th class="ccurrency" width="10%">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($objs['res'] as $vas){?>
                                <tr>
                                    <td><?php echo $vas->category;?></td>
                                    <td><?php echo $vas->kdvas;?></td>
                                    <td><?php echo $vas->name;?></td>
                                    <td><?php echo $vas->description;?></td>
                                    <td><?php echo $vas->pricepadinetattr;?></td>
                                    <td class='<?php echo $vas->pricepadinetattr;?>'><?php echo $vas->padinettemp;?></td>
                                    <td><?php echo $vas->pricenonpadinetattr;?></td>
                                    <td class='<?php echo $vas->pricenonpadinetattr;?>'><?php echo $vas->nonpadinettemp;?></td>
                                    <td><?php echo $vas->unit;?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script src='/asset/aqua/js/vases/index.js'></script>
</body>
</html>
