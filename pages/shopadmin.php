<?php
if(!defined('INITIALIZED'))
        exit;
 
$SQL = $GLOBALS['SQL'];
       
if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
{
        //$main_content .= 'I recommend you to add items and containers by this script: <a href="http://otland.net/f479/gesior2012-items-shop-installation-administration-170654/" target="_blank">http://otland.net/f479/gesior2012-items-shop-installation-administration-170654/</a><br />';
        //$main_content .= 'Script to add points etc. to shop on www is not available. I also recommend to <b>not download from forum/use old script</b> as it is bugged!';
       
        //validar os dados
        if($action == "shop_save") {
                $points                         = trim($_POST['points']);
                $itemid1                        = trim($_POST['itemid1']);
                $count1                         = trim($_POST['count1']);
                $itemid2                        = trim($_POST['itemid2']);
                $count2                         = trim($_POST['count2']);
                $offer_type                     = trim($_POST['offer_type']);
                $offer_description      = trim($_POST['offer_description']);
                $offer_name                     = trim($_POST['offer_name']);
               
                if(empty($points) && empty($itemid1) && empty($offer_name)) {
                        $main_content .= '<strong>Você deve preencher pelo menos os pontos, id item 1 e o nome da oferta!</strong><br /><br /><a href="?subtopic=shopadmin">Voltar</a>';
                } else {
                        $sql_save = sprintf(
                                "INSERT INTO `z_shop_offer` (points,itemid1,count1,itemid2,count2,offer_type,offer_description,offer_name)VALUES('%s','%s','%s','%s','%s','%s','%s','%s')",
                                (empty($points)  ? 0 : $points),
                                (empty($itemid1) ? 0 : $itemid1),
                                (empty($count1)  ? 0 : $count1),
                                (empty($itemid2) ? 0 : $itemid2),
                                (empty($count2)  ? 0 : $count2),
                                $offer_type,
                                $offer_description,
                                $offer_name
                        );
                        $SQL->query($sql_save);
                        $main_content .= '<strong>Oferta salva com sucesso!</strong><br /><br /><a href="?subtopic=shopadmin">Voltar</a>';
                }
               
        } else {
                $main_content .= <<<EOD
                        <style type="text/css">
                        h1.admshop{margin:0;padding:0;}
                        label.admshop{float:left;width:100px;}
                        div.clear{clear:both;}
                        p.border{border-bottom:1px solid #D4C0A1;padding:3px;}
                        form input, form select, form button, form reset{padding:3px;}
                        input.bt{padding:3px 20px;cursor:pointer;}
                        </style>
                        <h1 class="admshop"><strong>Bem vindo ao Administrador do Shop!</strong></h1>
                        <hr />
                        <form method="post" action="?subtopic=shopadmin&action=shop_save">
                                <p class="border"><strong>Nome / Descrição da oferta</strong></p>
                                <p><label class="admshop">Oferta: </label><input type="text" name="offer_name" size="50" maxlength="100" /></p>
                                <p><label class="admshop">Descrição: </label><input type="text" name="offer_description" size="50" maxlength="1000" /></p>
                                <p><label class="admshop">Qtde. pontos: </label><input type="text" name="points" size="5" maxlength="9" /></p>
                                <p class="border"><strong>Tipo da oferta</strong></p>
                                <p><label class="admshop">Tipo: </label><select name="offer_type"><option value="item" selected="selected">Item</option><option value="container">Container</option></select></p>
                                <p class="border"><strong>Configuração do item 1</strong></p>
                                <p><label class="admshop">ID Item 1: </label><input type="text" name="itemid1" size="10" /></p>
                                <p><label class="admshop">Qtde. Item 1: </label><input type="text" name="count1" size="10" /></p>
                                <p class="border"><strong>Configuração do item 2</strong></p>
                                <p><label class="admshop">ID Item 2: </label><input type="text" name="itemid2" size="10" /></p>
                                <p><label class="admshop">Qtde. Item 2: </label><input type="text" name="count2" size="10" /></p>
                                <p class="border"><br /></p>
                                <input type="submit" value="Salvar" class="bt" />
                        </form>
                        <div class="clear"></div>
EOD;
//não mude a linha linha de cima (EOD), deixe ela encostada no cantinho se não vai dar erro no PHP !!!
        }//fim validação
 
}
else
{
        $main_content .= 'Sorry, you have not the rights to access this page.';
}
 
/******************************************************************
* SYSTEMA DE ADMINISTRAÇÃO ONLINE DO WEBSHOP GESIOR 2012 BY DEZON *
*    TODOS OS DIREITOS, POR FAVOR, NÃO REMOVER ESSES CRÉDITOS     *
*       FEITO EXCLUSIVAMENTE PARA O SITE WWW.TIBIAKING.COM        *
******************************************************************/