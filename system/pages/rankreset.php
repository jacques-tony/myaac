<style>
    .dwbm-info-table {
        margin-top: 20px;
        border-collapse: collapse;
        width: 100%;
    }

    .dwbm-info-table th, .dwbm-info-table td {
        border: 1px solid #ddd;
        text-align: center;
        border: 1px solid #824c24;
        padding: 10px 8px; /* Padding de 10px na parte superior e inferior, 8px nas laterais */
    }

    .dwbm-info-table th {
        background-color: #824c24;
        color: #fff;
    }

    .dwbm-info-table td {
        color: #ff7100 !important;
        width: 100px; /* Largura da célula da outfit */
    }

    .dwbm-character a {
        text-decoration: none;
        color: white;
        display: flex;
        align-items: center; /* Centraliza verticalmente */
    }

    .dwbm-character img.statuspage {
        margin-right: 5px; /* Adiciona um espaçamento entre o status e o nome */
    }

    nav {
        padding: 20px;
        text-align: center;
    }

    .dwbm-category {
        display: contents; /* Alterado para exibir automaticamente */
    }

    nav a {
        font-size: 20px;
        padding: 15px;
        color: white !important;
        text-decoration: none !important;
        margin: 10px;
        border-radius: 10px;
        border: 1px solid #824c24;
        box-shadow: inset 0 0 10px black;
    }

    nav a:hover {
        border: 1px solid #ff7100;
        box-shadow: inset 0 0 10px #ff7100;
    }
</style>

<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'Rank Reset';

$topPlayers = $SQL->query('SELECT players.name, players.level, player_storage.value FROM players JOIN player_storage ON players.id = player_storage.player_id WHERE player_storage.key = 500 AND players.group_id < 3 ORDER BY CAST(player_storage.value AS DECIMAL) DESC LIMIT 50');

$vocations = [
    'Sorcerer' => 'S',
    'Druid' => 'D',
    'Paladin' => 'P',
    'Knight' => 'K',
    'Master Sorcerer' => 'MS',
    'Elder Druid' => 'ED',
    'Royal Paladin' => 'RP',
    'Elite Knight' => 'EK'
];
?>

<table class="dwbm-info-table">
    <thead>
    <tr>
        <th>Rank</th>
        <th>Outfit</th>
        <th>Name & Status</th> <!-- Ajustado para incluir o Status -->
        <th>Level</th>
        <th>Resets</th>
        <th>Vocation</th>
    </tr>
    </thead>
    <tbody class="dwbm-category">
    <?php
    foreach ($topPlayers as $i => $playerInfo) {
        $player = new OTS_Player();
        $player->find($playerInfo['name']);

        // Construção da URL da Outfit
        $outfit_url = '';
        if ($config['online_outfit']) {
            $outfit_url = $config['outfit_images_url'] . '?id=' . $player->getLookType() . ( !empty( $player->getLookAddons() ) ? '&addons=' . $player->getLookAddons() : '' ) . '&head=' . $player->getLookHead() . '&body=' . $player->getLookBody() . '&legs=' . $player->getLookLegs() . '&feet=' . $player->getLookFeet();
        }
    ?>
        <tr>
            <td><strong><?= ($i + 1) ?>.</strong></td>
            <td style="padding: 10px 0;"><img src="<?= $outfit_url ?>" alt="Outfit"></td>
            <td class='dwbm-character'>
                <a href='?characters/<?= $player->getName() ?>'>
                    <img class="statuspage" src="templates/tibiacom/images/<?php echo ($player->isOnline() ? 'on' : 'off') ?>.gif">
                    <?= $player->getName() ?>
                </a>
            </td>
            <td><?= $player->getLevel() ?></td>
            <td><?= $playerInfo['value'] ?></td>
            <td><?= $vocations[$player->getVocationName()] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
