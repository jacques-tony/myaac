<style>
    .rank{
        width: 208px;
        max-height: 360px;
        margin-bottom: 25px;
    }
     .rank_title{
        background-image: url('templates/tibiacom/images/themeboxes/title_rankreset.png');
}
    .rank_header{
        height: 45px;
        width: 208px;
        background-image: url('templates/tibiacom/images/themeboxes/box_top.png');
        font-family: Verdana;
        font-weight: bold;
        color: #d5c3af;
        line-height: 65px;
        position: relative; 
    }

    .rank_header::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 15; /* Ajusta a posição superior conforme necessário */
        left: 25; /* Ajusta a posição à esquerda conforme necessário */
        width: 156px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 36px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/title_rankreset.png');
}

    .rank_bottom{
        height: 35px;
        width: 208px;
        margin-top: -21px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bottom.png');
    }
    .rank_content{
        padding: 0px 10px;
        width: 208px;
        max-height: 290px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
    }
    .rank_player{
        font-family: Verdana;
        color: #d5c3af;
        text-align: left;
        display: flex;
        align-items: center;
        padding: 10px 5px;
    }
    .rank_outfit{
        position: absolute;
        width: 64px;
        height: 64px;
        background-position: bottom right;
        left: -15px;
        margin-top: -30px;
    }
    .rank_text{
        margin-left: 45px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
    .rank_text a{
        text-decoration: none;
        color: #ff7100;
        text-shadow: 0 0 1vw #F40A35;
      }
      .rank_text a {
        animation: glow 1.5s ease infinite;
        -moz-animation: glow 1.5s ease infinite;
        -webkit-animation: glow 1.5s ease infinite;
      }
      @keyframes glow {
        0%,
        100% {
          text-shadow: 0 0 1vw #FA1C16, 0 0 3vw #FA1C16, 0 0 3vw #FA1C16, 0 0 3vw #FA1C16, 0 0 .4vw #FED128, .1vw .1vw .1vw #806914;
          color: #FED128;
        }
        50% {
          text-shadow: 0 0 .1vw #800E0B, 0 0 1vw #800E0B, 0 0 1vw #800E0B, 0 0 1vw #800E0B, 0 0 .2vw #800E0B, .1vw .1vw .1vw #40340A;
          color: #806914;
        }
      }

    .rank_button{
        height: 30px;
        width: 148px;
        border: 0;
        background: url('templates/tibiacom/images/themeboxes/button.png');
        font-family: Verdana;
        font-weight: 100;
        color: #d5c3af;
        font-size: 12px;
        cursor: pointer;
        margin-bottom: 15px;
        margin-left: -20;
        margin-top: 15px;
    }
    .rank_button:hover{
        background: url('templates/tibiacom/images/themeboxes/button_over.png');
        color: #fff;
    }
    .rank_button::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 256px;
        left: 30px;
        width: 148px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 30px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/highscores.png');

</style>
<div class="rank">
    <div class="rank_header"></div>
    <div class="rank_content">
        <?php
        $topPlayers = getTopPlayers(5);
        foreach($topPlayers as $player){
            $outfit_url = '';
            if ($config['online_outfit']){
                $outfit_url = $config['outfit_images_url'] . '?id=' . $player['looktype'] . ( !empty( $player['lookaddons'] ) ? '&addons=' . $player['lookaddons'] : '' ) . '&head=' . $player['lookhead'] . '&body=' . $player['lookbody'] . '&legs=' . $player['looklegs'] . '&feet=' . $player['lookfeet'];
                $player['outfit'] = $outfit_url;
            }
            $player_voc = $config['vocations'][$player['vocation']];
        ?>
        <div class="rank_player">
            <div class="rank_outfit" style="background-image: url('<?php echo $player['outfit'] ?>')"></div>
            <div class="rank_text">
                <a href="<?php echo getPlayerLink($player['name'], false) ?>"><b><?php echo $player['name'] ?></b></a><br>
                <small>Level: <?php echo $player['level'] ?> / <?php echo $player_voc ?></small>
            </div>
        </div>
        <?php } ?>
        <a href="<?php echo BASE_URL ?>?highscores">
            <button type="button" class="rank_button"></button>
        </a>
    </div>
    <div class="rank_bottom"></div>
</div>
<style>
    .rank{
        width: 208px;
        max-height: 360px;
        margin-bottom: 25px;
    }
     .rank_title{
        background-image: url('templates/tibiacom/images/themeboxes/title_rankreset.png');
}
    .rank_header{
        height: 45px;
        width: 208px;
        background-image: url('templates/tibiacom/images/themeboxes/box_top.png');
        font-family: Verdana;
        font-weight: bold;
        color: #d5c3af;
        line-height: 65px;
        position: relative; 
    }

    .rank_header::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 15; /* Ajusta a posição superior conforme necessário */
        left: 25; /* Ajusta a posição à esquerda conforme necessário */
        width: 156px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 36px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/title_rankreset.png');
}

    .rank_bottom{
        height: 35px;
        width: 208px;
        margin-top: -21px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bottom.png');
    }
    .rank_content{
        padding: 0px 10px;
        width: 208px;
        max-height: 290px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
    }
    .rank_player{
        font-family: Verdana;
        color: #d5c3af;
        text-align: left;
        display: flex;
        align-items: center;
        padding: 10px 5px;
    }
    .rank_outfit{
        position: absolute;
        width: 64px;
        height: 64px;
        background-position: bottom right;
        left: -15px;
        margin-top: -30px;
    }
    .rank_text{
        margin-left: 45px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
    .rank_text a{
        text-decoration: none;
        color: #ff7100;
        text-shadow: 0 0 1vw #F40A35;
      }
      .rank_text a {
        animation: glow 1.5s ease infinite;
        -moz-animation: glow 1.5s ease infinite;
        -webkit-animation: glow 1.5s ease infinite;
      }
      @keyframes glow {
        0%,
        100% {
          text-shadow: 0 0 1vw #FA1C16, 0 0 3vw #FA1C16, 0 0 3vw #FA1C16, 0 0 3vw #FA1C16, 0 0 .4vw #FED128, .1vw .1vw .1vw #806914;
          color: #FED128;
        }
        50% {
          text-shadow: 0 0 .1vw #800E0B, 0 0 1vw #800E0B, 0 0 1vw #800E0B, 0 0 1vw #800E0B, 0 0 .2vw #800E0B, .1vw .1vw .1vw #40340A;
          color: #806914;
        }
      }

    .rank_button{
        height: 30px;
        width: 148px;
        border: 0;
        background: url('templates/tibiacom/images/themeboxes/button.png');
        font-family: Verdana;
        font-weight: 100;
        color: #d5c3af;
        font-size: 12px;
        cursor: pointer;
        margin-bottom: 15px;
        margin-left: -20;
        margin-top: 15px;
    }
    .rank_button:hover{
        background: url('templates/tibiacom/images/themeboxes/button_over.png');
        color: #fff;
    }
    .rank_button::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 256px;
        left: 30px;
        width: 148px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 30px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/highscores.png');
    }

    .rank_status {
        position: absolute;
        background-position: bottom right;
        right: 12px;
        margin-top: 4px;
    }

