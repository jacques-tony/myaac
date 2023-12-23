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
        padding: 8px;
    }

    .dwbm-info-table th {
        background-color: #824c24;
        color: #fff;
    }

    .dwbm-info-table td {
        color: #ff7100 !important;
    }

    .dwbm-character a {
        text-decoration: none;
        color: white;
    }

    .dwbm-character:hover a {
        color: #ff7100;
    }

    nav {
        padding: 20px;
        text-align: center;
    }

    .dwbm-category {
        display: none;
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

    .dwbm-category:target {
        display: contents;
    }
</style>

<script>
    const categories = ["#daily_experience", "#weekly_experience", "#biweekly_experience", "#monthly_experience"];
    if (window.location.href.indexOf("?highscores_dwbm") !== -1 && !categories.includes(window.location.hash)) {
        window.location.href = window.location.href + "#daily_experience";
    }
</script>

<?php
defined('MYAAC') or die('Direct access not allowed!');
$title = 'highscores dwbm';

$experienceTypes = [
    'diario' => [
        'column' => 'daily_experience',
        'label' => 'Daily Experience',
    ],
    'semanal' => [
        'column' => 'weekly_experience',
        'label' => 'Weekly Experience',
    ],
    'quinzenal' => [
        'column' => 'biweekly_experience',
        'label' => 'Biweekly Experience',
    ],
    'mensal' => [
        'column' => 'monthly_experience',
        'label' => 'Monthly Experience',
    ],
];

echo '
<nav>
    <a href="?highscores_dwbm#daily_experience">DIARIO</a>
    <a href="?highscores_dwbm#weekly_experience">SEMANAL</a>
    <a href="?highscores_dwbm#biweekly_experience">QUINZENAL</a>
    <a href="?highscores_dwbm#monthly_experience">MENSAL</a>
</nav>
<table class="dwbm-info-table">
    <thead>';
        foreach ($experienceTypes as $type => $info) {
            echo "
            <tbody id=".$info['column']." class='dwbm-category'>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Vocation</th>
                    <th>Experience <small>( " . strtoupper($type) . " )</small></th>
                </tr>";
                $query = $SQL->query("SELECT id, " . $info['column'] . " FROM players WHERE account_id > 1 ORDER BY " . $info['column'] . " DESC LIMIT 50");
                foreach ($query as $i => $experience) {
                    $player = new OTS_Player();
                    $player->load($experience['id']);
                    echo "
                    <tr>
                        <td style='width: 4%;'><strong>". ($i + 1) . ".</strong></td>
                        <td class='dwbm-character' style='width: 30%;'><a href='?characters/{$player->getName()}'>{$player->getName()}</a></td>
                        <td style='width: 30%;'>{$player->getVocationName()}</td>
                        <td style='width: 30%;'>" . number_format($experience[$info['column']], 0, ',', ',') . "</td>
                    </tr>";
                }
            echo "</tbody>";
        }
        echo "
    </thead>
</table>";
?>