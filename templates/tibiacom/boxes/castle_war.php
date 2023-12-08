<style>
    .castle {
        width: 208px;
        max-height: 360px;
        margin-bottom: 25px;
    }

    .castle_header {
        height: 45px;
        width: 208px;
        background-image: url('templates/tibiacom/images/themeboxes/box_top.png');
        font-family: Verdana;
        font-weight: bold;
        color: #d5c3af;
        line-height: 65px;
    }

    .castle_bottom {
        height: 35px;
        width: 208px;
        margin-top: -21px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bottom.png');
    }

    .castle_content {
        width: 208px;
        max-height: 290px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
        display: grid;
    }

    .castle_text {
        position: relative;
        top: 15px;
        left: 16px;
        height: 40px;
        width: 176px;
        background-image: url('templates/tibiacom/images/themeboxes/title_castle.png');
    }

    .castle_guildflag {
        text-align: center;
        display: inline-block;
        margin: 10px;
        width: 84px;
        height: 91px;
        border: 2px solid #8a4500;
        background-image: url('templates/tibiacom/images/themeboxes/guildflag_castle.png');
    }

    .castle_guildflag img {
        position: relative;
        top: 15px;
        left: 1px;
    }

    .castle_guildname,
    .castle_not,
    .castle_leader {
        position: relative;
        font-family: system-ui;
        font-weight: 700;
        cursor: pointer;
    }

    .castle_guildname {
        font-size: 18px !important;
        color: white;
    }

    .castle_not {
        font-size: 12px !important;
        color: white;
    }

    .castle_leader {
        font-size: 14px !important;
        color: #ff7100;
    }
</style>

<div class="castle">
    <div class="castle_header">
        <div class="castle_text"></div>
    </div>
    <div class="castle_content">
        <?php
        $guilds = $SQL->query('SELECT `name`, `owns_castle` FROM `guilds` WHERE `owns_castle` = 1 ORDER BY `owns_castle` DESC LIMIT 1;');

        $is_dominant = false;
        foreach ($guilds as $guild_dominant) {
            $guild = new OTS_Guild();
            $guild->find($guild_dominant['name']);
            ?>
            <div>
                <div class="castle_guildflag"><img src="images/guilds/<?php echo $guild->getCustomField('logo_name'); ?>"></div>
            </div>
            <div class="castle_guildname"><?php echo $guild->getName(); ?></div>
            <div class="castle_leader">LEADER: <?php echo $guild->getOwner(); ?></div>
            <?php
            $is_dominant = true;
        }

        if (!$is_dominant) {
        ?>
            <div>
                <div class="castle_guildflag"></div>
            </div>
            <div class="castle_guildname">No dominant</div>
            <div class="castle_leader">LEADER: -</div>
        <?php
        }
        ?>
    </div>
    <div class="castle_bottom"></div>
</div>