</style>
<div class="rank">
    <div class="rank_header"></div>
    <div class="rank_content">
        <?php
        $vocations = array(
            'Sorcerer' => 'S',
            'Druid' => 'D',
            'Paladin' => 'P',
            'Knight' => 'K',
            'Master Sorcerer' => 'MS',
            'Elder Druid' => 'ED',
            'Royal Paladin' => 'RP',
            'Elite Knight' => 'EK'
        );

        $topPlayers = $SQL->query('SELECT players.name, players.level, player_storage.value FROM players JOIN player_storage ON players.id = player_storage.player_id WHERE player_storage.key = 500 AND players.group_id < 3 ORDER BY CAST(player_storage.value AS DECIMAL) DESC LIMIT 5');
        foreach($topPlayers as $info){
            $outfit_url = '';
            if ($config['online_outfit']){
                $outfit_url = $config['outfit_images_url'] . '?id=' . $info['looktype'] . ( !empty( $info['lookaddons'] ) ? '&addons=' . $info['lookaddons'] : '' ) . '&head=' . $info['lookhead'] . '&body=' . $info['lookbody'] . '&legs=' . $info['looklegs'] . '&feet=' . $info['lookfeet'];
                $info['outfit'] = $outfit_url;
            }
            $player_voc = $config['vocations'][$info['vocation']];

            $player = new OTS_Player();
            $player->find($info['name']);
        ?>
        <div class="rank_player">
            <div class="rank_outfit" style="background-image: url('<?php echo $info['outfit'] ?>')"></div>
            <div class="rank_text">
                <a href="<?php echo getPlayerLink($info['name'], false) ?>"><b><?php echo $info['name'] ?></b></a> <img class="rank_status"src="templates/tibiacom/images/<?php echo ($player->isOnline() ? 'on' : 'off') ?>.gif"><br>
                <small>R: <?php echo $info['value'] ?> / <?php echo $vocations[$player->getVocationName()] ?></small>
            </div>
        </div>
        <?php } ?>
        <a href="<?php echo BASE_URL ?>?highscores">
            <button type="button" class="rank_button"></button>
        </a>
    </div>
    <div class="rank_bottom"></div>
</div>
