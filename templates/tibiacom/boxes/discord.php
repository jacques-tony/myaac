<style>
    .discord{
        width: 208px;
        height: 110px;
        margin-bottom: 25px;
    }
    .discord_header{
        height: 45px;
        width: 208px;
        background-image: url('templates/tibiacom/images/themeboxes/box_top.png');
        font-family: Verdana;
        font-weight: bold;
        color: #d5c3af;
        line-height: 65px;
    }
    .discord_header::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 385; /* Ajusta a posição superior conforme necessário */
        left: 25; /* Ajusta a posição à esquerda conforme necessário */
        width: 156px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 36px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/title_discord.png');
}
    .discord_bottom{
        height: 35px;
        width: 208px;
        margin-top: -21px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bottom.png');
    }
    .discord_content{
        padding: 0px 10px;
        width: 208px;
        height: 40px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .discord_button{
        height: 30px;
        width: 148px;
        border: 0;
        background: url('templates/tibiacom/images/themeboxes/button_discord.png');
        font-family: Verdana;
        font-weight: 100;
        color: #d5c3af;
        font-size: 12px;
        cursor: pointer;
        margin-bottom: 15px;
        margin-left: -20;
        margin-top: 15px;
    }
    .discord_button:hover{
        background: url('templates/tibiacom/images/themeboxes/button_discord_over.png');
        color: #fff;
    }
    .discord_button::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 423px;
        left: 30px;
        width: 148px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 30px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/join_discord.png');
</style>
<div class="discord">
    <div class="discord_header"></div>
    <div class="discord_content">
        <a href="<?php echo $config['discord_link']; ?>" target="new">
            <button type="button" class="discord_button"></button>
        </a>
    </div>
    <div class="discord_bottom"></div>
</div>