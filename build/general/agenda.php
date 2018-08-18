<?php
require($_SERVER['DOCUMENT_ROOT'] . "/init.php");

login();

head('Agenda', 5);
// TODO: make agenda insert system
// TODO: improve agenda ui
?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <?php
                    if ($_SESSION['class'] === 'docent') {
                        echo '<a href="/admin/agenda" class="waves-effect waves-light btn color-secondary--background">Voeg agendaitem toe</a>';
                    }
                    $query =
                    "SELECT
                        title,
                        link,
                        date
                    FROM
                        agenda
                    WHERE
                        DATE(date) >= DATE(NOW())";

                    $result = sql_query($query, false);
                    if ($result->num_rows > 0) {
                        echo '<ul>';
                        while ($agendaitem = $result->fetch_assoc()) {
                            echo "<li><a href=\"{$agendaitem['link']}\" target=\"_blank\">{$agendaitem['title']} - {$agendaitem['date']}</a></li>";
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>Er zijn op dit moment geen agenda items.</p> ';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php footer(); ?>
