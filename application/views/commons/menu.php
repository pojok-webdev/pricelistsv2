<div class="menu">                
    <div class="breadLine">            
        <div class="arrow"></div>
        <div class="adminControl active">
            Hi
        </div>
    </div>
    <div class="admin">
        <div class="image">
            <img src="/asset/aqua/img/users/aqvatarius.jpg" class="img-polaroid"/>                
        </div>
        <ul class="control">                
            <li><span class="icon-comment"></span> <a href="#">Messages</a> <a href="#" class="caption red">12</a></li>
            <li><span class="icon-cog"></span> <a href="#">Settings</a></li>
            <li><span class="icon-share-alt"></span> <a href="#">Logout</a></li>
        </ul>
        <div class="info">
            <span>Welcome back! PadiNET</span>
        </div>
    </div>
    <ul class="navigation">
        <li class="openable <?php echo $menuactive['productlist']?> <?php echo $menuactive['productnote']?>">
            <a href="/products">
                <span class="isw-grid"></span><span class="text">Internet</span>
            </a>
            <ul>
            <li class="<?php echo $menuactive['productlist']?>">
                    <a href="/products">
                        <span class="icon-th"></span><span class="text">Internet List</span>
                    </a>                  
                </li>
                <li class="<?php echo $menuactive['productnote']?>">
                    <a href="/notes">
                        <span class="icon-th"></span><span class="text">Internet Notes</span>
                    </a>                  
                </li>
            </ul>
        </li>
        <li class="openable <?php echo $menuactive['devicelist']?>">
            <a href="/devices">
                <span class="isw-grid"></span><span class="text">Devices</span>
            </a>
            <ul>
            <li class="<?php echo $menuactive['devicelist']?>">
                    <a href="/devices">
                        <span class="icon-th"></span><span class="text">Device List</span>
                    </a>                  
                </li>
                <li class="activex">
                    <a href="/main/notfound">
                        <span class="icon-th"></span><span class="text">Device Notes</span>
                    </a>                  
                </li>
            </ul>
        </li>
        <li class="openable <?php echo $menuactive['vaslist']?>">
            <a href="/notes">
                <span class="isw-grid"></span><span class="text">VAS</span>
            </a>
            <ul>
            <li class="<?php echo $menuactive['vaslist']?>">
                    <a href="/vases">
                        <span class="icon-th"></span><span class="text">VAS List</span>
                    </a>
                </li>
                <li class="activex">
                    <a href="/main/notfound">
                        <span class="icon-th"></span><span class="text">VAS Notes</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="openable <?php echo $menuactive['philoslist']?>">
            <a href="/notes">
                <span class="isw-grid"></span><span class="text">Philo</span>
            </a>
            <ul>
            <li class="<?php echo $menuactive['philoslist']?>">
                    <a href="/philos">
                        <span class="icon-th"></span><span class="text">Philo List</span>
                    </a>
                </li>
                <li class="activex">
                    <a href="/main/notfound">
                        <span class="icon-th"></span><span class="text">Philo Notes</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
