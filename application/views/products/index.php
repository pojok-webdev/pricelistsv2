<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('products/head');?>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php $this->load->view('products/productypes');?>
    <?php $this->load->view('products/clientcategory');?>
    <?php $this->load->view('products/filter');?>
    <?php $this->load->view('commons/menu');?>
    <div class="content">
        <?php $this->load->view('products/breadline');?>        
        <div class="workplace">
            <div class="row-fluid">                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pricelist Layanan PadiNET</h1>
                        <ul class="buttons">
                            <li>
                            <a href="#dProductTypes" role="button" title="Filter Category" class="isw-sort" data-toggle="modal"></a>
                            </li>
                            <li>
                            <a href="#dClientCategory" role="button" title="Filter Client Category" class="isw-sort" data-toggle="modal"></a>
                            </li>
                            <li>
                            <a href="#dFilter" role="button" title="Filter dialog" class="isw-sort" data-toggle="modal"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tProduct">
                            <thead>
                                <tr>
                                    <th width="5%">Kode</th>
                                    <th width="20%">Nama</th>
                                    <th class="ccurrency" width="10%">Harga</th>
                                    <th class="ccurrency" width="10%">Harga</th>
                                    <th class="ccurrency" width="10%">Diskon</th>
                                    <th class="ccurrency" width="10%">Harga Diskon</th>
                                    <th width="50%">Keterangan</th>
                                    <th width="5%">Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class="dr"><span></span></div>            
        </div>
    </div>
    <script src='/asset/aqua/js/products/indexv2.js'></script>
</body>
</html>
