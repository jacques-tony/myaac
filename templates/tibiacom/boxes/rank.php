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
    }
    .rank_button:hover{
        background: url('templates/tibiacom/images/themeboxes/button_over.png');
        color: #fff;
    }
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
            <button type="button" class="rank_button">Ver Highscores</button>
        </a>
    </div>
    <div class="rank_bottom"></div>
</div>
