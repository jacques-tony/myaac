<style>
    .hunted {
        width: 208px;
        max-height: 360px;
        margin-bottom: 25px;
    }

    .hunted_header {
        height: 45px;
        width: 208px;
        background-image: url('templates/tibiacom/images/themeboxes/box_top.png');
        font-family: Verdana;
        font-weight: bold;
        color: #d5c3af;
        line-height: 65px;
    }

    .hunted_bottom {
        height: 35px;
        width: 208px;
        margin-top: -21px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bottom.png');
    }

    .hunted_content {
        width: 208px;
        max-height: 290px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
        display: grid;
    }

    .hunted_outfit {
        position: absolute;
        width: 64px;
        height: 64px;
        left: 42px;
        margin-top: -40px;
        background-position: bottom right;
    }

    .hunted_text {
        position: relative;
        top: 15px;
        left: 47px;
        height: 40px;
        width: 176px;
        background-image: url('templates/tibiacom/images/themeboxes/title_hunted.png');
    }

    .base_hunted {
        text-align: center;
        display: inline-block;
        width: 45px;
        height: 51px;
        margin-top: 15px;
        background-image: url('templates/tibiacom/images/themeboxes/base_hunted.png');
    }

    .hunted_name,
    .hunted_not,
    .hunted_by,
    .hunted_reward {
        position: relative;
        font-family: system-ui;
        text-transform: uppercase;
        font-weight: 700;
        cursor: pointer;
        color:#ff7100;
    }

    .hunted_name a {
        text-decoration: none;
        font-size: 16px !important;
        color: #ff7100;
    }

    .hunted_not {
        text-transform: none;
        font-size: 12px !important;
        color: white;
    }

    .hunted_by a {
        text-decoration: none;
        font-size: 12px !important;
        color: #d15e03;
    }

    .hunted_reward {
        font-size: 12px !important;
        color: #ff9e38;
    }

    .hunted_all a {
        line-height: 3;
        font-size: 18px !important;
        font-weight: 700;
        color: #ff7100;
        text-decoration: none;
    }

    .hunted-fadeIn {
        animation: fadeIn 2s; 
    }
    
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }
</style>
<script>
    $(document).ready(function(){
        setInterval(function(){
            $("#update").load(window.location.href + " #update");
        }, 3 * 1000);
    });
</script>
<div class="hunted">
    <div class="hunted_header">
        <div class="hunted_text"></div>
    </div>
    <div class="hunted_content">
        <?php
        $hunteds = $SQL->query('SELECT * FROM `PROCURADO` WHERE `killed` = 0 ORDER BY RAND() DESC LIMIT 1;');
															
        $is_hunted = false;
        foreach ($hunteds as $hunted) {
            $player = new OTS_Player();
			$player->load($hunted['target_id']);

            $hunter = new OTS_Player();
            $hunter->load($hunted['hunter_id']);

            $outfit_url = '';
            if ($config['online_outfit']){
                $outfit_url = $config['outfit_images_url'] . '?id=' . $player->getLookType() . ( !empty( $player->getLookAddons() ) ? '&addons=' . $player->getLookAddons() : '' ) . '&head=' . $player->getLookHead() . '&body=' . $player->getLookBody() . '&legs=' . $player->getLookLegs() . '&feet=' . $player->getLookFeet();
                $info['outfit'] = $outfit_url;
            }
            ?>

            <div id="update" class="hunted-fadeIn">
                <div class="base_hunted">
                    <div class="hunted_outfit" style="background-image: url('<?php echo $info['outfit'] ?>')"></div>
                </div>
                <div class="hunted_name"><a href="?characters/<?php echo $player->getName() ?>"><?php echo $player->getName() ?></a></div>
                <div class="hunted_by"><span style="color: white;">BY: </span><a href="?characters/<?php echo $hunter->getName() ?>"><?php echo $hunter->getName() ?></a></div>
                <div class="hunted_reward"><span style="color: white;">REWARD: </span><?php echo $hunted['prize'] ?> <?php echo $hunted['currencyType'] ?></div>
                <div class="hunted_all"><a href="?hunted">Ver todos</a></div>
            </div>

            <?php
            $is_hunted = true;
        }

        if (!$is_hunted) {
        ?>
            <div>
                <div class="base_hunted"></div>
                <div class="hunted_name">NONE WANTED</div>
                <div class="hunted_by"><span style="color: white;">BY: </span>-</div>
                <div class="hunted_reward"><span style="color: white;">REWARD: </span>-</div>
                <div class="hunted_all"><a href="?hunted">Ver todos</a></div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="hunted_bottom"></div>
</div>