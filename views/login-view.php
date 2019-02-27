<div class="login-container">
    <?php
    $employees = getAllEmployees();

    echo "<form action='{$_SERVER['PHP_SELF']}' method='POST'>";
    echo "<div class='users-container'>";
    foreach($employees as $employee){
        echo "<div class='user' data-user-id='{$employee['id']}'>";
        echo "<img class='user-img' src='img/employees/{$employee['id']}.jpg'>";
        echo "<span class='user-name'>{$employee['first_name']} {$employee['last_name']}</span>";
        echo '</div>';
    }
    echo "</div>";
    echo "<input type='hidden' name='id' id='user-id' value=''>";
    echo "<div id='password-container' style='display: none;'>";
    echo '<input id="password-input" type="password" name="password">';
    echo '<button type="submit" name="login" id="login-btn">Login</button>';
    echo '</div>';
    echo '</form>';
    ?>
</div>
<script src="js/js.js"></script>
