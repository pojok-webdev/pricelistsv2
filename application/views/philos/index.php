<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('philos/head');?>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php $this->load->view('philos/filter');?>
    <?php $this->load->view('commons/menu');?>
    <div class="content">
        <?php $this->load->view('philos/breadline');?>        
        <div class="workplace">
            <div class="row-fluid">                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pricelist Philo PadiNET</h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tPhilo">
                            <thead>
                                <tr>
                                    <th>ID</th>
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
    <script src='/asset/aqua/js/philos/index.js'></script>
</body>
</html>
