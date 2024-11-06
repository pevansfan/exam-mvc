<?php


if (!empty($data['blogs'])) {
    foreach ($data['blogs'] as $blog) {?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="text-group">
                <h1><?= $blog['title'] ?></h1><br>
                <p><ion-icon name="time-outline"></ion-icon><span><?= $blog['created_at'] ?></span></p>
            </div>

        </li>
<?php
    }
}
