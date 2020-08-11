<div id="container">
    <p>Email already exist</p>
<?php
foreach ($data as $item):?>
    <p>ID: <?=$item['id']?></p>
    <p>Name: <?=$item['name']?></p>
    <p>Email: <?=$item['email']?></p>
    <p>Registration: <?=$item['registration']?></p>
<?php endforeach;?>
    <a href="/" class="button">Home</a>
</div>
