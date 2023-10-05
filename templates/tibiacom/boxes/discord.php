<style>
    .discord{
        width: 207px;
        height: 100%;
        margin-top: 25px;
    }
    .discord_header{
        height: 41px;
        width: 207px;
        background-image: url('templates/tibiacom/images/themeboxes/box_top.png');
        font-family: Verdana;
        font-weight: bold;
        color: #d5c3af;
        line-height: 65px;
    }
    .discord_bottom{
        height: 35px;
        width: 207px;
        margin-top: -20px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bottom.png');
    }
    .discord_content{
        padding: 0px 10px;
        width: 207px;
        height: 40px;
        background-image: url('templates/tibiacom/images/themeboxes/box_bg.png');
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .discord_button{
        height: 35px;
        width: 207x;
        border: 0;
        background: url('templates/tibiacom/images/themeboxes/button.png');
        font-family: Verdana;
        font-weight: 100;
        color: #d5c3af;
        font-size: 12px;
        cursor: pointer;
    }
    .discord_button:hover{
        background: url('templates/tibiacom/images/themeboxes/button_over.png');
        color: #fff;
    }
</style>
<div class="discord">
    <div class="discord_header">Discord</div>
    <div class="discord_content">
        <a href="<?php echo $config['discord_link']; ?>" target="new">
            <button type="button" class="discord_button">Join Discord</button>
        </a>
    </div>
    <div class="discord_bottom"></div>
</div>