<style>
    .donate{
        width: 208px;
        height: 190px;
        margin-bottom: 25px;
    }
    .donate_header{
        height: 45px;
        width: 208px;
        background-image: url('templates/tibiacom/images/themeboxes/box_top.png');
        font-family: Verdana;
        font-weight: bold;
        color: #d5c3af;
        line-height: 65px;
    }

    .donate_header::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 525; /* Ajusta a posição superior conforme necessário */
        left: 48; /* Ajusta a posição à esquerda conforme necessário */
        width: 114px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 34px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/title_donate.png');
}
    .donate_bottom{
        height: 35px;
        width: 208px;
        margin-top: -21px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bottom.png');
    }
    .donate_content{
        padding: 0px 10px;
        width: 208px;
        height: 155px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
        display: grid;
        justify-content: center;
        align-items: center;
    }

    .donate_content::before {
        content: ""; /* Adiciona um conteúdo vazio para que a pseudo-classe seja renderizada */
        display: block; /* Garante que o conteúdo seja exibido como bloco */
        position: absolute; /* Posiciona a pseudo-classe em relação à classe pai */
        top: 560; /* Ajusta a posição superior conforme necessário */
        left: 30; /* Ajusta a posição à esquerda conforme necessário */
        width: 152px; /* Garante que a pseudo-classe cubra a largura completa da classe pai */
        height: 87px; /* Garante que a pseudo-classe cubra a altura completa da classe pai */
        background-image: url('templates/tibiacom/images/themeboxes/donate/donate.png');
}

    .donate_outfit{
        position: absolute;
        width: 64px;
        height: 64px;
        background-position: bottom right;
        left: 10px;
        margin-top: -15px;
    }
    .donate_text{
        margin-left: 45px;
        font-family: Verdana;
        color: #d5c3af;
        text-align: left;
    }
    .donate_button{
        height: 30px;
        width: 148px;
        border: 0;
        background: url('templates/tibiacom/images/themeboxes/button.png');
        font-family: Verdana;
        font-weight: 100;
        color: #d5c3af;
        font-size: 12px;
        cursor: pointer;
        margin-top: 105px;
        margin-left: -15px;
    }
    .donate_button:hover{
        background: url('templates/tibiacom/images/themeboxes/button_over.png');
        color: #fff;
    }
</style>
<div class="donate">
    <div class="donate_header"></div>
    <div class="donate_content">
        <a href="<?php echo BASE_URL ?>?points">
            <button type="button" class="donate_button">Donate Now</button>
        </a>        
    </div>
    <div class="donate_bottom"></div>
</div>
