<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('devices/head');?>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php $this->load->view('devices/filter');?>
    <?php $this->load->view('commons/menu');?>
    <div class="content">
        <?php $this->load->view('commons/breadline');?>
        <div class="workplace">
            <div class="row-fluid">                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pricelist Perangkat PadiNET</h1>
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
                                    <th>Kategori</th>
                                    <th width="15%">Kode</th>
                                    <th width="20%">Nama</th>
                                    <th width="45%">Keterangan</th>
                                    <th class="ccurrency" width="10%">Harga</th>
                                    <th width="5%">Unit</th>
                                    <th class="ccurrency" width="10%">Brand</th>
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
    <script src='/asset/aqua/js/devices/index.js'></script>
</body>
</html>
