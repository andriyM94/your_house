<!-- контент для головної сторінки коли користувач авторизований -->
<div class="content">
        <table class="flexy">
        <thead>
            <tr>
                <th class="list_id">Id</th>
                <th class="list_img">Photo</th>
                <th class="list_title">Title</th>
                <th class="list_description">Description</th>
            </tr>
        </thead>
        <tbody>
            <!-- підключення списку об'єктів -->
        <?php
           include $_SERVER["DOCUMENT_ROOT"] . "/modules/objects/object_list.php";  
        ?>
        </tbody>
        </table>
</div>